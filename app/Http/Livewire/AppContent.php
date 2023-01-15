<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AppContent extends Component
{

    public $navigation = 'dashboard';

    public function render()
    {
        return view('livewire.app-content');
    }

    public function showNav($navigation_name) {
        $this->navigation = $navigation_name;
    }
}
