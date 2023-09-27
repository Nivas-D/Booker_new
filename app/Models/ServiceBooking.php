<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model {
    protected $table = 'service_bookings';
    protected $fillable = ['user_id', 'service_id', 'type', 'amount', 'booking_status', 'payment_method', 'payment_status'];
    // public function items(){
    //     return $this->hasMany(Item::class);
    // }
}