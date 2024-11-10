<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    // Table name
    protected $table = 'purchase_orders';

    // Fillable fields for mass assignment
    protected $fillable = [
        'po_number', 
        'style_name_no', 
        'unit_price', 
        'order_receive_date', 
        'shipment_date', 
        'destination', 
        'delivery_at', 
        'order_qty', 
        'breakdown_type', 
        'excess_cut'
    ];

    // If there's a relation with the second table, define it
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'purchase_order_no', 'po_number');
    }
}
