<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Product;
use Validator;

class InventoryController extends Controller {
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'products.name';
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
        
        if ($request->has('searchInventory') && $request->input('searchInventory')!== '') {
            $searchText = $request->input('searchInventory');            
            $inventories = Inventory::where('products.name', 'LIKE',"%{$searchText}%")->orWhere('categories.name', 'LIKE',"%{$searchText}%")->orWhere('product_inventory.quantity', 'LIKE',"%{$searchText}%")->orderBy($orderByValue, $orderBy)
                ->rightjoin('products', 'product_inventory.product_id', '=', 'products.id')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();

        }else{
            $inventories = Inventory::orderBy($orderByValue, $orderBy)
                ->rightjoin('products', 'product_inventory.product_id', '=', 'products.id')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'product_inventory.quantity')->get();   
        }
        
        return view('admin.inventory.index', compact('inventories','searchText','orderByValue','orderBy','orderByOpp'));
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