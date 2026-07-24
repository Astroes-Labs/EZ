<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class HeroBanner extends Component
{
    public $title;
    public $subtitle = '';

    public function render()
    {
        return view('livewire.shared.hero-banner');
    }
}