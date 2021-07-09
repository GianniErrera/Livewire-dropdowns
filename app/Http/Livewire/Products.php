<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{

    protected $listeners = ['refreshProducts' => '$refresh'];

    public $orderProducts = [];
    public $allProducts = [];
    public $total = 0;

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
        //$this->emit('refreshProducts');
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function render()
    {
        info($this->orderProducts);
        return view('livewire.products');
    }
}
