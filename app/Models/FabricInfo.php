<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FabricInfo extends Model
{
    protected $table = 'fabric_infos';

    protected $fillable = [
        'order_no',
        'order_date',
        'buyer_name',
        'style_number',
        'product_category',
        'product_description',
        'quantity',
        'target_price',
        'delivery_date',
        'fabric_type',
        'color',
        'material_composition',
        'quality_standards',
        'testing_requirements',
    ];

    public function PurchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'order_no');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_name');
    }
}
