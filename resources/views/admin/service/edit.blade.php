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
                                <form action="{{ url('/service/update/'.$services->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="service_name">ชื่อบริการ</label>
                                        <input type="text" class="form-control" name="service_name" value="{{ $services->service_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="service_image">ภาพประกอบ</label>
                                        <input type="file" class="form-control" name="service_image" value="{{ $services->service_image }}">
                                    </div>
                                    <br>
                                    <input type="hidden" name="old_image" value="{{ $services->service_image }}">
                                    <div class="align-center">
                                        <img src="{{ asset($services->service_image) }}" alt="" width="400px" height="400px" >
                                    </div>
                                    <br>
                                    <input type="submit" value="อัพเดท" class="btn btn-primary" >
                                </form>
                                @if(session('success'))
                                <script>
                                    swal("{{ session('success') }}", "You clicked the button!", "success");
                                </script>
                                @endif
                                @error('service_image')
                                <script>
                                    swal("{{ $message }}!", "You clicked the button image!", "error");
                                </script>
                                @enderror
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
