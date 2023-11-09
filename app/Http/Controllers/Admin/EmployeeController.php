<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Validator;

class EmployeeController extends Controller {
    public function index(Request $request){
        $searchText = '';
        $orderByValue = 'id';
        $orderBy = 'desc';   

        if($request->has('orderByValue') && $request->input('orderByValue')!== ''){
            $orderByValue = $request->input('orderByValue');
            $orderBy = $request->input('orderBy');    
        }
        if($orderBy === 'asc'){
            $orderByOpp = 'desc';
        }else{
            $orderByOpp = 'asc';
        }

        if ($request->has('searchEmployees') && $request->input('searchEmployees')!== '') {
            $searchText = $request->input('searchEmployees');            
            $employees = Employee::where('employees.name', 'LIKE',"%{$searchText}%")->orWhere('employees.email', 'LIKE',"%{$searchText}%")->orWhere('departments.name', 'LIKE',"%{$searchText}%")->orderBy($orderByValue,$orderBy)
                        ->leftjoin('departments', 'employees.dept_id', '=', 'departments.id') 
                        ->select('employees.*', 'departments.name as dept_name')->get();
        }else{
            $employees = Employee::orderBy($orderByValue,$orderBy)
                        ->leftjoin('departments', 'employees.dept_id', '=', 'departments.id') 
                        ->select('employees.*', 'departments.name as dept_name')->get();   
        }                        

        
        return view('admin.employees.index', compact('employees','searchText','orderByValue','orderBy','orderByOpp'));
    }

    public function create(){
        $departments = DB::table('departments')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        return view('admin.employees.create', compact('departments', 'owners'));
    }

    public function store(Request $request){
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'dept_id' => $request->input('department'),
            'user_id' => auth()->user()->id,
            'owner_id' => $request->input('owner')
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/employee-images'), $filename);
            $data = array_merge($data, ['photo' => 'data/employee-images/'.$filename]);
        } else {
            $filename = 'images/employee.png';
            $data = array_merge($data, ['photo' => $filename]);
        }
        Employee::create($data);
        return redirect()->route('employees.index');        
    }

    public function show(Employee $employee){
        $department = DB::table('departments')->where('id', $employee->dept_id)->first();
        $owner = DB::table('users')->where('id', $employee->owner_id)->first();
        $assignedServices = DB::table('service_to_employee')
            ->leftjoin('services', 'services.id', '=', 'service_to_employee.service_id')
            ->leftjoin('employees', 'employees.id', '=', 'service_to_employee.employee_id')
            ->leftjoin('users', 'users.id', '=', 'service_to_employee.assigned_by')
            ->where('service_to_employee.employee_id', $employee->id)
            ->select('services.name as service_name', 'employees.name as employee_name', 'users.name as assigned_by')->get();
        return view('admin.employees.show', compact('employee', 'department', 'assignedServices', 'owner'));
    }

    public function edit(Employee $employee){
        $departments = DB::table('departments')->orderBy('name', 'asc')->get();
        $owners = DB::table('users')->where('role_id', 2)->orderBy('name', 'asc')->get();
        return view('admin.employees.edit', compact('employee', 'departments', 'owners'));
    }

    public function update(Request $request, Employee $employee){
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'dept_id' => $request->input('department'),
            'owner_id' => $request->input('owner')
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('data/employee-images'), $filename);
            $data = array_merge($data, ['image' => 'data/employee-images/'.$filename]);
        } else {
            $filename = 'images/employee.png';
            $data = array_merge($data, ['image' => $filename]);
        }
        $employee->update($data);
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employees.index');
    }
}