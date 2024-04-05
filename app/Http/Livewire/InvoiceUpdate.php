<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\FruitItem;
use App\Models\InvoiceItem;

class InvoiceUpdate extends Component
{
    protected $listeners = [
        'emitCallModal' => 'callModal'
    ];
    public $num_invoice;
    public $invoice_id = 0;
    public $customer;
    public $fruit_name;
    public $fruit_choosen;
    public $max_volume;
    public $quantity;
    public $price;


    public function callModal($id)
    {
        $this->invoice_id = $id;
        $this->emit('modal', ['show', "#invoice-modal"]);
    }

    public function mount()
    {
        if( $this->invoice_id == 0 ){
            $now = Carbon::now();
            $max_id = Invoice::max('id') + 1;
            $this->num_invoice = Carbon::parse($now)->format('ymd')."-".$max_id;
        }
        
    }

    public function choosenFruit()
    {
        $obj = FruitItem::find($this->fruit_choosen);
        $this->fruit_name = $obj->name;
        $this->max_volume = $obj->stock;
        $this->price = $obj->price;
    }

    public function render()
    {
        $list_fruit = FruitItem::where('name', 'like', "%{$this->fruit_name}%")->get();
        $list_customer = Customer::all();
        return view("inside.invoice.update", compact('list_customer', 'list_fruit'));
    }
}