<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"> แบบฟอร์มแก้ไขข้อมูล </div>
                            <div class="card-body">
                                <form action="{{ url('/department/update/'.$department->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department_name">ชื่อแผนก</label>
                                        <input type="text" class="form-control" name="department_name" value="{{ $department->department_name }}">
                                    </div>
                                    <br>
                                    <input type="submit" value="อัพเดท" class="btn btn-primary" >
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
