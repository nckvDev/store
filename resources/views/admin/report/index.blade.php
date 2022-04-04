<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->

            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header ">
                                รายงาน
                            </div>
                            <div class="card-body">
                                <table class="table table-success table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">วัสดุ</th>
                                            <th scope="col">พัสดุ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <span>จำนวนของวัสดุที่เพิ่มเข้ามา</span> <span>{{ $stocks_count }} ตัว</span> </td>
                                            <td> <span>จำนวนของพัสดุที่เพิ่มเข้ามา</span> <span>{{ $devices_count }} ตัว</span> </td>
                                        </tr>
                                        <tr>
                                            <td> <span>จำนวนของวัสดุทั้งหมด</span> <span>{{ $stocks_sum }} ชิ้น</span> </td>
                                            <td> <span>จำนวนของพัสดุที่เพิ่มเข้ามา</span> <span>{{ $devices_sum }} ชิ้น</span> </td>
                                        </tr>
                                        <tr>
                                            <td> <span>วัสดุที่ชำรุด</span> <span>{{ $stocks_defective }} ชิ้น</span> </td>
                                            <td> <span>พัสดุที่ชำรุด</span> <span>{{ $devices_defective }} ชิ้น</span> </td>
                                        </tr>
                                        <tr>
                                            <td> <span>วัสดุที่ใช้งานได้</span> <span>{{ $stocks_can }} ชิ้น</span> </td>
                                            <td> <span>พัสดุที่ใช้งานได้</span> <span>{{ $devices_can }} ชิ้น</span> </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
