<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"> แบบฟอร์มแก้ไขข้อมูล </div>
                            <div class="card-body">
                                <form action="{{ url('/category/update/'.$categories->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">ชื่อบริการ</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ $categories->category_name }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="type_id"">type_id</label>
                                            <!-- <input type=" number" class="form-control" name="type_id" value=""> -->
                                            <select class="form-select" name="type_id">
                                                @foreach($types as $row)
                                                <option value="{{$row->id}}" {{$row->id == $categories->type_id ? 'selected' : ''}}>{{ $row->type_detail }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_id')
                                            <span class="text-danger mt-2">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                    </div>
                                    <br>
                                    <input type="submit" value="อัพเดท" class="btn btn-primary">
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
