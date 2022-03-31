<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->

            <div class="container">

                <div class="row">
                    <div class="col text-center">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <strong>ตารางรายการพัสดุ</strong>
                                <a href="{{ url('/device/add_device/') }}" class="btn btn-success btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                    เพิ่มข้อมูล <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อพัสดุ</th>
                                            <th scope="col">จำนวนทั้งหมด</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">ตำแหน่ง</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">year</th>
                                            <th scope="col">ชำรุด</th>
                                            <th scope="col">แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($devices as $row)
                                        <tr>
                                            <td>{{ $devices->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->device_name }}</td>
                                            <td>{{ $row->device_amount }}</td>
                                            <td>{{ $row->device_type->type_detail }}</td>
                                            <td>{{ $row->location }}</td>
                                            <td>
                                                <img src="{{ asset($row->image) }}" class="rounded mx-auto d-block" width="80px" height="80px">
                                            </td>
                                            <td>{{ $row->device_year }}</td>
                                            <td>{{ $row->defective_device }}</td>
                                            <td>
                                                <a href="{{ url('/device/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/device/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $devices->links() }}
                            </div>
                            @if(session('success'))
                            <script>
                                swal("{{ session('success') }}", "You clicked the button!", "success");
                            </script>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
