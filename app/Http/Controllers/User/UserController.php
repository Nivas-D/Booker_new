<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Cart;
use App\Http\Controllers\User\ProductController;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Auth;

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
        $user = Auth::user();
        $myorder = ProductOrder::with('product')->get()->where('user_id', auth()->id());
        $mycart = Cart::with('product')->get()->where('user_id', auth()->id());
        return view('user.dashboard.index', compact('products', 'services', 'stats','mycart','myorder','user'));
    } 

    public function myOrderDetails(Request $request,$id){
        $orderId = base64_decode($id);
        $orderDetails = ProductOrder::with('product')->find($orderId);
        return view('user/orders/order-details', compact('orderDetails'));
    }
    public function myOrderServiceDetails(){
        // $orderId = base64_decode($id);
        // $orderDetails = ProductOrder::with('product')->find($orderId);
        return view('user/orders/order-service-details');
    }
    public function updateUserGeneralDetails(Request $request)
    {
        $user = Auth::user();
        // Validate
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ], [
                "first_name.required" => "Please fill out the firstname field.",
                "last_name.required" => "Please fill out the lastname field.",
                // Custom messages for other rules
            ]);

        // Update the user's details
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->name = $request->input('first_name').' '.$request->input('last_name');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->pincode = $request->input('pincode');
        $user->country = $request->input('country');
        $user->phone = $request->input('phone');

        // Save the changes
        $user->save();
        return redirect()->route('user/dashboard')->with('success', 'User details updated successfully');
    }
}