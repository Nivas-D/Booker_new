<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Owner\ProductController;
use App\Http\Controllers\Owner\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller {
    public function dashboard(){
        $products = Product::orderBy('id', 'desc')
            ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.owner_id', '=', auth()->id())
            ->select('products.*', 'categories.name as category_name')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')
            ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
            ->where('services.owner_id', '=', auth()->id())
            ->select('services.*', 'industries.name as industry_name')->limit(3)->get();
        $stats = [
            'productCount' => DB::table('products')->where('owner_id', '=', auth()->id())->count(),
            'serviceCount' => DB::table('services')->where('owner_id', '=', auth()->id())->count(),
            'productOrdersCount' => (new ProductController())->getProductOrdersAmount(),
            'serviceOrdersCount' => (new ServiceController())->getServiceBookingsAmount()
        ];
        return view('owner.dashboard', compact('products', 'services', 'stats'));
    } 
}