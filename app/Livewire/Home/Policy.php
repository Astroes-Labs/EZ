<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Policy extends Component
{
    public function render()
    {
        return view('livewire.home.policy')
            ->layout('layouts.app')
            ->title('Policy | ' . config('app.name'));
    }
}