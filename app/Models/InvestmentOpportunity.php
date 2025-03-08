<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentOpportunity extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'title', 'description', 'category_id', 'image', 'project_features',
        'project_products', 'production_process', 'required', 'financial_indicators', 'project_ser',
    ];

    
    // InvestmentOpportunity.php
    public function category()
    {
        return $this->belongsTo(InvestmentCategory::class, 'category_id');
    }

}

   


