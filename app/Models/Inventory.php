<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model {
    protected $table = 'product_inventory';
    protected $fillable = ['name', 'description', 'code', 'created_by', 'image'];
    public function items(){
        return $this->hasMany(Item::class);
    }
}