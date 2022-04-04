<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><strong>ตารางข้อมูลประเภทอุปกรณ์</strong></div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อประเภท</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">แก้ไข-ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($types as $row)
                                        <tr>
                                            <td>{{ $types->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->type_detail }}</td>
                                            <td>
                                                @if ( $row->created_at == NULL)
                                                ไม่ถูกนิยาม
                                                @else
                                                {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/type/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/type/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $types->links() }}
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">แบบฟอร์มบริการ</div>
                            <div class="card-body">
                                <form action="{{ route('addType') }}" method="POST" >
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="type_detail">ชื่อบริการ</label>
                                        <input type="text" class="form-control" name="type_detail">
                                    </div>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">
                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('type_detail')
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
