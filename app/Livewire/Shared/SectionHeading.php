<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class SectionHeading extends Component
{
    
    public $title;
    
    public $subtitle = '';

    public function render()
    {
        return view('livewire.shared.section-heading');
    }
}
