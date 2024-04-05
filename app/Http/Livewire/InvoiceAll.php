<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $customer_looking;   

    public function getListsProperty()
    {
        return Invoice::with('hasUser', 'hasItem', 'hasCustomer')->when($this->customer_looking, function($qr){
            $qr->whereRelation('hasCustomer', 'name', 'like', "%{$this->customer_looking}%");
        } );
    }

    public function callModal($id)
    {
        $this->emit('emitCallModal', $id);
    }

    public function render()
    {
        $list = $this->lists->paginate(5);
        return view("inside.invoice.all", compact('list'));
    }
}