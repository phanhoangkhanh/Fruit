<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\Customer;
use App\Http\Controllers\Helper;

class DeclareCustomer extends Component
{
    public $name;
    public $mobile;
    public $address;

    protected $rules = [
        'name' 			=> 'required|unique:customer,name',
        'address'       =>  'required',
        'mobile'        =>  'required'
    ];

    protected $messages = [
        'required' 			=> 'This :attribute must be required',
        'unique'			=> 'This Name has been declared !!'
    ];

    public function declareCus()
    {
        dd( Helper::getKhanh(2) );
        //dd($this->name);
        $this->validate();
        Customer::create([
            'name'      => $this->name,
            'mobile'    => $this->mobile,
            'address'   => $this->address
        ]);
        $this->emit('alert', ['info', "Customer has been declared"]);
        $this->reset('name', 'mobile', 'address');
        $this->emit('rerender');
    }

    public function render()
    {
        return view("inside.customer.declare");
    }
}