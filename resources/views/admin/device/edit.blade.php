<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลพัสดุ</div>
                    <div class="card-body">
                        <form action="{{ url('/device/update/'.$devices->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label for="device_name" class="col-sm-2 col-form-label">ชื่อพัสดุ</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="device_name" maxlength="5" value="{{ $devices->device_name }}">
                                    @error('device_name')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="device_amount" class="col-sm-2 col-form-label">จำนวน</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="device_amount" value="{{ $devices->device_amount }}">
                                    @error('device_amount')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">รูปภาพ</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image" value="{{ $devices->image }}">
                                    <input type="hidden" name="old_image" value="{{ $devices->image }}">
                                    <br>
                                    <div class="align-center">
                                        <img src="{{ asset($devices->image) }}" alt="" width="200px" height="200px" >
                                    </div>
                                    @error('image')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="location" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="location" value="{{ $devices->location }}">
                                    @error('location')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="device_year" class="col-sm-2 col-form-label">device_year</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="device_year" value="{{ $devices->device_year }}">
                                    @error('device_year')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="type_id" class="col-sm-2 col-form-label">type_id</label>
                                <div class="col-sm-4">
                                    <!-- <input type="number" class="form-control" name="type_id" value=""> -->
                                    <select class="form-select" name="type_id">
                                        @foreach($types as $row)
                                        <option value="{{$row->id}}" {{$row->id == $devices->type_id ? 'selected' : ''}} >{{ $row->type_detail }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="defective_device" class="col-sm-2 col-form-label">ชำรุด</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="defective_device" value="{{ $devices->defective_device }}">
                                    @error('defective_device')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                                <a href="{{ url('device') }}" class="btn btn-danger">ยกเลิก</a>
                            </div>
                        </form>
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
</x-app-layout>

<!-- <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script> -->
