<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Validator;

class OrderController extends Controller {
    public function index(){
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create(){
        return view('admin.orders.create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'user_id' => auth()->user()->id
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/order-images'), $filename);
            $data = array_merge($data, ['image' => 'data/order-images/'.$filename]);
        } else {
            $filename = 'images/order.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        order::create($data);
        return redirect()->route('orders.index');        
    }

    public function show(order $order){
        return view('admin.orders.show', compact('order'));
    }

    public function edit(order $order){
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, order $order){
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'user_id' => auth()->user()->id
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/order-images'), $filename);
            $data = array_merge($data, ['image' => 'data/order-images/'.$filename]);
        } else {
            $filename = 'images/order.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $order->update($data);
        return redirect()->route('orders.index');
    }
    public function destroy(order $order){
        $order->delete();
        return redirect()->route('orders.index');
    }
}