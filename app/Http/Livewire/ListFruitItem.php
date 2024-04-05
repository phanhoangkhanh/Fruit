<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\FruitItem;

class ListFruitItem extends Component
{
    protected $listeners = [
        'rerender' => '$refresh'
    ];
    public $info_stock_array = [];
    public $info_price_array = [];

    public function updateItem($id)
    {
        //dd( $this->info_stock_array[$id]);
        $obj = FruitItem::find($id);
        $obj->update([
            'stock' =>  $this->info_stock_array[$id] ?? $obj->stock ,
            'price' =>  $this->info_price_array[$id] ?? $obj->price 
        ]);
        $this->emit('alert', ['info', 'Update Completed']);
        $this->reset('info_stock_array', 'info_price_array');
    }

    public function render()
    {
        $list = FruitItem::all();
        return view("inside.fruit.list-item", compact('list'));
    }
}