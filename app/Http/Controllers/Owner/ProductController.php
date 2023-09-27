<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Validator;

class ProductController extends Controller {
    public function index(){
        $products = Product::orderBy('id', 'desc')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->where('products.owner_id', auth()->id())
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();
        return view('owner.products.index', compact('products'));
    }

    public function create(){
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        return view('owner.products.create', compact('categories'));
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
            'owner_id' => auth()->user()->id,
            'user_id' => auth()->user()->id
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
        return redirect()->route('owner.products.index');        
    }

    public function show(Product $product){
        $category = DB::table('categories')->where('id', $product->category_id)->first();
        $product = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $product->id)->where('products.owner_id', auth()->id())->first();
        return view('owner.products.show', compact('product', 'category'));
    }

    public function edit(Product $product){
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        $record = DB::table('products')->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->leftjoin('product_inventory', 'product_inventory.product_id', '=', 'products.id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')
                ->where('products.id', $product->id)->where('products.owner_id', auth()->id())->first();
        return view('owner.products.edit', compact('product', 'categories', 'record'));
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
            'user_id' => auth()->user()->id
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
        return redirect()->route('owner.products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('owner.products.index');
    }

    public function getProductOrders(){
        $orders = DB::table('product_orders')->orderby('created_at', 'desc')
            ->join('products', 'products.id', '=', 'product_orders.product_id')
            ->where('products.owner_id', auth()->id())
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image')->get();
        return view('owner.products.orders', compact('orders'));
    }

    public function showProductOrder($id){
        $order = DB::table('product_orders')->orderby('created_at', 'desc')
            ->leftjoin('products', 'products.id', '=', 'product_orders.product_id')
            ->leftjoin('users', 'users.id', '=', 'product_orders.user_id')
            ->where('products.owner_id', auth()->id())
            ->where('product_orders.id', $id)
            ->select('product_orders.*', 'products.name as product_name', 'products.image as product_image', 'users.name as user_name')->first();
        return view('owner.products.order-show', compact('order'));
    }

    public function getProductOrdersAmount(){
        return DB::table('product_orders')
            ->leftjoin('products', 'products.id', '=', 'product_orders.product_id')
            ->where('products.owner_id', auth()->id())
            ->sum('product_orders.amount');
    }
}