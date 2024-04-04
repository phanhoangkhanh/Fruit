<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\Customer;

class DeclareFruit extends Component
{

    public function render()
    {
        return view("inside.fruit.declare-item");
    }
}