<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.home.faq')
            ->layout('layouts.app')
            ->title('FAQs | ' . config('app.name'));
    }
}