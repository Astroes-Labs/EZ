@include('livewire.dashboard.partials.copy-referral-link')
<div class="row">
    <div class="col-xl-12">

        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Referrals/Rank</h3>
            </div>
            <div class="site-card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="mb-4" style="font-size: 20px;">
                            Gain free promotion upgrade with each ascending affiliate rank. Your next rank will unlock
                            according to the ranking below.
                        </span><br><br>

                        @foreach ($ranks as $rank)
                            <span class="mb-4" style="font-size: 20px;">
                                <img src="assets/frontend/images/ranks/{{ $rank['icon'] }}" alt="{{ $rank['name'] }} Icon" style="height: 48px; width: 48px;">
                                <b>{{ $rank['name'] }}</b> ({{ $rank['name'] === 'Recruit' ? 0 : $rank['min_referrals'] . '-' . $rank['max_referrals'] }})

                                referrals) -
                                {{ $rank['interest'] }}% interest on every deposit
                            </span><br><br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>