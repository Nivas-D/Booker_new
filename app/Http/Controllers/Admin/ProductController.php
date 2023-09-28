<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Validator;

class ProductController extends Controller {
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'id';
        $orderBy = 'desc';  
        if($request->has('orderByValue') && $request->input('orderByValue')!== ''){
            $orderByValue = $request->input('orderByValue');
            $orderBy = $request->input('orderBy');    
        }

        if ($request->has('searchProducts') && $request->input('searchProducts')!== '') {
            $searchText = $request->input('searchProducts');            
            $products = Product::where('products.name', 'LIKE',"%{$searchText}%")->orWhere('products.code', 'LIKE',"%{$searchText}%")->orWhere('products.price_discounted', 'LIKE',"%{$searchText}%")->orWhere('categories.name', 'LIKE',"%{$searchText}%")->orderBy($orderByValue, $orderBy)
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();

        }else{
            $products = Product::orderBy($orderByValue, $orderBy)
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();   
        } 

        

        if($orderBy === 'asc'){
            $orderByOpp = 'desc';
        }else{
            $orderByOpp = 'asc';
        }

        return view('admin.products.index', compact('products','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function create(){
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        return view('admin.products.create', compact('categories', 'owners'));
    }

    public function store(Request $request){
        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            'owner_id' => $request->input('owner')
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/product-images'), $filename);
            $data = array_merge($data, ['image' => 'data/product-images/'.$filename]);
        } else {
            $filename = 'images/product.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $product = Product::create($data);
        $quantity = ['quantity' => $request->input('quantity'), 'product_id' => $product->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]; 
        DB::table('product_inventory')->insert($quantity);
        return redirect()->route('products.index');        
    }

    public function show(Product $product){
        $category = DB::table('categories')->where('id', $product->category_id)->first();
        $owner = DB::table('users')->where('id', $product->owner_id)->first();
        $product = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $product->id)->first();
        return view('admin.products.show', compact('product', 'category', 'owner'));
    }

    public function edit(Product $product){
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        $record = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $product->id)->first();
                // dd($record);
        return view('admin.products.edit', compact('product', 'categories', 'record', 'owners'));
    }

    public function update(Request $request, Product $product){
        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            'owner_id' => $request->input('owner')
        ];
        $quantity = ['quantity' => $request->input('quantity')]; 
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/product-images'), $filename);
            $data = array_merge($data, ['image' => 'data/product-images/'.$filename]);
        } else {
            $filename = 'images/product.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $product->update($data);
        DB::table('product_inventory')->where('product_id', $product->id)->update($quantity);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }

    public function getProductOrders(Request $request){
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

        if ($request->has('searchProductOrders') && $request->input('searchProductOrders')!== '') {
            $searchText = $request->input('searchProductOrders');            
            $orders = DB::table('product_orders')->where('products.name', 'LIKE',"%{$searchText}%")->orWhere('product_orders.quantity', 'LIKE',"%{$searchText}%")->orWhere('product_orders.amount', 'LIKE',"%{$searchText}%")->orWhere('product_orders.order_status', 'LIKE',"%{$searchText}%")->orderby($orderByValue,$orderBy)
            ->join('products', 'products.id', '=', 'product_orders.product_id')
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image')->get();
        }else{
            $orders = DB::table('product_orders')->orderby($orderByValue,$orderBy)
            ->join('products', 'products.id', '=', 'product_orders.product_id')
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image')->get();    
        }                                
        return view('admin.products.orders', compact('orders','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function showProductOrder($id){
        $order = DB::table('product_orders')->orderby('created_at', 'desc')
            ->leftjoin('products', 'products.id', '=', 'product_orders.product_id')
            ->leftjoin('users', 'users.id', '=', 'product_orders.user_id')
            ->where('product_orders.id', $id)
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image', 'users.name as user_name')->first();
        return view('admin.products.order-show', compact('order'));
    }
}