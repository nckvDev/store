<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="card">
                            <div class="card-header">ตารางข้อมูลประเภทอุปกรณ์</div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อหมวดหมู่</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">แก้ไข-ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $row)
                                        <tr>
                                            <td>{{ $categories->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->category_name }}</td>
                                            <td>{{ $row->category_type->type_detail }}</td>
                                            <td>
                                                @if ( $row->created_at == NULL)
                                                ไม่ถูกนิยาม
                                                @else
                                                {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/category/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/category/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">แบบฟอร์มหมวดหมู่</div>
                            <div class="card-body">
                                <form action="{{ route('addCategory') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">ชื่อหมวดหมู่</label>
                                        <input type="text" class="form-control mb-2" name="category_name">

                                        <label for="type_id">ประเภท</label>
                                        <select class="form-select" name="type_id">
                                            <option selected>Choose...</option>
                                            @foreach($types as $row)
                                            <option value="{{$row->id}}">{{ $row->type_detail }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">
                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('category_name')
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
