<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use Validator;

class PlanController extends Controller {
    public function index(){
        $plans = Plan::orderBy('id', 'desc')->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create(){
        return view('admin.plans.create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'features' => $request->input('features'),
            'frequency' => $request->input('frequency'),
            'trial_period' => $request->input('trial_period'),
            'created_by' => auth()->user()->id
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/plan-images'), $filename);
            $data = array_merge($data, ['image' => 'data/plan-images/'.$filename]);
        } else {
            $filename = 'images/plan.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        Plan::create($data);
        return redirect()->route('plans.index');        
    }

    public function show(Plan $plan){
        return view('admin.plans.show', compact('plan'));
    }

    public function edit(Plan $plan){
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan){
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
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
        $plan->update($data);
        return redirect()->route('plans.index');
    }

    public function destroy(Plan $plan){
        $plan->delete();
        return redirect()->route('plans.index');
    }
}