<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Testimonials extends Component
{
    public function render()
    {
        return view('livewire.home.testimonials')
            ->layout('layouts.app')
            ->title('Testimonials | ' . config('app.name'));
    }
}
