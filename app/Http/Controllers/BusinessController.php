<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Business;
use Validator;
use Mail;
use App\Mail\BusinessRegister;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Category = Category :: get();
        $categories = Category::orderBy("id", "desc")->get();
        return view("business.create", compact("categories"));
    }

    public function login()
    {
        
        // $Category = Category :: get();
        $categories = Category::orderBy("id", "desc")->get();
        return view("business.login", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $last_inserted_id = Category::insertGetId($data);
        $error = $request->validate(
            [
                "name" => "required",
                "email" => "required|email",
                "telephone" => "required",
                "category_id" => "required",
                "company_name" => "required",
                "status"=>"required"
                //'email' => 'required|email',
                // Other validation rules
            ],
            [
                "name.required" => "Please fill out the Name field.",
                "email.required" => "Please fill out the Email field.",
                "email.email" => "Please enter a valid email address.",
                "telephone.required" => "Please fill out the Telephone field.",
                "category_id.required" => "Please fill out the Category field.",
                "company_name.required" => "Please fill out the Company field.",
                "status.required" => "Please check out the checkbox.",

                // Custom messages for other rules
            ]
        );
        // if($error){
        $data = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "telephone" => $request->input("telephone"),
            "address" => $request->input("address"),
            "category_id" => $request->input("category_id"),
            "company_name" => $request->input("company_name"),
            "description" => $request->input("description"),
        ];
        $mailData = [
            "name" => $request->input("company_name"),
            "title" => "Business Registration Notification",
        ];

        

        Business::create($data);
        $isEmailed = Mail::to($request->input("email"))->send(
            new BusinessRegister($mailData)
        );
        return redirect()->route("public.home")->with('success', 'Business Registered successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
