<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Table name
    protected $table = 'purchase_order_details';

    // Fillable fields for mass assignment
    protected $fillable = [
        'purchase_order_no',
        'sl_no',
        'color',
        'item_name',
        'style_article_no',
        'lab_dip_no',
        'approve_option',
        'match_ref',
        '9_12_qty',
        '9_12_ratio',
        '9_12_total',
        '12_18_qty',
        '12_18_ratio',
        '12_18_total',
        '18_24_qty',
        '18_24_ratio',
        '18_24_total',
        '2_3_qty',
        '2_3_ratio',
        '2_3_total',
        '3_4_qty',
        '3_4_ratio',
        '3_4_total',
        '4_5_qty',
        '4_5_ratio',
        '4_5_total',
        '5_6_qty',
        '5_6_ratio',
        '5_6_total',
        'order_qty',
        'order_ratio',
        'order_total'
    ];

    // If there's a relation with the first table
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_no', 'po_number');
    }
}
