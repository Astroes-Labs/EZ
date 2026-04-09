<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Terms extends Component
{
    public function render()
    {
        return view('livewire.home.terms')
            ->layout('layouts.app')
            ->title('Terms and Conditions | ' . config('app.name'));
    }
}