<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    public function dashboard(){
        $products = Product::orderBy('id', 'desc')
            ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')
            ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
            ->select('services.*', 'industries.name as industry_name')->limit(3)->get();
        $stats = [
            'userCount' => DB::table('users')->count(),
            'productCount' => DB::table('products')->count(),
            'serviceCount' => DB::table('services')->count(),
            'freelancerCount' => DB::table('freelancers')->count()
        ];
        return view('admin.dashboard', compact('products', 'services', 'stats'));
    } 
    public function contactMessages(){
        $messages = DB::table('contact_messages')->orderBy('created_at', 'desc')->get();
        return view('admin.contact-messages', compact('messages'));
    }
}