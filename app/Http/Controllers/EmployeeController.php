<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $keyword = trim(strip_tags($keyword));
        $employee=[];
        if ($keyword!=""){
            $employee = Employee::where("employee_name","LIKE","%$keyword%")->paginate(5);
        }else{
            $employee = Employee::paginate(5);
        }
        return view('Employee.list', ['employee' =>$employee])->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateRequest $request)
    {
        $employee_name = htmlspecialchars($request->input('employee_name'));
        $employee_email = $request->input('employee_email');
        $employee_tel = $request->input('employee_tel');
        $data = [
            'employee_name' => $employee_name,
            'employee_email' => $employee_email,
            'employee_tel' => $employee_tel
        ];
        Employee::create($data);
        $page = [];
        return redirect()->route('employee.index')->with('success', 'them thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('Employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateRequest $request, Employee $employee)
    {
        $employee_name = htmlspecialchars($request->input('employee_name'));
        $employee_email = $request->input('employee_email');
        $employee_tel = $request->input('employee_tel');
        $employee->fill([
            'employee_name' => $employee_name,
            'employee_email' => $employee_email,
            'employee_tel' => $employee_tel
        ])->save();
        return redirect()->route('employee.index')->with('success', 'cap nhap thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
