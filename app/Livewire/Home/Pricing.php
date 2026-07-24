<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Pricing extends Component
{
    public function render()
    {
        return view('livewire.home.pricing')
            ->layout('layouts.app')
            ->title('Investments | ' . config('app.name'));
    }
}
