<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.home.privacy')
            ->layout('layouts.app')
            ->title('Privacy Policy | ' . config('app.name'));
    }
}