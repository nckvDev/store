<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(5);
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request) {
        //ตรวจสอบข้อมูลความถูกต้อง validate
        $request->validate(
            [
                'service_name'  => 'required|unique:services|max:255',
                'service_image' => 'required|mimes:jpg,jpeg,png'
            ] ,
            [
                'service_name.required'     => "กรุณาป้อนชื่อบริการด้วยครับ",
                'service_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'service_name.unique'       => "มีข้อมูลชื่อบริการนี้ในฐานข้อมูลแล้ว",
                'service_image.required'    => "กรุณาใส่ภาพด้วยครับ",
                'service_image.mimes'       => "Mimes"
            ]
        );

        // การเข้ารหัสรูปภาพ
        $servicesImage = $request->file('service_image');

        // Generate ชื่อภาพ
        $nameGen = hexdec(uniqid());
        // dd($nameGen);

        // ดึงนามสกุลไฟล์ภาพ
        $imgExt = strtolower($servicesImage->getClientOriginalExtension());
        $imgName = $nameGen.'.'.$imgExt;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'images/services/';
        $full_path = $upload_location.$imgName;

        Service::insert([
            'service_name' => $request->service_name,
            'service_image' => $full_path,
            'created_at'    => Carbon::now()
        ]);
        $servicesImage->move($upload_location,$imgName);
        return redirect()->back()->with('success', "บันทึกข้อมูลรูปภาพเรียบร้อย");
    }

    public function edit($id){
        $services = Service::find($id);
        return view('admin.service.edit', compact('services'));
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'service_name'  => 'required|max:255'
            ] ,
            [
                'service_name.required'     => "กรุณาป้อนชื่อภาพด้วยครับ",
                'service_name.max'          => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'service_image.mimes'       => "นามสกุลไฟล์ต้องเป็น jpg jpeg png"
            ]
        );

        $servicesImage = $request->file('service_image');

        if($servicesImage) {
            // Generate ชื่อภาพ
            $nameGen = hexdec(uniqid());
            // dd($nameGen);

            // ดึงนามสกุลไฟล์ภาพ
            $imgExt = strtolower($servicesImage->getClientOriginalExtension());
            $imgName = $nameGen.'.'.$imgExt;

            //อัพโหลดและบันทึกข้อมูล
            $upload_location = 'images/services/';
            $full_path = $upload_location.$imgName;

            Service::find($id)->update([
                'service_name' => $request->service_name,
                'service_image' => $full_path
            ]);

            $old_image = $request->old_image;
            unlink($old_image);

            $servicesImage->move($upload_location,$imgName);
            return redirect()->route('service')->with('success', "อัพเดทรูปภาพเรียบร้อย");

            // อัพเดทภาพและชื่อ

        }else{
            // อัพเดทชื่ออย่างเดียว
            Service::find($id)->update([
                'service_name' => $request->service_name,
            ]);
            return redirect()->route('service')->with('success', "อัพเดทชื่อบริการเรียบร้อย");
        }
    }

    public function delete($id){

        $img = Service::find($id)->service_image;
        unlink($img);

        // ลบข้อมูลจากฐานข้อมูล
        $delete = Service::find($id);
        $delete->delete();
        return redirect()->route('service')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
