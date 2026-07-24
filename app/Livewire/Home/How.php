<?php

namespace App\Livewire\Home;

use Livewire\Component;

class How extends Component
{
    public function render()
    {
        return view('livewire.home.how')
            ->layout('layouts.app')
            ->title('How It Works | ' . config('app.name'));
    }
}