<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Industry;
use App\Models\MainService;
use Validator;

class MainserviceController extends Controller {

	 public function index(){
        $services = MainService::orderBy('id', 'desc')->get();
        //$industries = Industry::get();
        return view('admin.services.main_services', compact('services'));
    }

    public function create(){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        $categories = DB::table('categories')->get();
        return view('admin.services.main_service_create', compact('industries', 'owners','categories'));
    }

    public function store(Request $request){


        $data = [
            'status' => $request->input('active'),
            'name' => $request->input('name'),
            // 'description' => $request->input('description'),
            // 'description_german' => $request->input('description_german'),
            // 'description_france' => $request->input('description_france'),
            // //'code' => $request->input('code'),
            // 'price_original' => $request->input('price_original'),
            // 'price_discounted' => $request->input('price_discounted'),
            // 'duration' => $request->input('duration'),
            'industry_id' => $request->input('industry'),
            'category_id' => $request->input('category'),
            'user_id' => auth()->user()->id,
            //'owner_id' => $request->input('owner')
        ];
        //if($request->file('image')){
        //     $file= $request->file('image');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('data/service-images'), $filename);
        //     $data = array_merge($data, ['image' => 'data/service-images/'.$filename]);
        // } else {
        //     $filename = 'images/service.png';
        //     $data = array_merge($data, ['image' => $filename]);
        // }
        //$result = substr($request->input('name'), 0, 3);

        $last_inserted_id = Service::create($data);

        //Service::where('id', $last_inserted_id)

       

        return redirect()->route('main-services.index')->with('success','Service created successfully ');
    }
}