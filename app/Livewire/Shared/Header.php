<?php

namespace App\Livewire\Shared;
use Livewire\Component;

class Header extends Component
{
    public $menuOpen = false;
    public $subOpen = [];

    public function toggleMenu()
    {
        $this->menuOpen = !$this->menuOpen;
    }

    public function toggleSub($key)
    {
        $this->subOpen[$key] = !($this->subOpen[$key] ?? false);
    }

    public function render()
    {
        return view('livewire.shared.header');
    }
}