<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterModal extends Component
{
    public $name;
    public $pass;
    public $rePass;
    public $wrongPass = null;

    protected $listeners = [
        'rerender' => '$refresh'
    ];

    protected $rules = [
        'name' => 'required',
        'pass' => 'required|min:4'
    ];

    protected $messages = [
        'required' => 'The :attribute field is required.',
        'max:4' => 'This must be have at least 4 characters'
    ];

    public function registerNewUser()
    {
        $this->validate();
        if( $this->pass != $this->rePass){
            $this->wrongPass = "Your ReType Password isn't correct ";
        }else {
            $now = Carbon::now();
            User::create([
                'name'      => $this->name,
                'password'  => Hash::make($this->pass),
                'sign_day'  => Carbon::parse($now)->format('Y-m-d') 
            ]);
            $this->emit('alert',['info',"Thank you, Welcome!!!"]);
            $this->emit('modal', ['hide', "#modal-register"]);
            $this->reset('name', 'pass', 'rePass');
        }
    }

    public function render()
    {
        return view("register-form");
    }
}