<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function index()
    {
        $devices = Device::paginate(5);
        return view('admin.device.index', compact('devices'));
    }

    public function add()
    {
        $devices = Device::all();
        $types = Type::all();
        return view('admin.device.add', compact('devices', 'types'));
    }

    public function store(Request $request)
    {
        // dd(
        //     $request->device_name,
        //     $request->device_amount,
        //     $request->location,
        //     $request->image,
        //     $request->device_year
        // );
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'device_name' => 'required|unique:devices|max:255',
                'device_amount' => 'required',
                // 'stock_amount' => 'required|max:5',
                'image' => 'required|mimes:jpg,jpeg,png'
                // 'position' => 'required|unique:stocks|max:10',
                // 'amount_minimum' => 'required|max:5',
                // 'stock_num ' => 'required|unique:stocks|max:255'
            ],
            [
                'device_name.required'     => "กรุณาป้อนชื่ออุปกรณ์ด้วยครับ",
                'device_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'device_name.unique'       => "มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",
                // 'stock_amount.required'     => "กรุณาป้อนจำนวนอุปกรณ์ด้วยครับ",
                // 'stock_amount.max'          => "ห้ามป้อนเกิน 5 ตัว",
                'image.required'    => "กรุณาใส่ภาพด้วยครับ",
                'image.mimes'       => "ประเภทไฟล์ไม่ถูกต้อง"
                // 'position.required'     => "กรุณาป้อนตำแหน่งห้องอุปกรณ์ด้วยครับ",
                // 'position.max'          => "ห้ามป้อนเกิน 10 ตัว",
                // 'position.unique'       => "มีข้อมูลตำแหน่งนี้ในฐานข้อมูลแล้ว",
                // 'device_amount.required'     => "กรุณาป้อนจำนวนอุปกรณ์ด้วยครับ"
                // 'amount_minimum.max'          => "ห้ามป้อนเกิน 5 ตัว",
                // 'stock_num.required'     => "กรุณาป้อนรหัสอุปกรณ์ด้วยครับ",
                // 'stock_num.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                // 'stock_num.unique'       => "มีข้อมูลรหัสอุปกรณ์นี้ในฐานข้อมูลแล้ว"
            ]
        );

        // การเข้ารหัสรูปภาพ
        $deviceImage = $request->file('image');

        // Generate ชื่อภาพ
        $nameGen = hexdec(uniqid());
        // dd($nameGen);

        // ดึงนามสกุลไฟล์ภาพ
        $imgExt = strtolower($deviceImage->getClientOriginalExtension());
        $imgName = $nameGen . '.' . $imgExt;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'images/devices/';
        $full_path = $upload_location . $imgName;

        Device::insert([
            'device_name' => $request->device_name,
            'device_amount' => $request->device_amount,
            'type_id' => $request->type_id,
            'location' => $request->location,
            'image' => $full_path,
            'device_year' => $request->device_year,
            'created_at'    => Carbon::now()
        ]);


        $deviceImage->move($upload_location, $imgName);
        return redirect()->back()->with('success', "บันทึกข้อมูลอุปกรณ์เรียบร้อย");
    }

    public function edit($id)
    {
        $devices = Device::find($id);
        $types = Type::all();
        return view('admin.device.edit', compact('devices', 'types'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->stock_name);

        $request->validate(
            [
                'device_name'  => 'required|max:255',
                'image' => 'mimes:jpg,jpeg,png'
            ],
            [
                'device_name.required'     => "กรุณาป้อนชื่อภาพด้วยครับ",
                'device_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'image.mimes'       => "นามสกุลไฟล์ต้องเป็น jpg jpeg png"
            ]
        );

        $deviceImage = $request->file('image');

        if ($deviceImage) {
            // Generate ชื่อภาพ
            $nameGen = hexdec(uniqid());
            // dd($nameGen);

            // ดึงนามสกุลไฟล์ภาพ
            $imgExt = strtolower($deviceImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExt;

            //อัพโหลดและบันทึกข้อมูล
            $upload_location = 'images/devices/';
            $full_path = $upload_location . $imgName;

            Device::find($id)->update([
                'device_name' => $request->device_name,
                'device_amount' => $request->device_amount,
                'type_id' => $request->type_id,
                'location' => $request->location,
                'image' => $full_path,
                'device_year' => $request->device_year,
                'defective_device' => $request->defective_device,
                'created_at'    => Carbon::now()
            ]);

            $old_image = $request->old_image;
            unlink($old_image);

            $deviceImage->move($upload_location, $imgName);
            return redirect()->route('device')->with('success', "อัพเดทรูปภาพเรียบร้อย");

            // อัพเดทภาพและชื่อ

        } else {
            // อัพเดทชื่ออย่างเดียว
            Device::find($id)->update([
                'device_name' => $request->device_name,
                'device_amount' => $request->device_amount,
                'type_id' => $request->type_id,
                'location' => $request->location,
                'device_year' => $request->device_year,
                'defective_device' => $request->defective_device,
                'created_at'    => Carbon::now()
            ]);
            return redirect()->route('device')->with('success', "อัพเดทข้อมูลอุปกรณ์เรียบร้อย");
        }
    }

    public function delete($id)
    {

        $img = Device::find($id)->image;
        unlink($img);

        // ลบข้อมูลจากฐานข้อมูล
        $delete = Device::find($id)->delete();

        return redirect()->route('device')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
