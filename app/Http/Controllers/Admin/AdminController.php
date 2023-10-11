<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    public function __construct(){
        $this->middleware('roles:admin');
    }
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
    public function contactMessages(Request $request){
        $searchText = '';
        $orderByValue = 'created_at';
        $orderBy = 'desc';          
        if($request->has('orderByValue') && $request->input('orderByValue')!== ''){
            $orderByValue = $request->input('orderByValue');
            $orderBy = $request->input('orderBy');    
        }
        if($orderBy === 'asc'){
            $orderByOpp = 'desc';
        }else{
            $orderByOpp = 'asc';
        }         
        if ($request->has('searchContactMessages') && $request->input('searchContactMessages')!== '') {
            $searchText = $request->input('searchContactMessages');            
            $messages = DB::table('contact_messages')->where('name', 'LIKE',"%{$searchText}%")->orWhere('email', 'LIKE',"%{$searchText}%")->orWhere('title', 'LIKE',"%{$searchText}%")->orWhere('message', 'LIKE',"%{$searchText}%")->orderBy($orderByValue,$orderBy)->get();
        }else{
            $messages = DB::table('contact_messages')->orderBy($orderByValue,$orderBy)->get();   
        }         
        return view('admin.contact-messages', compact('messages','searchText','orderByValue','orderBy','orderByOpp'));
    }
}