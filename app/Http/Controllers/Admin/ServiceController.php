<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Industry;
use Validator;

class ServiceController extends Controller {
    public function index(){
        $services = Service::orderBy('id', 'desc')
                ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
                ->select('services.*', 'industries.name as industry_name')->get();
        return view('admin.services.index', compact('services'));
    }

    public function main_services(){
        $services = MainService::orderBy('id', 'desc')->get();
        //$industries = Industry::get();
        return view('admin.services.main_services', compact('services'));
    }

    public function create(){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        return view('admin.services.create', compact('industries', 'owners'));
    }

    public function store(Request $request){


        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'description_german' => $request->input('description_german'),
            'description_france' => $request->input('description_france'),
            //'code' => $request->input('code'),
            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'duration' => $request->input('duration'),
            'industry_id' => $request->input('industry'),
            'user_id' => auth()->user()->id,
            'owner_id' => $request->input('owner')
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/service-images'), $filename);
            $data = array_merge($data, ['image' => 'data/service-images/'.$filename]);
        } else {
            $filename = 'images/service.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $result = substr($request->input('name'), 0, 3);

        $last_inserted_id = Service::insertGetId($data);

        Service::where('id', $last_inserted_id)

        ->update(
            [
                'code' => strtoupper($result).$last_inserted_id,
            ]
        );


        return redirect()->route('services.index')->with('success','Service created successfully ');
    }

    public function show(Service $service){
        $industry = DB::table('industries')->where('id', $service->industry_id)->first();
        $owner = DB::table('users')->where('id', $service->owner_id)->first();
        return view('admin.services.show', compact('service', 'industry', 'owner'));
    }

    public function edit(Service $service){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        return view('admin.services.edit', compact('service', 'industries', 'owners','categories'));
    }

    public function showServicesOfCategory($id){
        $services = Service::orderBy('id', 'desc')->where('services.category_id',$id)
                ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
                ->select('services.*', 'industries.name as industry_name')->get();
        return view('admin.services.index', compact('services'));
    }

    public function update(Request $request, Service $service){
        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'description_german' => $request->input('description_german'),
            'description_france' => $request->input('description_france'),

            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'duration' => $request->input('duration'),
            'industry_id' => $request->input('industry'),
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            'owner_id' => $request->input('owner')
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/service-images'), $filename);
            $data = array_merge($data, ['image' => 'data/service-images/'.$filename]);
        } else {
            $filename = 'images/service.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $service->update($data);
        return redirect()->route('services.index')->with('success','Service updated successfully ');
    }

    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('services.index');
    }



    public function getServiceBookings(){
        $bookings = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image')->get();
        return view('admin.services.bookings', compact('bookings'));
    }

    public function showServiceBooking($id){
        $booking = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->leftjoin('users', 'users.id', '=', 'service_bookings.user_id')
            ->where('service_bookings.id', $id)
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image', 'users.name as user_name')->first();
        return view('admin.services.booking-show', compact('booking'));
    }
}