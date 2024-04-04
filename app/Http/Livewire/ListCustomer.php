<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use App\Models\Customer;

class ListCustomer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $mobile;
    public $address;

    protected $listeners = [
        'rerender'              => '$refresh'
    ];

    public function render()
    {
        $list = Customer::paginate(5) ?? '';
        // dd($this->lists->ToArray());
        return view("inside.customer.list", compact('list'));
    }
}