<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $fillable = [ 
        'name', 
        'email', 
        'phone', 
        'gender', 
        'dob', 
        'address', 
        'photo',
        'dept_id',
        'user_id',
        'owner_id'
    ];
    public function items(){
        return $this->hasMany(Item::class);
    }
}
