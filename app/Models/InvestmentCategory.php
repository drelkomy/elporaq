<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sector'];

    public function opportunities()
    {
        return $this->hasMany(InvestmentOpportunity::class);
    }


    public function investmentOpportunities()
    {
        return $this->hasMany(InvestmentOpportunity::class, 'category_id');
    }
}