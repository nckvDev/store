<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">ตารางข้อมูลแผนก</div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อแผนก</th>
                                            <th scope="col">คนบันทึก</th>
                                            <th scope="col">แก้ไข-ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($departments as $row)
                                        <tr>
                                            <td>{{ $departments->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->department_name }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>
                                                <a href="{{ url('/department/edit/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/department/softdelete/'.$row->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $departments->links() }}
                            </div>

                        </div>
                        @if (count($trashDepartments) > 0)
                        <div class="card mt-2">
                            <div class="card-header">ถังขยะ</div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อแผนก</th>
                                            <th scope="col">คนบันทึก</th>
                                            <th scope="col">กู้คืน-ลบถาวร</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trashDepartments as $row)
                                        <tr>
                                            <td>{{ $trashDepartments->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->department_name }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>
                                                <a href="{{ url('/department/restore/'.$row->id) }}" class="btn btn-warning btn-sm " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ url('/department/delete/'.$row->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $trashDepartments->links() }}
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">แบบฟอร์ม</div>
                            <div class="card-body">
                                <form action="{{ route('addDepartment') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department_name">ชื่อตำแหน่งงาน</label>
                                        <input type="text" class="form-control" name="department_name">
                                    </div>

                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">
                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('department_name')
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
