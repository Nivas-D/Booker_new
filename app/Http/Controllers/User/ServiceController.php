<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Validator;

class ServiceController extends Controller {
    public function index(){
        $services = Service::orderBy('name', 'asc')
                ->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
                ->where('services.active', 'yes')
                ->select('services.*', 'industries.name as industry_name')->get();
        return view('user.services.index', compact('services'));
    }

    public function create(){}

    public function store(Request $request){}

    public function show(Service $service){
        $industry = DB::table('industries')->where('id', $service->industry_id)->first();
        return view('user.services.show', compact('service', 'industry'));
    }

    public function edit(Service $service){}

    public function update(Request $request, Service $service){}

    public function destroy(Service $service){}

    public function bookService($id){
        $service = DB::table('services')->leftjoin('industries', 'industries.id', '=', 'services.industry_id')
                ->select('services.*', 'industries.name as industry_name')
                ->where('services.id', $id)
                ->where('services.active', 'yes')->first();
        $industry = DB::table('industries')->where('id', $service->industry_id)->first();
        return view('user.services.checkout', compact('service', 'industry'));
    }

    public function checkout(Request $request){
        $service = Service::where('id', $request->input('serviceId'))->first();
        $data = [
            'user_id' => auth()->user()->id,
            'service_id' => $service->id,
            'amount' => $service->price,
            'type' => 'single',
            'booking_status' => 'pending',
            'payment_method' => $request->input('payment_method'),
            'payment_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $result = DB::table('service_bookings')->insert($data);
        if($result){
            return redirect()->route('user.services.index')->with('success', 'Your service booking request has been placed successfully');
        } else {
            return redirect()->route('user.services.index')->with('error', 'Some error occurred while placing your service booking request');
        }
    }

    public function getServiceBookings(){
        $bookings = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->where('service_bookings.user_id', auth()->id())
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image')->get();
        return view('user.services.bookings', compact('bookings'));
    }

    public function showServiceBooking($id){
        $booking = DB::table('service_bookings')->orderby('created_at', 'desc')
            ->leftjoin('services', 'services.id', '=', 'service_bookings.service_id')
            ->leftjoin('users', 'users.id', '=', 'service_bookings.user_id')
            ->where('service_bookings.user_id', auth()->id())
            ->where('service_bookings.id', $id)
            ->select('service_bookings.*', 'services.name as service_name', 'services.image as service_image', 'users.name as user_name')->first();
        return view('user.services.booking-show', compact('booking'));
    }
}
