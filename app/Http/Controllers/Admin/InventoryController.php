<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Product;
use Validator;

class InventoryController extends Controller {
    public function index(){
        $inventories = Inventory::orderBy('products.name', 'asc')
                ->rightjoin('products', 'product_inventory.product_id', '=', 'products.id')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();
        return view('admin.inventory.index', compact('inventories'));
    }

    public function create(){
        return view('admin.inventory.create');
    }

    public function edit(Inventory $inventory){
        //dd($inventory);
        $product = Product::where('products.id', $inventory->product_id)
            ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')->first();
        return view('admin.inventory.edit', compact('inventory', 'product'));
    }

    public function update(Request $request, Inventory $inventory){
        $data = ['quantity' => $request->input('quantity')];
        Inventory::where('product_id', $inventory->product_id)->update($data);
        return redirect()->route('inventory.index');
    }

    public function destroy(inventory $inventory){
        $inventory->delete();
        return redirect()->route('inventory.index');
    }
}