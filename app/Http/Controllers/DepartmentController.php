<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //
    public function index() {
        $departments = Department::paginate(5);
        $trashDepartments = Department::onlyTrashed()->paginate(3);
        return view('admin.department.index', compact('departments', 'trashDepartments'));
    }

    public function store(Request $request) {
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'department_name' => 'required|unique:departments|max:255'
            ] ,
            [
                'department_name.required' => "กรุณาป้อนชื่อแผนกด้วยครับ",
                'department_name.max'      => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'department_name.unique'   => "มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว"
            ]
        );

        //บันทึกข้อมูล
        $department = new Department;
        $department->user_id = Auth::user()->id;
        $department->department_name = $request->department_name;
        $department->save();
        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function edit($id){
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'department_name' => 'required|unique:departments|max:255'
            ] ,
            [
                'department_name.required' => "กรุณาป้อนชื่อแผนกด้วยครับ",
                'department_name.max'      => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'department_name.unique'   => "มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว"
            ]
        );

        Department::find($id)->update([
            'department_name' => $request->department_name,
            'user_id'         => Auth::user()->id
        ]);

        return redirect()->route('department')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }

    public function softdelete($id){
        $delete = Department::find($id)->delete();
        return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อย');
    }

    public function restore($id){
        $restore = Department::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'กุ้คืนข้อมูลเรียบร้อย');
    }

    public function delete($id){
        $delete = Department::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'ลบข้อมูลถาวรเรียบร้อย');
    }
}
