<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Stock;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{

    public function index()
    {
        $stocks = Stock::paginate(5);
        return view('admin.stock.index', compact('stocks'));
    }

    public function add()
    {
        $stocks = Stock::all();
        $types = Type::all();
        return view('admin.stock.add', compact('stocks', 'types'));
    }

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'stock_num'  => 'required|unique:stocks|max:5',
                'stock_name' => 'required|unique:stocks|max:255',
                'type_id' => 'required',
                // 'stock_amount' => 'required|max:5',
                'image' => 'required|mimes:jpg,jpeg,png'
                // 'position' => 'required|unique:stocks|max:10',
                // 'amount_minimum' => 'required|max:5',
                // 'stock_num ' => 'required|unique:stocks|max:255'
            ],
            [
                'stock_num.required'     => "กรุณาป้อนรหัสด้วยครับ",
                'stock_num.max'          => "ห้ามป้อนเกิน 5 ตัว",
                'stock_num.unique'       => "มีข้อมูลรหัสนี้ในฐานข้อมูลแล้ว",
                'stock_name.required'     => "กรุณาป้อนชื่ออุปกรณ์ด้วยครับ",
                'stock_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'stock_name.unique'       => "มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",
                // 'stock_amount.required'     => "กรุณาป้อนจำนวนอุปกรณ์ด้วยครับ",
                // 'stock_amount.max'          => "ห้ามป้อนเกิน 5 ตัว",
                'image.required'    => "กรุณาใส่ภาพด้วยครับ",
                'image.mimes'       => "ประเภทไฟล์ไม่ถูกต้อง"
                // 'position.required'     => "กรุณาป้อนตำแหน่งห้องอุปกรณ์ด้วยครับ",
                // 'position.max'          => "ห้ามป้อนเกิน 10 ตัว",
                // 'position.unique'       => "มีข้อมูลตำแหน่งนี้ในฐานข้อมูลแล้ว",
                // 'amount_minimum.required'     => "กรุณาป้อนจำนวนอุปกรณ์ด้วยครับ",
                // 'amount_minimum.max'          => "ห้ามป้อนเกิน 5 ตัว",
                // 'stock_num.required'     => "กรุณาป้อนรหัสอุปกรณ์ด้วยครับ",
                // 'stock_num.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                // 'stock_num.unique'       => "มีข้อมูลรหัสอุปกรณ์นี้ในฐานข้อมูลแล้ว"
            ]
        );
        $stock_num = $request->query('stock_num');

        // การเข้ารหัสรูปภาพ
        $stockImage = $request->file('image');

        // Generate ชื่อภาพ
        $nameGen = hexdec(uniqid());
        // dd($nameGen);

        // ดึงนามสกุลไฟล์ภาพ
        $imgExt = strtolower($stockImage->getClientOriginalExtension());
        $imgName = $nameGen . '.' . $imgExt;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'images/stocks/';
        $full_path = $upload_location . $imgName;

        Stock::insert([
            'stock_name' => $request->stock_name,
            'stock_amount' => $request->stock_amount,
            'image' => $full_path,
            'position' => $request->position,
            'amount_minimum' => $request->amount_minimum,
            'type_id' => $request->type_id,
            'stock_num' => $request->stock_num,
            'created_at'    => Carbon::now()
        ]);

        $stockImage->move($upload_location, $imgName);
        return redirect()->back()->withInput()->with('success', "บันทึกข้อมูลอุปกรณ์เรียบร้อย");
    }

    public function edit($id)
    {
        $stocks = Stock::find($id);
        $types = Type::all();
        return view('admin.stock.edit', compact('stocks', 'types'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->stock_name);

        $request->validate(
            [
                'stock_name'  => 'required|max:255',
                'image' => 'mimes:jpg,jpeg,png'
            ],
            [
                'stock_name.required'     => "กรุณาป้อนชื่อภาพด้วยครับ",
                'stock_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'image.mimes'       => "นามสกุลไฟล์ต้องเป็น jpg jpeg png"
            ]
        );

        $stockImage = $request->file('image');

        if ($stockImage) {
            // Generate ชื่อภาพ
            $nameGen = hexdec(uniqid());
            // dd($nameGen);

            // ดึงนามสกุลไฟล์ภาพ
            $imgExt = strtolower($stockImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExt;

            //อัพโหลดและบันทึกข้อมูล
            $upload_location = 'images/stocks/';
            $full_path = $upload_location . $imgName;

            Stock::find($id)->update([
                'stock_num' => $request->stock_num,
                'stock_name' => $request->stock_name,
                'stock_amount' => $request->stock_amount,
                'image' => $full_path,
                'position' => $request->position,
                'amount_minimum' => $request->amount_minimum,
                'type_id' => $request->type_id,
                'defective_stock' => $request->defective_stock,
                'updated_at'    => Carbon::now()
            ]);

            $old_image = $request->old_image;
            unlink($old_image);

            $stockImage->move($upload_location, $imgName);
            return redirect()->route('stock')->with('success', "อัพเดทรูปภาพเรียบร้อย");

            // อัพเดทภาพและชื่อ

        } else {
            // อัพเดทชื่ออย่างเดียว
            Stock::find($id)->update([
                'stock_num' => $request->stock_num,
                'stock_name' => $request->stock_name,
                'stock_amount' => $request->stock_amount,
                'position' => $request->position,
                'amount_minimum' => $request->amount_minimum,
                'type_id' => $request->type_id,
                'defective_stock' => $request->defective_stock,
                'updated_at'    => Carbon::now()
            ]);
            return redirect()->route('stock')->with('success', "อัพเดทข้อมูลอุปกรณ์เรียบร้อย");
        }
    }

    public function delete($id)
    {
        $img = Stock::find($id)->image;
        unlink($img);

        // ลบข้อมูลจากฐานข้อมูล
        $delete = Stock::find($id)->delete();

        return redirect()->route('stock')->with('success', 'ลบข้อมูลเรียบร้อย');
    }

    public function dashboard(Request $request)
    {
        $search = $request->query('search');
        if ($search != "") {
            $stocks = Stock::where('id', 'LIKE', '%' . $search . '%')
                ->orwhere('stock_name', 'LIKE', '%' . $search . '%')->simplePaginate(6);
            $devices = Device::where('device_name', 'LIKE', '%' . $search . '%')->simplePaginate(6);
        } else {
            $stocks = Stock::paginate(6, ['*'], 'stocks');
            $devices = Device::paginate(6, ['*'], 'devices');
        }

        return view('dashboard', compact('stocks', 'search', 'devices'));
    }

    public function defective(Request $request, $id)
    {
        $request->validate(
            [
                'defective_stock' => 'required|max:255'
            ],
            [
                'department_name.required' => "กรุณาป้อนชื่อแผนกด้วยครับ",
                'department_name.max'      => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'department_name.unique'   => "มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว"
            ]
        );

        Stock::find($id)->update([
            'department_name' => $request->department_name,
            'updated_at'    => Carbon::now()
        ]);

        return redirect()->route('department')->with('success', 'อัพเดทข้อมูลเรียบร้อย');
    }
}
