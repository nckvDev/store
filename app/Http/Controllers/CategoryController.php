<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(5);
        $types = Type::all();
        return view('admin.category.index', compact('categories', 'types'));
    }

    public function store(Request $request)
    {
        // dd($request->type_detail);
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'category_name'  => 'required|unique:categories|max:255',
                'type_id' => 'required'
            ],
            [
                'category_name.required'     => "กรุณาป้อนชื่อบริการด้วยครับ",
                'category_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'category_name.unique'       => "มีข้อมูลชื่อบริการนี้ในฐานข้อมูลแล้ว"
            ]
        );

        Category::insert([
            'category_name' => $request->category_name,
            'type_id' => $request->type_id,
            'created_at'    => Carbon::now()
        ]);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        $types = Type::all();
        return view('admin.category.edit', compact('categories', 'types'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'category_name'  => 'required|max:255'
            ],
            [
                'category_name.required'     => "กรุณาป้อนชื่อภาพด้วยครับ",
                'category_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
            ]
        );

        // อัพเดทชื่ออย่างเดียว
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'type_id' => $request->type_id,
            'updated_at'    => Carbon::now()
        ]);
        return redirect()->route('category')->with('success', "อัพเดทเรียบร้อย");
    }

    public function delete($id)
    {
        // ลบข้อมูลจากฐานข้อมูล
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->route('category')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
