<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Basket;
use App\Models\Characteristic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'brand_id', 'name', 'price'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

    public function characteristic()
    {
        return $this->belongsToMany(Characteristic::class);
    }
}
