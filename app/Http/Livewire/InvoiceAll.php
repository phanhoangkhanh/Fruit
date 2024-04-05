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
    protected $listeners = [
        'rerender' => '$refresh'
    ];
    public $delete_id;
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

    public function setDeleteID($id)
    {
        $this->delete_id = $id;
    }

    public function confirmDelete()
    {
        $item_list = InvoiceItem::where('invoice_id', $this->delete_id)->get();
        foreach( $item_list as $per){
            $per->delete();
        }
        Invoice::find($this->delete_id)->delete();
        $this->emit('alert', ['alert-danger', 'Deleted Invoice']);
        $this->emit('modal', ['hide', '#modal-delete']);
        $this->emit('rerender');

    }

    public function render()
    {
        $list = $this->lists->paginate(6);
        return view("inside.invoice.all", compact('list'));
    }
}