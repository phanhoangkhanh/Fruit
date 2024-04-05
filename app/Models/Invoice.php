<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceItem;
use App\Models\User;
use App\Models\Customer;

class Invoice extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'invoice';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'user_id',
        'customer_id',
        'total_cost'
    ];

    public function hasItem()
    {
    	return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public function hasUser()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hasCustomer()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}