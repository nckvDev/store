<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="card">
                    <div class="card-header">เพิ่มข้อมูลอุปกรณ์</div>
                    <div class="card-body">
                        <form action="{{ route('addDevice') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label for="device_name" class="col-sm-2 col-form-label">ชื่อพัสดุ</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="device_name">
                                    @error('device_name')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="device_amount" class="col-sm-2 col-form-label">จำนวนทั้งหมด</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="device_amount" min="1" max="5000">
                                    @error('device_amount')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="type_id" class="col-sm-2 col-form-label">type_id</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="type_id">
                                        <option selected>Choose...</option>
                                        @foreach($types as $row)
                                        <option value="{{$row->id}}">{{ $row->type_detail }}</option>
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
                                <label for="location" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="location">
                                    @error('location')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">รูปภาพ</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="device_year" class="col-sm-2 col-form-label">year</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="device_year" >
                                    @error('device_year')
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
