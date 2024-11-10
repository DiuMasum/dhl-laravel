<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trims extends Model
{
    protected $table = 'trims';

    protected $fillable = [
        'trimId',
        'trimName',
        'category',
        'material',
        'color',
        'size',
        'unitPrice',
        'minStock',
        'currentStock',
        'supplier',
        'leadTime',
        'moq',
        'notes',
    ];

}
