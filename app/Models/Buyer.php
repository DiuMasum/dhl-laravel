<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buyer extends Model
{
    use HasFactory;
    
    protected $table = 'buyers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'building',
        'street',
        'suburb',
        'city',
        'state',
        'postcode',
        'country',
        'instructions',
    ];

    

    
}
