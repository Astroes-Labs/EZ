<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $charts;
    protected $dataApi;

    public function __construct(FinancialDataController $financialDataController)
    {
        $this->charts = Auth::user()->charts(); // Assign it in the constructor
        $this->dataApi = $financialDataController;
    }



    public function getChart(Request $request)
    {
        $chartKey = $request->input('chart_key');

        if (!isset($this->charts[$chartKey])) {
            return response()->json(['error' => 'Invalid chart key'], 400);
        }

        $chart = $this->charts[$chartKey];

        $widgetHtml = view('livewire.dashboard.partials.tradingview_widget', compact('chart'))->render();

        return response()->json(['widget' => $widgetHtml]);
    }
    public function index()
    {
        $this->calculateAndStoreTradeProfits();
        $tradeHistory = Trade::where('user_id', Auth::id())->where('status', 'CLOSED')->get();
        $openTrades = Trade::where('user_id', Auth::id())->where('status', 'OPEN')->get();
        $charts = $this->charts;
        return view('layouts.app.trade.index', compact('tradeHistory', 'openTrades', 'charts'));
    }



    public function calculateAndStoreTradeProfits()
{
    try {
        // Get the logged-in user
        $user = auth()->user();

        // Fetch all open trades for the logged-in user
        $openTrades = Trade::where('status', 'OPEN')
            ->where('user_id', $user->id)
            ->get();

        foreach ($openTrades as $trade) {
            $currentValue = 0;
            $profitOrLoss = 0;

            // Fetch the current market value based on the trade's market
            switch (strtolower($trade->market)) {
                case 'crypto':
                    $coin = $trade->symbol;
                    $base = substr($coin, 0, strlen($coin) - 4); // Remove last 4 characters
                    $quote = substr($coin, -3); // Get last 3 characters as quote
                    $response = $this->dataApi->coinvalue($base, 1); // Fetch the price for 1 unit
                    $data = $response->getData();
                    if (isset($data->cash_balance)) {
                        $currentValue = $data->cash_balance; // Current price of 1 unit
                    }
                    break;

                case 'forex':
                    $response = $this->dataApi->forexvalue($trade->symbol); // Fetch the current exchange rate
                    $data = $response->getData();
                    if (isset($data->exchange_rate)) {
                        $currentValue = $data->exchange_rate; // Current exchange rate
                    }
                    break;

                case 'stock':
                    $response = $this->dataApi->stockvalue($trade->symbol); // Fetch the price for 1 unit
                    $data = $response->getData();
                    if (isset($data->stock_price)) {
                        $currentValue = $data->stock_price; // Current price of 1 unit
                    }
                    break;

                default:
                    break; // Skip invalid trade types
            }

            // Ensure we have a valid current value
            if ($currentValue <= 0) {
                continue;
            }

            // Simulate profit (90% chance of profit)
            $isProfitable = (rand(1, 100) <= 90); // 90% chance to be profitable
            $profitFactor = $this->generateProfitFactor($trade->investment); // Random profit factor based on investment

            if ($isProfitable) {
                // For profitable trades, ensure the price moves in the favorable direction
                if (strtoupper($trade->type) === 'BUY') {
                    // For BUY, currentValue should be higher than opening_price for profit
                    $currentValue = $trade->opening_price * (1 + ($profitFactor / 100));
                    $profitOrLoss = (($currentValue - $trade->opening_price) / $trade->opening_price) * $trade->investment * $trade->multiplier;
                } elseif (strtoupper($trade->type) === 'SELL') {
                    // For SELL, currentValue should be lower than opening_price for profit
                    $currentValue = $trade->opening_price * (1 - ($profitFactor / 100));
                    $profitOrLoss = (($trade->opening_price - $currentValue) / $trade->opening_price) * $trade->investment * $trade->multiplier;
                }
            } else {
                // For the 10% loss case, simulate a small loss
                if (strtoupper($trade->type) === 'BUY') {
                    $currentValue = $trade->opening_price * (1 - (rand(1, 5) / 100)); // Small loss (1-5%)
                    $profitOrLoss = (($currentValue - $trade->opening_price) / $trade->opening_price) * $trade->investment * $trade->multiplier;
                } elseif (strtoupper($trade->type) === 'SELL') {
                    $currentValue = $trade->opening_price * (1 + (rand(1, 5) / 100)); // Small loss (1-5%)
                    $profitOrLoss = (($trade->opening_price - $currentValue) / $trade->opening_price) * $trade->investment * $trade->multiplier;
                }
            }

            // Round the profit or loss to 4 decimal places
            $profitOrLoss = round($profitOrLoss, 4);

            // Update the trade entry in the database
            $trade->closing_price = $currentValue;
            $trade->profit = $profitOrLoss;
            $trade->updated_at = now();
            $trade->save();
        }

        return true; // Indicate successful execution
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error calculating trade profits: ' . $e->getMessage());
        return false; // Indicate failure
    }
}

/**
 * Generate a random profit factor proportional to the investment
 */
private function generateProfitFactor($investment)
{
    // Define base profit percentage range (1% to 10%)
    $baseProfit = rand(1, 10);
    
    // Scale profit based on investment
    $scalingFactor = log($investment + 1, 10); // Logarithmic scaling to avoid extreme profits
    $maxProfit = $baseProfit * min($scalingFactor, 3); // Cap scaling at 3x to keep it reasonable

    return $maxProfit; // Returns a percentage (e.g., 2.5 for 2.5%)
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trade $trade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trade $trade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trade $trade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trade $trade)
    {
        //
    }
}
