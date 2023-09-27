<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Validator;

class EmployeeController extends Controller {
    public function index(){
        $employees = Employee::orderBy('id', 'desc')
                        ->leftjoin('departments', 'employees.dept_id', '=', 'departments.id')
                        ->where('employees.owner_id', auth()->id()) 
                        ->select('employees.*', 'departments.name as dept_name')->get();
        return view('owner.employees.index', compact('employees'));
    }

    public function create(){
        $departments = DB::table('departments')->orderBy('name', 'asc')->get();
        return view('owner.employees.create', compact('departments'));
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
            'owner_id' => auth()->user()->id
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
        return redirect()->route('owner.employees.index');        
    }

    public function show(Employee $employee){
        $department = DB::table('departments')->where('id', $employee->dept_id)->first();
        $assignedServices = DB::table('service_to_employee')
            ->leftjoin('services', 'services.id', '=', 'service_to_employee.service_id')
            ->leftjoin('employees', 'employees.id', '=', 'service_to_employee.employee_id')
            ->leftjoin('users', 'users.id', '=', 'service_to_employee.assigned_by')
            ->where('service_to_employee.employee_id', $employee->id)
            ->select('services.name as service_name', 'employees.name as employee_name', 'users.name as assigned_by')->get();
        return view('owner.employees.show', compact('employee', 'department', 'assignedServices'));
    }

    public function edit(Employee $employee){
        $departments = DB::table('departments')->orderBy('name', 'asc')->get();
        return view('owner.employees.edit', compact('employee', 'departments'));
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
        return redirect()->route('owner.employees.index');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('owner.employees.index');
    }

    public function assignToService($id){
        $employee = Employee::where('id', $id)->first();
        $services = DB::table('services')->where('owner_id', auth()->id())->get();
        return view('owner.employees.assign-to-service', compact('employee', 'services'));
    }

    public function assignToServiceAction(Request $request){
        $employeeId = $request->input('employee');
        $serviceId = $request->input('service');
        $record = DB::table('service_to_employee')->where('service_id', $serviceId)->where('employee_id', $employeeId)->first();
        if($record){
            return redirect()->route('owner.employee.assign', ['id' => $employeeId])
                ->with('errorMessage', 'Same employee has already been assigned to this service');
        } else {
            DB::table('service_to_employee')->insert([
                'service_id' => $serviceId,
                'employee_id' => $employeeId,
                'assigned_by' => auth()->id(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->route('owner.employees.index');
        }
    }
}