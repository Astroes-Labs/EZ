<?php
// app/Http/Controllers/Admin/TradeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trader;
use Illuminate\Support\Facades\Auth;
use App\Services\FinancialDataService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class TradeController extends Controller
{



    public function simulate(Request $request, User $user)
    {
        $validated = $request->validate([
            'profit_target'       => 'required|numeric|min:1',
            'days'                => 'required|integer|min:1|max:365',
            'trade_days_count'    => 'required|integer|min:1|max:' . $request->days,
            'max_investment_pct'  => 'nullable|numeric|min:1|max:50',
        ]);

        $profitTarget    = (float) $validated['profit_target'];
        $days            = (int) $validated['days'];
        $tradeDaysCount  = (int) $validated['trade_days_count'];
        $maxPct          = (float) ($validated['max_investment_pct'] ?? 15); // default 15%

        if ($user->trading_balance <= 0) {
            return back()->with('error', 'User has no trading balance to simulate from.');
        }

        // Randomize actual number of trade days (±2, clamped)
        $actualTradeDays = max(1, min($days, rand($tradeDaysCount - 2, $tradeDaysCount + 2)));

        // Pick random days in the past
        $pastDays = range(1, $days);
        shuffle($pastDays);
        $tradeDays = array_slice($pastDays, 0, $actualTradeDays);

        $createdTrades = 0;
        $totalSimProfit = 0;

        try {
            DB::transaction(function () use (
                $user,
                $profitTarget,
                $days,
                $tradeDays,
                $maxPct,
                &$createdTrades,
                &$totalSimProfit
            ) {
                $currentBalance = $user->trading_balance;
                $priceService = app(FinancialDataService::class);

                foreach ($tradeDays as $dayOffset) {
                    $tradeDate = Carbon::now()->subDays($dayOffset);

                    // Random investment (1% to max%)
                    $pct = rand(1, (int)$maxPct * 10) / 10; // e.g. 3.7%
                    $investment = max(10, round($currentBalance * ($pct / 100), 2));

                    // Random type
                    $type = rand(0, 1) ? 'BUY' : 'SELL';

                    // Random market & symbol (you can expand this list)
                    $markets = ['Forex', 'Crypto', 'Stocks'];
                    $market = $markets[array_rand($markets)];

                    $symbol = match ($market) {
                        'Forex'  => ['EURUSD', 'GBPUSD', 'USDJPY'][rand(0, 2)],
                        'Crypto' => ['BTCUSDT', 'ETHUSDT', 'SOLUSDT'][rand(0, 2)],
                        'Stocks' => ['AAPL', 'TSLA', 'NVDA'][rand(0, 2)],
                        default  => 'BTCUSDT'
                    };

                    // Current real price as open
                    $openingPrice = match ($market) {
                        'Crypto' => $priceService->coinValue(str_replace('USDT', '', $symbol), 1),
                        'Forex'  => $priceService->forexValue($symbol),
                        'Stocks' => $priceService->stockValue($symbol),
                        default  => 100.0 // fallback
                    };

                    // Simulate return % (skewed positive to reach target)
                    $minReturn = -20;
                    $maxReturn = 400;
                    // Bias toward positive
                    $returnPct = rand($minReturn * 10, $maxReturn * 10) / 10;
                    if ($totalSimProfit < $profitTarget * 0.7) {
                        $returnPct = max(10, $returnPct); // force positive when behind target
                    }

                    $closePrice = $openingPrice * (1 + $returnPct / 100);
                    $profit = $investment * ($closePrice / $openingPrice - 1);

                    // Random multiplier & tp/sl
                    $multiplier = rand(10, 200);
                    $tp = rand(100, 500);
                    $sl = rand(20, 100);

                    // Random trader from copied ones (or null)
                    $trader = $user->traders()->inRandomOrder()->first();
                    $traderId = $trader ? $trader->id : null;

                    // Create closed trade
                    $trade = $user->trades()->create([
                        'trader_id'     => $traderId,
                        'type'          => $type,
                        'market'        => $market,
                        'symbol'        => $symbol,
                        'opening_price' => $openingPrice,
                        'investment'    => $investment,
                        'multiplier'    => $multiplier,
                        'take_profit'   => $tp,
                        'stop_loss'     => $sl,
                        'profit'        => round($profit, 2),
                        'status'        => 'CLOSED',
                        'created_at'    => $tradeDate->addMinutes(rand(60, 1440))->toDateTimeString(),
                        'updated_at'    => now(),
                    ]);

                    // Add profit + investment back (since closed)
                    $user->increment('trading_balance', $investment + $profit);

                    $createdTrades++;
                    $totalSimProfit += $profit;

                    Log::info('Simulated trade created', [
                        'trade_id'      => $trade->id,
                        'user_id'       => $user->id,
                        'date'          => $tradeDate->format('Y-m-d'),
                        'investment'    => $investment,
                        'profit'        => $profit,
                        'return_pct'    => $returnPct,
                        'new_balance'   => $user->trading_balance,
                    ]);
                }

                // Final adjustment if needed (optional)
                if (abs($totalSimProfit - $profitTarget) > 50) {
                    Log::notice('Simulated profit off target', [
                        'target' => $profitTarget,
                        'actual' => $totalSimProfit,
                    ]);
                }
            });

            return redirect()
                ->route('admin.users.trades.index', $user)
                ->with('success', "Simulation complete: Created {$createdTrades} trades over {$days} days. Added ≈ $" . number_format($totalSimProfit, 2) . " profit.");
        } catch (Exception $e) {
            Log::error('Simulation failed', [
                'user_id' => $user->id,
                'error'   => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Simulation failed: ' . $e->getMessage());
        }
    }
    // List trades for a user
    public function userTrades(User $user)
    {
        $trades = Trade::with('trader')
            ->where('user_id', $user->id)
            ->latest()
            ->get();
        $tradingBalance = $user->trading_balance ?? 0;

        return view('admin.trades.user-index', compact('user', 'trades', 'tradingBalance'));
    }

    // Create form

    public function create(User $user)
    {
        // Fetch only traders that this specific user is copying
        // Using the many-to-many relationship (assumes you have it defined in User model)
       /*  $traders = $user->traders()
            ->select('traders.id', 'traders.name')  // only needed fields
            ->get(); */

        $traders = Trader::latest()->get();

        // Optional: Log for debugging
        // \Log::info('Traders available for user when creating trade', [
        //     'user_id' => $user->id,
        //     'trader_count' => $traders->count(),
        // ]);

        return view('admin.trades.create', compact('user', 'traders'));
    }

    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'trader'     => 'required|exists:traders,id',
            'type'       => 'required|in:BUY,SELL',
            'market'     => 'required|in:Forex,Crypto,Stocks',
            'sym'        => 'required|string|max:50',
            'inv'        => 'required|numeric|min:1',
            'mult'       => 'required|numeric|min:1',
            'tp'         => 'required|numeric',
            'sl'         => 'required|numeric',
        ]);

        $investment = (float) $validated['inv'];
        $userId     = $user->id;
        $symbolRaw  = $validated['sym'];

        Log::debug('Admin attempting to open trade', [
            'admin_id'    => auth('admin')->id(),
            'user_id'     => $userId,
            'symbol_raw'  => $symbolRaw,
            'market'      => $validated['market'],
            'investment'  => $investment,
            'type'        => $validated['type'],
        ]);

        // Assuming wallet relationship: User hasOne Wallet
        $wallet = $user;
        if (!$wallet) {
            Log::error('User has no wallet attached', ['user_id' => $userId]);
            return back()->with('error', 'User has no trading wallet configured.');
        }

        if ($wallet->trading_balance < $investment) {
            Log::warning('Insufficient trading balance for trade', [
                'user_id'          => $userId,
                'current_balance'  => $wallet->trading_balance,
                'attempted_inv'    => $investment,
            ]);
            return back()->with('error', 'Insufficient trading balance.');
        }

        $priceService = app(FinancialDataService::class);

        try {
            // Normalize symbol
            $symbol = strtoupper(trim($symbolRaw));
            Log::debug('Normalized symbol', ['original' => $symbolRaw, 'normalized' => $symbol]);

            // Fetch opening price
            Log::info('Fetching opening price', [
                'market' => $validated['market'],
                'symbol' => $symbol,
            ]);

            if ($validated['market'] === 'Crypto') {
                $coin = str_replace('USDT', '', $symbol);
                Log::debug('Crypto coin extracted', ['coin' => $coin]);
                $openingPrice = $priceService->coinValue($coin, 1);
            } elseif ($validated['market'] === 'Forex') {
                $pair = str_replace(' ', '', $symbol);
                if (strlen($pair) !== 6) {
                    throw new Exception('Invalid forex pair format (expected 6 characters like EURUSD).');
                }
                Log::debug('Forex pair prepared', ['pair' => $pair]);
                $openingPrice = $priceService->forexValue($pair);
            } else { // Stocks
                Log::debug('Using stock symbol directly', ['symbol' => $symbol]);
                $openingPrice = $priceService->stockValue($symbol);
            }

            Log::info('Opening price fetched successfully', [
                'market'       => $validated['market'],
                'symbol'       => $symbol,
                'opening_price' => $openingPrice,
            ]);

            // Optional: random profit from old logic (can be removed later)
            $randomProfit = round(rand(1, 20) / 10, 1);

            $trade = null;

            DB::transaction(function () use (
                $user,
                $wallet,
                $investment,
                $validated,
                $openingPrice,
                $randomProfit,
                &$trade,
                $userId,
                $symbol
            ) {
                $trade = $user->trades()->create([
                    'trader_id'       => $validated['trader'],
                    'type'            => $validated['type'],
                    'market'          => $validated['market'],
                    'symbol'          => $symbol,
                    'opening_price'   => $openingPrice,
                    'investment'      => $investment,
                    'multiplier'      => $validated['mult'],
                    'take_profit'     => $validated['tp'],
                    'stop_loss'       => $validated['sl'],
                    'profit'          => 0,  // ← changed to 0; use $randomProfit if still needed
                    'status'          => 'OPEN',
                    // 'opened_by'    => auth('admin')->id(), // uncomment if needed
                ]);

                $oldBalance = $wallet->trading_balance;
                $wallet->decrement('trading_balance', $investment);

                Log::info('Trade created and balance deducted', [
                    'trade_id'         => $trade->id,
                    'user_id'          => $userId,
                    'symbol'           => $symbol,
                    'investment'       => $investment,
                    'old_balance'      => $oldBalance,
                    'new_balance'      => $wallet->trading_balance,
                ]);
            });

            return redirect()
                ->route('admin.users.trades.index', $user)
                ->with('success', 'Trade opened successfully at ' . number_format($openingPrice, 6) . '. symbol: ' . $symbol);
        } catch (Exception $e) {
            Log::error('Failed to create trade', [
                'user_id'     => $userId,
                'symbol'      => $symbol ?? $symbolRaw,
                'market'      => $validated['market'] ?? 'unknown',
                'investment'  => $investment,
                'error'       => $e->getMessage(),
                'trace'       => $e->getTraceAsString(),
                'file'        => $e->getFile(),
                'line'        => $e->getLine(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Failed to fetch market price or create trade: ' . $e->getMessage());
        }
    }

    // Edit form
    public function edit(User $user, Trade $trade)
    {
        $this->authorizeTrade($user, $trade);
        return view('admin.trades.edit', compact('user', 'trade'));
    }

    // Update trade
    public function update(Request $request, User $user, Trade $trade)
    {
        $this->authorizeTrade($user, $trade);

        $validated = $request->validate([
            'investment'    => 'required|numeric|min:0.01',
            'profit'        => 'required|numeric',
            'created_at'    => 'required|date',
        ]);

        $trade->update([
            'investment' => $validated['investment'],
            'profit'     => $validated['profit'],
            'created_at' => $validated['created_at'],
        ]);

        return redirect()
            ->route('admin.users.trades.index', $user)
            ->with('success', 'Trade updated successfully.');
    }


    // Close trade
    public function close(Request $request, User $user, Trade $trade)
    {
        $this->authorizeTrade($user, $trade);

        Log::info('Close trade attempt started', [
            'trade_id'    => $trade->id,
            'user_id'     => $user->id,
            'current_status' => $trade->status,
            'current_profit' => $trade->profit,
            'current_investment' => $trade->investment,
            'ip'          => $request->ip(),
        ]);

        $validated = $request->validate([
            'profit'     => 'required|numeric',
            'investment' => 'required|numeric|min:0.01',
        ]);

        Log::debug('Validated close data', $validated);

        try {
            DB::beginTransaction();

            Log::info('Transaction started - updating trade', [
                'trade_id' => $trade->id,
                'new_profit' => $validated['profit'],
                'new_status' => 'CLOSED',
            ]);

            $updated = $trade->update([
                'profit' => $validated['profit'],
                'status' => 'CLOSED',
            ]);

            Log::info('Trade update result', [
                'trade_id'      => $trade->id,
                'update_success' => $updated,           // true/false
                'fresh_profit'  => $trade->fresh()->profit,
                'fresh_status'  => $trade->fresh()->status,
            ]);

            // Refund investment + profit to balance
            $finalAmount = $validated['investment'] + $validated['profit'];

            Log::info('Crediting user balance', [
                'user_id'      => $user->id,
                'amount'       => $finalAmount,
                'old_balance'  => $user->trading_balance,
                'new_balance预计' => $user->trading_balance + $finalAmount,
            ]);

            $user->increment('trading_balance', $finalAmount);

            // Fetch fresh user balance after increment
            $user->refresh();

            Log::info('Balance updated successfully', [
                'user_id'      => $user->id,
                'new_balance'  => $user->trading_balance,
            ]);

            DB::commit();

            Log::info('Close trade transaction committed successfully', [
                'trade_id' => $trade->id,
                'user_id'  => $user->id,
            ]);

            return redirect()
                ->route('admin.users.trades.index', $user)
                ->with('success', 'Trade closed successfully. Balance updated.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Failed to close trade - rolled back', [
                'trade_id'    => $trade->id,
                'user_id'     => $user->id,
                'error'       => $e->getMessage(),
                'trace'       => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Failed to close trade: ' . $e->getMessage());
        }
    }

    private function authorizeTrade(User $user, Trade $trade)
    {
        if ($trade->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }
    }
}
