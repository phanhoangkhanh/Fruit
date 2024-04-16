<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class TodoListController extends Controller
{
    //
    public function store(Request $request)
    {
        $list = Customer::create(['name' => $request->name, 'address' => $request->address]);
        return response($list, 201); //201 to create something 
    }
}
