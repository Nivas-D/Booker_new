<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model {
    protected $fillable = [
        'name', 
        'email', 
        'phone',
        'gender',
        'skills', 
        'experience', 
        'payment_type',
        'hourly_rate', 
        'availability', 
        'likedin_url', 
        'portfolio_url',
        'created_by', 
        'photo' 
    ];
    public function items(){
        return $this->hasMany(Item::class);
    }
}
