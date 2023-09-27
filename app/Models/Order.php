<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['name', 'description', 'code', 'created_by', 'image'];
    public function items(){
        return $this->hasMany(Item::class);
    }
}