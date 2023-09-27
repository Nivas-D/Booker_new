<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['active', 'name', 'description', 'code', 'price_original', 'price_discounted', 'user_id', 'category_id', 'owner_id', 'image'];
    public function items(){
        return $this->hasMany(Item::class);
    }
}