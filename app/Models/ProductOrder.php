<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model {
	protected $table = 'product_orders';
	protected $casts = [
    'products' => 'array', // Will convarted to (Array)
    'payment_details' => 'array', // Will convarted to (Array)
];
    protected $fillable = ['user_id', 'products','product_id', 'quantity', 'amount', 'order_status','delivery_address','payment_status','payment_method','payment_details','created_at','updated_at'];
    
}