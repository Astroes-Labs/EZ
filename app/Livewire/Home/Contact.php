<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.home.contact')
            ->layout('layouts.app')
            ->title('Contact Us | ' . config('app.name'));
    }
}