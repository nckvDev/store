<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function index()
    {
        $types = Type::paginate(5);
        return view('admin.type.index', compact('types'));
    }

    public function store(Request $request)
    {
        // dd($request->type_detail);
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'type_detail'  => 'required|unique:types|max:255',
            ],
            [
                'type_detail.required'     => "กรุณาป้อนชื่อบริการด้วยครับ",
                'type_detail.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'type_detail.unique'       => "มีข้อมูลชื่อบริการนี้ในฐานข้อมูลแล้ว"
            ]
        );

        Type::insert([
            'type_detail' => $request->type_detail,
            'created_at'    => Carbon::now()
        ]);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function edit($id)
    {
        $types = Type::find($id);
        return view('admin.type.edit', compact('types'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'type_detail'  => 'required|max:255'
            ],
            [
                'type_detail.required'     => "กรุณาป้อนชื่อภาพด้วยครับ",
                'type_detail.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
            ]
        );

        // อัพเดทชื่ออย่างเดียว
        Type::find($id)->update([
            'type_detail' => $request->type_detail,
        ]);
        return redirect()->route('type')->with('success', "อัพเดทเรียบร้อย");
    }

    public function delete($id)
    {
        // ลบข้อมูลจากฐานข้อมูล
        $delete = Type::find($id);
        $delete->delete();
        return redirect()->route('type')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
