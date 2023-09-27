<?php
namespace App\Models;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class MainService extends Model {
    protected $fillable = ['status', 'name',  'industry_id','category_id'];
    protected $table = "main_services";
}