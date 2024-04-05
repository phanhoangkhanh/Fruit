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
    public $total_cost;

    protected $rules = [
        'fruit_choosen' 	=> 'required',
        'quantity' 		    => 'min:1',
        'customer'          => 'required',
    ];

    protected $messages = [
        'required' 			=> 'This :attribute must be filled',
        'min'               =>  'Min=1'
    ];

    public function callModal($id)
    {
        $this->invoice_id = $id;
        if($id > 0 ){
            $obj = Invoice::find($id);
            $this->customer = $obj->customer_id;
            $this->total_cost = $obj->total_cost;
            $this->num_invoice = $obj->number;
            $this->reset('fruit_choosen', 'fruit_name', 'price', 'max_volume', 'quantity');
        }elseif( $id == 0){
            $this->reset('customer', 'total_cost');
            $now = Carbon::now();
            $max_id = Invoice::max('id') + 1;
            $this->num_invoice = Carbon::parse($now)->format('ymd').$max_id;
            $this->total_cost = 0;
        }
        $this->emit('modal', ['show', "#invoice-modal"]);
    }

    public function choosenFruit()
    {
        $obj = FruitItem::find($this->fruit_choosen);
        $this->fruit_name = $obj->name;
        $this->max_volume = $obj->stock;
        $this->price = $obj->price;
    }

    public function createInvoiceItem()
    {
        $this->validate();
        //dd('ok');
        if( $this->invoice_id == 0){
            //create new Invoice + InvoiceItem
            $newInvoice = Invoice::create([
                'number'        => $this->num_invoice,
                'user_id'       => Auth::user()->id,
                'customer_id'   => $this->customer,
                'total_cost'    => 0  
            ]);
            $this->invoice_id = $newInvoice->id;
            $newObj = InvoiceItem::create(
                [
                    'invoice_id'    =>  $this->invoice_id,
                    'fruit_item_id' =>  $this->fruit_choosen,
                    'price_at_sell' =>  $this->price,
                    'quantity'      =>  $this->quantity
                ]
            );
        }else{
            $newObj = InvoiceItem::create(
                [
                    'invoice_id'    =>  $this->invoice_id,
                    'fruit_item_id' => $this->fruit_choosen,
                    'price_at_sell' =>  $this->price,
                    'quantity'      => $this->quantity
                ]
            );
        }
        $this->total_cost += $this->price*$this->quantity;
        $objItem = FruitItem::find($this->fruit_choosen);
        Invoice::find($this->invoice_id)->update(['total_cost' => $this->total_cost]);
        $objItem->update([
            'stock' =>  $objItem->stock - $this->quantity
        ]);
        $this->reset('fruit_choosen', 'fruit_name', 'quantity', 'price', 'max_volume');
    }

    public function eraseItem($id)
    {
        //turn back cost and quantity 
        $obj = InvoiceItem::find($id);
        $objFruitItem = FruitItem::find($obj->fruit_item_id);
        $objFruitItem->update([
            'stock' =>  $objFruitItem->stock + $obj->quantity
        ]);
        $this->total_cost -= $obj->price_at_sell*$obj->quantity;
        Invoice::find($obj->invoice_id)->update(['total_cost' => $this->total_cost]);
        InvoiceItem::find($id)->delete();

    }

    public function confirmInvoice()
    {
        $objInvoice = Invoice::find($this->invoice_id);
        if( $objInvoice ){
            $objInvoice->update(['customer_id' => $this->customer]);
            $this->emit('modal', ['hide', "#invoice-modal"]);
            $this->reset( 'customer', 'total_cost', 'invoice_id', 'num_invoice');
            $this->emit('rerender');
        }else{
            $this->reset( 'customer', 'total_cost', 'invoice_id', 'num_invoice');
            $this->emit('modal', ['hide', "#invoice-modal"]);
        }
        
    }

    public function render()
    {
        $list_invoice_item = InvoiceItem::where('invoice_id', $this->invoice_id)
                                ->with('hasInvoice','hasFruit')->get();
        $list_fruit = FruitItem::where('name', 'like', "%{$this->fruit_name}%")->get();
        $list_customer = Customer::all();
        return view("inside.invoice.update", compact('list_customer', 'list_fruit', 'list_invoice_item'));
    }
}