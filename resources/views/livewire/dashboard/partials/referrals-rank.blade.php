@include('livewire.dashboard.partials.copy-referral-link')

<div class="row mt-4">
    <div class="col-xl-12">
        <div class="tactile-card p-4">
            
            <!-- Header Section -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center pb-4 mb-4" style="border-bottom: 1px solid var(--border-subtle); gap: 1rem;">
                <div>
                    <h3 class="title mb-1" style="color: var(--text-primary); font-size: 1.25rem; font-weight: 600;">Affiliate Ranks & Progression</h3>
                    <p class="mb-0" style="color: var(--text-muted); font-size: 0.875rem;">Scale your rank to unlock higher deposit interest yields and free promotional perks.</p>
                </div>
                <div class="tactile-badge tactile-badge-accent" style="align-self: flex-start; align-self: md-center;">
                    <i class="anticon anticon-trophy me-1"></i> Tier System Active
                </div>
            </div>

            <!-- Modern Grid-Based Rank Matrix Layout -->
            <div class="row g-3">
                @foreach ($ranks as $rank)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="tactile-card-inset p-3 h-100 d-flex flex-column justify-content-between" style="position: relative; overflow: hidden;">
                            
                            <!-- Top row: Icon & Status Tag -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="tactile-badge tactile-badge-accent" style="width: 48px; height: 48px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; padding: 0;">
                                    <img src="{{ asset('assets/frontend/images/ranks/' . $rank['icon']) }}"
                                        alt="{{ $rank['name'] }} Icon" style="height: 32px; width: 32px; object-fit: contain;">
                                </div>
                                <span class="tactile-badge" style="font-size: 0.7rem;">
                                    {{ $rank['name'] === 'Recruit' ? 'Base Tier' : $rank['min_referrals'] . '+ Refs' }}
                                </span>
                            </div>

                            <!-- Body: Rank Info -->
                            <div class="mb-3">
                                <h4 style="color: var(--text-primary); font-size: 1rem; font-weight: 600; margin-bottom: 0.25rem;">
                                    {{ $rank['name'] }}
                                </h4>
                                <p style="color: var(--text-muted); font-size: 0.8125rem; margin-bottom: 0;">
                                    Requirement: <strong style="color: var(--text-secondary);">{{ $rank['name'] === 'Recruit' ? '0' : $rank['min_referrals'] . ' - ' . $rank['max_referrals'] }}</strong> referrals
                                </p>
                            </div>

                            <!-- Bottom Row: Reward Metric -->
                            <div class="pt-3" style="border-top: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: between;">
                                <span style="font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Deposit Interest</span>
                                <span style="color: var(--accent-primary); font-weight: 700; font-size: 1rem;" class="text-glow">
                                    +{{ $rank['interest'] }}%
                                </span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>