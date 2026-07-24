<?php

use Livewire\Component;

new class extends Component
{
    public $theme = 'light';

    public function mount()
    {
        $this->theme = session('theme', 'light');
    }

    public function toggle()
    {
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';
        session(['theme' => $this->theme]);
        $this->dispatch('theme-changed');
    }
};

?>

<div class="fixed bottom-4 right-4 bg-white rounded-full p-2 shadow-lg hover:shadow-xl transition-shadow duration-300 z-50">
    <button wire:click="toggle" class="text-red-500 focus:outline-none">jndfjndjn
        @if ($theme === 'light')
            <i class="fa fa-moon-o text-xl" aria-hidden="true"></i>
        @else
            <i class="fa fa-sun-o text-xl" aria-hidden="true"></i>
        @endif
    </button>
</div>