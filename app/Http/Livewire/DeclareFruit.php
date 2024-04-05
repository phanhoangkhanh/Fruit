<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Auth;
use App\Models\FruitCategory;
use App\Models\FruitItem;

class DeclareFruit extends Component
{
    public $name_cate;
    public $origin;
    public $size;
    public $fruit_cate;
    public $unit;
    public $price;
    public $wrong = false;

    protected $rules = [
        'name_cate' => 'required|unique:fruit_category,name'
    ];

    protected $messages = [ 
        'required'  => 'No Blank',
        'unique'    =>  'Has been declared in previous time'

    ];

    public function callDeclareModal()
    {
        $this->emit('modal', ['show', "#declare-category"]);
    }

    public function declareComfirmCate()
    {
        $this->validate();
        FruitCategory::create([
            'name' => $this->name_cate
        ]);
        $this->emit('modal', ['hide', "#declare-category"]);
        $this->reset('name_cate');
    }

    public function declareItem()
    {
        $this->validate(
            [
                'origin'    =>  'required',
                'size'      =>  'required',
                'fruit_cate'=>  'required',
                'unit'      =>  'required',
                'price'     =>  'required',
            ],
            [
                'required'  => 'No Blank',
            ]
        );
        $new_code = substr($this->origin,0,2).'-'.
                substr($this->size,0,1).'-'.substr($this->fruit_cate,0,strpos($this->fruit_cate,'-'));
        $new_name = substr($this->origin,3,100).' '.substr($this->size,2,8)
                .' '.substr($this->fruit_cate,-(int)(strlen($this->fruit_cate) - (int)strpos($this->fruit_cate,'-') - 1 ));
            //dd($new_name);
        $list_code = FruitItem::get('code')->unique();
        foreach( $list_code as $per){
            if( $per->code == $new_code) {
                $this->wrong = true;
                $this->emit('alert', ['alert-danger', 'OOP!!!']);
            }else{
                FruitItem::create([
                    'category_id'   =>  substr($this->fruit_cate,0,strpos($this->fruit_cate,'-')),
                    'code'          =>  $new_code,
                    'name'          =>  $new_name,
                    'unit'          =>  $this->unit,
                    'price'         =>  $this->price,
                    'stock'         =>  0
                ]);
                $this->emit('alert', ['success', 'New Item has been declared']);
                $this->reset('wrong', 'fruit_cate', 'origin', 'size', 'unit', 'price');
                $this->emit('rerender');
            }
        }
    }
    public function render()
    {
        $list_cate = FruitCategory::all();
        return view("inside.fruit.declare-item", compact('list_cate'));
    }
}