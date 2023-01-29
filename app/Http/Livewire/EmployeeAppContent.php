<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmployeeAppContent extends Component
{
    public $navigation = 'dashboard';

    public function render()
    {
        return view('livewire.employee-app-content');
    }

    public function showNav($navigation_name) {
        $this->navigation = $navigation_name;
    }
}
