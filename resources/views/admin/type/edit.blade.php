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
                                <form action="{{ url('/type/update/'.$types->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type_detail">ชื่อบริการ</label>
                                        <input type="text" class="form-control" name="type_detail" value="{{ $types->type_detail }}">
                                    </div>
                                    <br>
                                    <input type="submit" value="อัพเดท" class="btn btn-primary" >
                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('service_name')
                                <script>
                                    swal("{{ $message }}!", "You clicked the button name!", "error");
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
