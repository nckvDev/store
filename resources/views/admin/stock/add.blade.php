<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="card">
                    <div class="card-header">เพิ่มข้อมูลอุปกรณ์</div>
                    <div class="card-body">
                        <form action="{{ route('addStock') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 row">
                                <label for="stock_num" class="col-sm-2 col-form-label">รหัสอุปกรณ์</label>
                                <div class="col-sm-4">
                                    <input type="search" class="form-control" name="stock_num" maxlength="5" value="{{ (old('stock_num')) ?  old('stock_num') : '' }}" autofocus>
                                    @error('stock_num')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="stock_name" class="col-sm-2 col-form-label">ชื่ออุปกรณ์</label>
                                <div class="col-sm-4">
                                    <input type="search" class="form-control" name="stock_name" value="{{ (old('stock_name')) }}">
                                    @error('stock_name')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="stock_amount" class="col-sm-2 col-form-label">จำนวนทั้งหมด</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="stock_amount" min="1" max="5000" value="{{ (old('stock_amount')) }}">
                                    @error('stock_amount')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">รูปภาพ</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image" value="{{ (old('image')) }}">
                                    @error('image')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="position" class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                <div class="col-sm-4">
                                    <input type="search" class="form-control" name="position" value="{{ (old('position')) }}">
                                    @error('position')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="amount_minimum" class="col-sm-2 col-form-label">จำนวนน้อยสุด</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="amount_minimum" min="1" max="20" value="{{ (old('amount_minimum')) }}">
                                    @error('amount_minimum')
                                    <span class="text-danger mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="type_id" class="col-sm-2 col-form-label">ประเภท</label>
                                <div class="col-sm-4">
                                <!-- <input type="number" class="form-control" name="type_id" > -->
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
                            <div class="form-group mb-3">
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                                <!-- <a href="{{ url('stock/all') }}" class="btn btn-danger">ยกเลิก</a> -->
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
