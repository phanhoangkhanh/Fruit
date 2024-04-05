<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\FruitItem;

class InvoiceItem extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'invoice_item';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id',
        'fruit_item_id',
        'price_at_sell',
        'quantity'
    ];

    public function hasInvoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    public function hasFruit()
    {
        return $this->belongsTo(FruitItem::class, 'fruit_item_id', 'id');
    }


}