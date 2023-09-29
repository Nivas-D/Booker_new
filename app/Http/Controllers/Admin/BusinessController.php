<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\User;
use Validator;
use Mail;
use App\Mail\BusinnessLoginRegister;
use Illuminate\Support\Facades\Hash;

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
                ->whereNotNull('business.user_id')
                ->orWhereNull('business.user_id')
                ->get();

        }else{
                $business = DB::table('business')
                ->orderBy($orderByValue, $orderBy)
                ->leftJoin('users', 'users.id', '=', 'business.user_id')
                ->leftJoin('categories', 'categories.id', '=', 'business.category_id')
                ->select('business.*', 'users.name as user_name','categories.name as category')
                ->whereNotNull('business.user_id')
                ->orWhereNull('business.user_id')
                ->get();
        } 
        // 
        return view('admin.business.index', compact('business','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function approve(Request $request,$id){
        $business = DB::table('business')->where('business.id','=',$id)->first();
       
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $password = substr(str_shuffle($data), 0,6);
       
        if ($business) {
            $user = User::create([
                'name'=>$business->company_name,
                'first_name' => $business->company_name,
                'last_name' => '',
                'email' => $business->email,
                'role'=>'owner',
                'role_id' => 3,
                'password' => Hash::make($password),
            ]);
            $newUserId = $user->id;
            DB::table('business')
            ->where('id', $business->id)
            ->update(['user_id' => $newUserId,'status' => 1,'password' => $password]);
            $mailData = [
                "name" => $business->company_name,
                "email" => $business->email,
                "password" => $password,
                "link" => "http://bookertest.aryvart.com/business/login",//URL::to('/');
                "title" => "Approval confirmation",
            ];
            $isEmailed = Mail::to($business->email)->send(
                new BusinnessLoginRegister($mailData)
            );
            return redirect()->route("admin.business.index")->with('success', 'Business Registered Approved successfully');
        }
        
        print_r($business);
        echo $id;
        exit();
    }


}