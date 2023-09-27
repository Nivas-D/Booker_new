<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Freelancer;
use Validator;

class FreelancerController extends Controller {
    public function index(){
        $freelancers = Freelancer::orderBy('id', 'desc')->get();
        return view('owner.freelancers.index', compact('freelancers'));
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
        return view('owner.freelancers.show', compact('freelancer', 'testimonials', 'assignedServices'));
    }

    public function assignToService($id){
        $freelancer = Freelancer::where('id', $id)->first();
        $services = DB::table('services')->where('owner_id', auth()->id())->get();
        return view('owner.freelancers.assign-to-service', compact('freelancer', 'services'));
    }

    public function assignToServiceAction(Request $request){
        $freelancerId = $request->input('freelancer');
        $serviceId = $request->input('service');
        $record = DB::table('service_to_freelancer')->where('service_id', $serviceId)->where('freelancer_id', $freelancerId)->first();
        if($record){
            return redirect()->route('owner.freelancer.assign', ['id' => $freelancerId])
                ->with('errorMessage', 'Same freelancer has already been assigned to this service');
        } else {
            DB::table('service_to_freelancer')->insert([
                'service_id' => $serviceId,
                'freelancer_id' => $freelancerId,
                'assigned_by' => auth()->id(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->route('owner.freelancers.index');
        }
    }
}