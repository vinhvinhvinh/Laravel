<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    //
    // public function employee()
    // {
    //     $employee = Employee::all();
    //     $employeeCount = Employee::all()->count();
    //     return view('admin.employees.index', compact('employee', 'employeeCount'));
    // }

    // public function delete($id)
    // {
    //     $employee = Employee::find($id)->delete();
    //     return back();
    // }

    // public function create()
    // {

    //     $datetime = Date('Ymdhms');
    //     $countAllEmployee = Employee::all()->count() + 1;
    //     $chuoiID = $countAllEmployee;
    //     if ($countAllEmployee > 99)
    //         $chuoiID = $countAllEmployee;

    //     if ($countAllEmployee > 9)
    //         $chuoiID = '0' . $countAllEmployee;
    //     else
    //         $chuoiID = '00' . $countAllEmployee;

    //     $originalId = $chuoiID;
    //     $finalId = 'EMPLOYEE' . $datetime . $originalId;
    //     return view('admin.employees.create', compact('finalId'));
    // }

    // public function addEmployee(Request $request)
    // {
    //     // dd($request);
    //     $employee = new Employee();
    //     $employee->id = $request->id;
    //     $employee->tennv = $request->tennv;
    //     $employee->trangthai = $request->trangthai;
    //     $employee->save();
    //     return redirect()->route('admin.employees.index');
    // }

    // public function edit($id)
    // {
    //     $employee = Employee::find($id);
    //     return view('admin.employees.edit', compact('employee'));
    // }

    // function update(Request $request)
    // {
    //     $employee = Employee::find($request->id);

    //     Employee::where('id', $request->id)->update(
    //         [
    //             'id' => $request->id,
    //             'tennv' => $request->tennv,
    //             'trangthai' => $request->trangthai,
    //         ]
    //     );

    //     return redirect()->route('admin.employees.index');
    // }
}
