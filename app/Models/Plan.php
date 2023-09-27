<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
    protected $fillable = [
        'name', 'description', 
        'price', 'features', 'frequency', 'trial_period',
        'created_by'
    ];
    public function items(){
        return $this->hasMany(Item::class);
    }
}