<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <strong>ตารางรายการอุปกรณ์</strong>
                                <a href="{{ url('/stock/add_stock/') }}" class="btn btn-success btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                    เพิ่มข้อมูล <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่ออุปกรณ์</th>
                                            <th scope="col">จำนวนทั้งหมด</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">ตำแหน่ง</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">รหัสอุปกรณ์</th>
                                            <th scope="col">ชำรุด</th>
                                            <th scope="col">แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stocks as $row)
                                        <tr>
                                            <td>{{ $stocks->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->stock_name }}</td>
                                            <td>{{ $row->stock_amount }}</td>
                                            @if($row->stock_status == 1)
                                            <td>
                                                <div class="rounded text-white bg-success">ปกติ</div>
                                            </td>
                                            @endif
                                            <td><img src="{{ asset($row->image) }}" class="rounded mx-auto d-block" width="80" height="80"></td>
                                            <td>{{ $row->position }}</td>
                                            <td>{{ $row->stock_type->type_detail }}</td>
                                            <td>{{ $row->stock_num }}</td>
                                            <td>{{ $row->defective_stock }}</td>
                                            <td>
                                                <a href="{{ url('/stock/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/stock/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $stocks->links() }}
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
    <script>
        $('#myModal').modal('show')
    </script>
</x-app-layout>
