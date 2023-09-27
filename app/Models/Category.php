<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = ['name', 'description', 'code', 'created_by', 'image','description_german','description_france','status','industry'];
    public function items(){
        return $this->hasMany(Item::class);
    }
}
