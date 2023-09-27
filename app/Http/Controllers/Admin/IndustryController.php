<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Industry;
use Validator;

class IndustryController extends Controller {
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'id';
        $orderBy = 'desc';
        if($request->has('orderByValue') && $request->input('orderByValue')!== ''){
            $orderByValue = $request->input('orderByValue');
            $orderBy = $request->input('orderBy');    
        }

        if ($request->has('searchIndustries') && $request->input('searchIndustries')!== '') {
            $searchText = $request->input('searchIndustries');
            $industries = Industry::where('name', 'LIKE',"%{$searchText}%")->orWhere('code', 'LIKE',"%{$searchText}%")->orderBy($orderByValue, $orderBy)->get();
        }else{
            $industries = Industry::orderBy($orderByValue, $orderBy)->get();    
        }

        if($orderBy === 'asc'){
            $orderByOpp = 'desc';
        }else{
            $orderByOpp = 'asc';
        }

        //$industries = Industry::orderBy('id', 'desc')->get();
        return view('admin.industries.index', compact('industries','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function create(){
        return view('admin.industries.create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->input('name'),
            //'description' => $request->input('description'),
            //'code' => $request->input('code'),
            'user_id' => auth()->user()->id
        ];
        if($request->file('image')){

            foreach ($request->file('image') as $imagefile) {
                $name=date('YmdHi').$imagefile->getClientOriginalName();
                $imagefile-> move(public_path('data/industry-images'), $name);
                $images[]='data/industry-images/'.$name;
              }


           $filename= implode(',', $images);
            $data = array_merge($data, ['image' => $filename]);
        } else {
            $filename = 'images/industry.png';
            $data = array_merge($data, ['image' => $filename]);
        }

        $result = substr($request->input('name'), 0, 3);

        //Industry::create($data);

        $last_inserted_id = Industry::insertGetId($data);
        //dd($last_inserted_id);
        Industry::where('id', $last_inserted_id)

        ->update(
            [
                'code' => strtoupper($result).$last_inserted_id,
            ]
        );
        return redirect()->route('industries.index');
    }

    public function show(Industry $industry){
        return view('admin.industries.show', compact('industry'));
    }

    public function edit(Industry $industry){
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry){
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            //'code' => $request->input('code'),
            'user_id' => auth()->user()->id
        ];
        if($request->file('image')){

            foreach ($request->file('image') as $imagefile) {
                $name=date('YmdHi').$imagefile->getClientOriginalName();
                $imagefile-> move(public_path('data/industry-images'), $name);
                $images[]='data/industry-images/'.$name;
              }


           $filename= implode(',', $images);
            $data = array_merge($data, ['image' => $filename]);
        } else {
            $filename = 'images/industry.png';
            //$data = array_merge($data, ['image' => $filename]);
        }
        $industry->update($data);
        return redirect()->route('industries.index');
    }

    public function destroy(Industry $industry){
        $industry->delete();
        return redirect()->route('industries.index');
    }
}
