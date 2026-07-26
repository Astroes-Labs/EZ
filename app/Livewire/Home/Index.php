<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.home.index')
            ->layout('layouts.app')
            ->title('Welcome To ' . config('app.name') . ' - Trade on all Markets with ease');
    }
}