<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Freelancer;
use Validator;

class FreelancerController extends Controller {
    public function index(){
        $freelancers = Freelancer::orderBy('id', 'desc')->get();
        return view('admin.freelancers.index', compact('freelancers'));
    }

    public function create(){
        return view('admin.freelancers.create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'skills' => $request->input('skills'),
            'experience' => $request->input('experience'),
            'payment_type' => $request->input('payment_type'),
            'hourly_rate' => $request->input('hourly_rate'),
            'availability' => $request->input('availability'),
            'linkedin_url' => $request->input('linkedin_url'),
            'portfolio_url' => $request->input('portfolio_url'),
            'created_by' => auth()->user()->id
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/freelancer-images'), $filename);
            $data = array_merge($data, ['photo' => 'data/freelancer-images/'.$filename]);
        } else {
            $filename = 'images/freelancer.png';
            $data = array_merge($data, ['photo' => $filename]);
        }
        Freelancer::create($data);
        return redirect()->route('freelancers.index');        
    }

    public function show(Freelancer $freelancer){
        $testimonials = DB::table('freelancer_testimonials')
            ->leftJoin('users', 'users.id', '=', 'freelancer_testimonials.user_id')
            ->where('freelancer_testimonials.freelancer_id', $freelancer->id)
            ->select('freelancer_testimonials.*', 'users.name as user_name')
            ->orderBy('created_at', 'desc')->get();
        $assignedServices = DB::table('service_to_freelancer')
            ->leftjoin('services', 'services.id', '=', 'service_to_freelancer.service_id')
            ->leftjoin('freelancers', 'freelancers.id', '=', 'service_to_freelancer.freelancer_id')
            ->leftjoin('users', 'users.id', '=', 'service_to_freelancer.assigned_by')
            ->where('service_to_freelancer.freelancer_id', $freelancer->id)
            ->select('services.name as service_name', 'freelancers.name as freelancer_name', 'users.name as assigned_by')->get();
        return view('admin.freelancers.show', compact('freelancer', 'testimonials', 'assignedServices'));
    }

    public function edit(Freelancer $freelancer){
        return view('admin.freelancers.edit', compact('freelancer'));
    }

    public function update(Request $request, Freelancer $freelancer){
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'skills' => $request->input('skills'),
            'experience' => $request->input('experience'),
            'payment_type' => $request->input('payment_type'),
            'hourly_rate' => $request->input('hourly_rate'),
            'availability' => $request->input('availability'),
            'linkedin_url' => $request->input('linkedin_url'),
            'portfolio_url' => $request->input('portfolio_url'),
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/freelancer-images'), $filename);
            $data = array_merge($data, ['photo' => 'data/freelancer-images/'.$filename]);
        } else {
            $filename = 'images/freelancer.png';
            $data = array_merge($data, ['photo' => $filename]);
        }
        $freelancer->update($data);
        return redirect()->route('freelancers.index');
    }

    public function destroy(Freelancer $freelancer){
        $freelancer->delete();
        return redirect()->route('freelancers.index');
    }
}