<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sale_price',
        'rental_price',
        'size',
        'user_id',
        'category_id',
        'item_type',
    ];

    public function itemImages()
    {
        return $this->hasMany(ItemImage::class);
    }
}
