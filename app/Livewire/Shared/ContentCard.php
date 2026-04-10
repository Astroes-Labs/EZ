<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class ContentCard extends Component
{
    public $title;
    public $subtitle = '';
    public function render()
    {
        return view('livewire.shared.content-card');
    }
}
