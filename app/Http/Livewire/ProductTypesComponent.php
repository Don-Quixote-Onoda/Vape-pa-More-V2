<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductType;

class ProductTypesComponent extends Component
{
    public $name;
    public $type;

    // protected $rules = [
    //     'name' => ['required'],
    //     'type' => ['required']
    // ];

    // public function update($propertyName) {
    //     $this->validateOnly($propertyName);
    // }

    public function store() {
        // ProductType::create([
        //     'name' => $this->name,
        //     'type' => $this->type
        // ]);

        // session()->flash('success', 'Product Type Added!');
        // $this->reset();

        dd("ok");
    }

    public function render()
    {
        return view('livewire.product-types-component', [
            'producttypes' => ProductType::all()
        ]);
    }
}
