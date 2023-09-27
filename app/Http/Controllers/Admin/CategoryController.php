<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Industry;
use Validator;

class CategoryController extends Controller {
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'id';
        $orderBy = 'desc';   

        if($request->has('orderByValue') && $request->input('orderByValue')!== ''){
            $orderByValue = $request->input('orderByValue');
            $orderBy = $request->input('orderBy');    
        }

        if ($request->has('searchCategories') && $request->input('searchCategories')!== '') {
            $searchText = $request->input('searchCategories');
            $categories = Category::where('name', 'LIKE',"%{$searchText}%")->orWhere('code', 'LIKE',"%{$searchText}%")->orderBy($orderByValue, $orderBy)->get();
        }else{
            $categories = Category::orderBy($orderByValue, $orderBy)->get();    
        }                
        
        if($orderBy === 'asc'){
            $orderByOpp = 'desc';
        }else{
            $orderByOpp = 'asc';
        }

        return view('admin.categories.index', compact('categories','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function create(){
        $industries = Industry :: get();
        return view('admin.categories.create',compact('industries'));
    }

    public function store(Request $request){


        if($request->input('name') !=''){
            $duplicatecheck = Category :: Where('name', $request->input('name'))->get();
            if(count($duplicatecheck) > 0){

                return back()->with('success','Already Category created');;
            }

        }

        $data = [
            'industry_id' =>$request->input('industry'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'description_german' => $request->input('description_german'),
            'description_france' => $request->input('description_france'),
            'status' => ($request->input('status') == 'on') ? '1' : 0,

            'user_id' => auth()->user()->id
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/category-images'), $filename);
            $data = array_merge($data, ['image' => 'data/category-images/'.$filename]);
        } else {
            $filename = 'images/category.png';
            $data = array_merge($data, ['image' => $filename]);
        }
       // Category::create($data);
        $last_inserted_id = Category::insertGetId($data);

        Category::where('id', $last_inserted_id)

					->update(
						[
							'code' => "BC00".$last_inserted_id,
						]
					);
        //dd($last_inserted_id);

        return redirect()->route('categories.index')->with('success','Category created successfully ');
    }

    public function show(Category $category){
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'description_german' => $request->input('description_german'),
            'description_france' => $request->input('description_france'),
            'status' => ($request->input('status') == 'on') ? 1 : 0,
            'user_id' => auth()->user()->id
        ];



        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/category-images'), $filename);
            $data = array_merge($data, ['image' => 'data/category-images/'.$filename]);
        } else {
            $filename = 'images/category.png';
            $data = array_merge($data, ['image' => $filename]);
        }



        $category->update($data);
        return redirect()->route('categories.index')->with('success','Category Updated successfully ');;
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function checkcategory(Request $request){
        dd($request->input());
    }
}