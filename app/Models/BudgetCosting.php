<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetCosting extends Model
{
    protected $table = 'budget_costings';

    protected $fillable = [
        'style_no',
        'buyer',
        'season',
        'product_type',
        'target_price',
        'moq',
        'exchange_rate',
        'fabric_cost',
        'consumption',
        'trim_cost',
        'cm_cost',
        'wash_cost',
        'overhead',
    ];

    public function Buyerr()
    {
        return $this->belongsTo(Buyer::class, 'buyer');
    }
}
