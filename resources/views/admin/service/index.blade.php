<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">ตารางข้อมูลบริการ</div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ภาพประกอบ</th>
                                            <th scope="col">ชื่อบริการ</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">แก้ไข-ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $row)
                                        <tr>
                                            <td>{{ $services->firstItem()+$loop->index }}</td>
                                            <td>
                                                <img src="{{ asset($row->service_image) }}" width="100px" height="100px" alt="">
                                            </td>
                                            <td>{{ $row->service_name }}</td>
                                            <td>
                                                @if ( $row->created_at == NULL)
                                                ไม่ถูกนิยาม
                                                @else
                                                {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/service/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/service/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $services->links() }}
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">แบบฟอร์มบริการ</div>
                            <div class="card-body">
                                <form action="{{ route('addService') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="service_name">ชื่อบริการ</label>
                                        <input type="text" class="form-control" name="service_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="service_image">ภาพประกอบ</label>
                                        <input type="file" class="form-control" name="service_image">
                                    </div>
                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">

                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('service_name')
                                <script>
                                    swal("{{ $message }}!", "You clicked the button!", "error");
                                </script>
                                @enderror
                                @error('service_image')
                                <script>
                                    swal("{{ $message }}!", "You clicked the button!", "error");
                                </script>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
