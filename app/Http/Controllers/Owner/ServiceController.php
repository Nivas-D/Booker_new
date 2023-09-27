<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Validator;

class ServiceController extends Controller {
    public function index(){
        $services = Service::orderBy('id', 'desc')
                ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
                ->where('services.owner_id', auth()->id())
                ->select('services.*', 'industries.name as industry_name')->get();
        return view('owner.services.index', compact('services'));
    }

    public function create(){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        return view('owner.services.create', compact('industries'));
    }

    public function store(Request $request){
        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'duration' => $request->input('duration'),
            'industry_id' => $request->input('industry'),
            'owner_id' => auth()->user()->id,
            'user_id' => auth()->user()->id
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
        Service::create($data);
        return redirect()->route('owner.services.index');        
    }

    public function show(Service $service){
        $industry = DB::table('industries')->where('id', $service->industry_id)->first();
        return view('owner.services.show', compact('service', 'industry'));
    }

    public function edit(Service $service){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        return view('owner.services.edit', compact('service', 'industries'));
    }

    public function update(Request $request, Service $service){
        $data = [
            'active' => $request->input('active'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'price_original' => $request->input('price_original'),
            'price_discounted' => $request->input('price_discounted'),
            'duration' => $request->input('duration'),
            'industry_id' => $request->input('industry'),
            'user_id' => auth()->user()->id
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
        return redirect()->route('owner.services.index');
    }

    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('owner.services.index');
    }

    public function getServiceBookings(){
        $bookings = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->where('services.owner_id', auth()->id())
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image')->get();
        return view('owner.services.bookings', compact('bookings'));
    }

    public function showServiceBooking($id){
        $booking = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->leftjoin('users', 'users.id', '=', 'service_bookings.user_id')
            ->where('services.owner_id', auth()->id())
            ->where('service_bookings.id', $id)
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image', 'users.name as user_name')->first();
        return view('owner.services.booking-show', compact('booking'));
    }

    public function getServiceBookingsAmount(){
        return DB::table('service_bookings')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->where('services.owner_id', auth()->id())
            ->sum('service_bookings.amount');
    }
}