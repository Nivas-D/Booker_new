<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use Validator;

class BusinessController extends Controller {
    
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'id';
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

        if ($request->has('searchBusiness') && $request->input('searchBusiness')!== '') {
            $searchText = $request->input('searchBusiness');            
            $business = DB::table('business')->where('business.name', 'LIKE',"%{$searchText}%")->orWhere('business.email', 'LIKE',"%{$searchText}%")->orWhere('business.telephone', 'LIKE',"%{$searchText}%")->orWhere('business.company_name', 'LIKE',"%{$searchText}%")->orWhere('categories.name', 'LIKE',"%{$searchText}%")->orWhere('business.created_at', 'LIKE',"%{$searchText}%")->orWhere('categories.name', 'LIKE',"%{$searchText}%")->orderby($orderByValue,$orderBy)
                ->orderBy($orderByValue, $orderBy)
                ->leftJoin('users', 'users.id', '=', 'business.user_id')
                ->leftJoin('categories', 'categories.id', '=', 'business.category_id')
                ->select('business.*', 'users.name as user_name','categories.name as category')
                ->whereNull('business.user_id')
                ->get();

        }else{
                $business = DB::table('business')
                ->orderBy($orderByValue, $orderBy)
                ->leftJoin('users', 'users.id', '=', 'business.user_id')
                ->leftJoin('categories', 'categories.id', '=', 'business.category_id')
                ->select('business.*', 'users.name as user_name','categories.name as category')
                ->whereNull('business.user_id')
                ->get();
        } 
        // 
        return view('admin.business.index', compact('business','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function register(Request $request,$id){
        
    }
}