<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Validator;

class ProductController extends Controller {
    public function index(){
        $products = Product::orderBy('name', 'asc')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->where('products.active', 'yes')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();
        return view('user.products.index', compact('products'));
    }

    public function create(){}

    public function store(Request $request){}

    public function show(Product $product){
        $category = DB::table('categories')->where('id', $product->category_id)->first();
        $product = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $product->id)
                ->where('products.active', 'yes')->first();
        return view('user.products.show', compact('product', 'category'));
    }

    public function edit(Product $product){}

    public function update(Request $request, Product $product){}

    public function destroy(Product $product){}

    public function buyProduct($id){
        $product = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $id)
                ->where('products.active', 'yes')->first();
        $category = DB::table('categories')->where('id', $product->category_id)->first();
        return view('user.products.checkout', compact('product', 'category'));
    }

    public function checkout(Request $request){
        $product = Product::where('id', $request->input('productId'))->first();
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => $request->input('quantity'),
            'amount' => $request->input('quantity') * $product->price,
            'delivery_address' =>  $request->input('deliveryAddress'),
            'order_status' => 'pending',
            'payment_method' => $request->input('payment_method'),
            'payment_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $result = DB::table('product_orders')->insert($data);
        if($result){
            $inventory = DB::table('product_inventory')->where('product_id', $product->id)->first();
            DB::table('product_inventory')->where('product_id', $product->id)->update(['quantity' => ($inventory->quantity - 1)]);
            return redirect()->route('user.products.index')->with('success', 'Your order has been created successfully');
        } else {
            return redirect()->route('user.products.index')->with('error', 'Some error occurred while creating your order');
        }
    }

    public function getProductOrders(){
        $orders = DB::table('product_orders')->orderby('created_at', 'desc')
            ->leftjoin('products', 'products.id', '=', 'product_orders.product_id')
            ->where('product_orders.user_id', auth()->id())
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image')->get();
        return view('user.products.orders', compact('orders'));
    }

    public function showProductOrder($id){
        $order = DB::table('product_orders')->orderby('created_at', 'desc')
            ->leftjoin('products', 'products.id', '=', 'product_orders.product_id')
            ->leftjoin('users', 'users.id', '=', 'product_orders.user_id')
            ->where('product_orders.user_id', auth()->id())
            ->where('product_orders.id', $id)
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image', 'users.name as user_name')->first();
        return view('user.products.order-show', compact('order'));
    }
}