<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\User\ProductController;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function dashboard(){
        $products = Product::orderBy('created_at', 'desc')
            ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 'yes')
            ->select('products.*', 'categories.name as category_name')->limit(4)->get();
        $services = Service::orderBy('created_at', 'desc')
            ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
            ->where('services.active', 'yes')
            ->select('services.*', 'industries.name as industry_name')->limit(4)->get();
        $stats = [
            'productOrdersCount' => DB::table('product_orders')->where('user_id', auth()->id())->count(),
            'serviceBookingsCount' => DB::table('service_bookings')->where('user_id', auth()->id())->count(),
            'productOrdersAmount' => DB::table('product_orders')->where('user_id', auth()->id())->sum('amount'),
            'serviceBookingsAmount' => DB::table('service_bookings')->where('user_id', auth()->id())->sum('amount'),
        ];
        return view('user.dashboard', compact('products', 'services', 'stats'));
    } 
}