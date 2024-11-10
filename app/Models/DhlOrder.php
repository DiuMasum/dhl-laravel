<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DhlOrder extends Model
{

    use HasFactory;

    protected $table = 'dhl_orders';

    protected $fillable = [
        'order_no',
        'buyer',
        'po_name',
        'contact_person',
        'hs_code',
        'product_name',
        'price',
        'dimension_length',
        'dimension_width',
        'dimension_height',
        'weight_unit',
        'net_weight',
        'gross_weight',
        'quantity',
        'order_type',
        'banking_order',
        'remarks',
        'sample_type',
        'tracking_number',
        'shipment_date',
        'delivery_date',
        'awb',
        'label',
        'invoice',      
    ];

}
