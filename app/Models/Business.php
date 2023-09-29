<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Business extends Model{
    protected $table = "business";
    protected $fillable = [ 
        'name', 
        'email', 
        'telephone', 
        'address', 
        'company_name', 
        'category_id', 
        'description',
        'user_id',
        'status'
    ];
    // public function items(){
    //     return $this->hasMany(Item::class);
    // }
}
