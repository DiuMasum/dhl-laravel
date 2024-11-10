<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FabricProcessFlow extends Model
{
    protected $table = 'fabric_process_flows';

    protected $fillable = [
        'orderNo',
        'date',
        'buyer',
        'fabricType',
        'color',
        'gsm',
        'width',
        'quantity',
        'supplier',
        'shrinkage',
        'colorFastness',
        'defects',
        'fabric_inspection_status',
        'fabric_inspection_date',
        'fabric_inspection_remarks',
        'relaxation_status',
        'relaxation_date',
        'relaxation_remarks',
        'cutting_status',
        'cutting_date',
        'cutting_remarks',
    ];

    public function PurchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'orderNo');
    }

    public function Buyers()
    {
        return $this->belongsTo(Buyer::class, 'buyer');
    }
}
