<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otherscost extends Model
{
    protected $table = 'otherscosts';

    protected $fillable = [
        'costDate',
        'costType',
        'amount',
        'currency',
        'department',
        'costCenter',
        'description',
        'invoiceNo',
        'vendorName',
    ];
}
