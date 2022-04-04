<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="d-flex justify-center mb-3 ">
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="input-group ">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{ request()->query('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-3  sm:px-20 bg-gray-800 border-b border-gray-200 text-gray-200 rounded-top">
                รายการอุปกรณ์
            </div>
            <div class="container p-3 sm:px-20 bg-white border-b border-gray-200 rounded-bottom mb-3">

                <div class="row mb-3" id="row">
                    @forelse($stocks as $row)
                    <div class="col-2">
                        <div class="card card-deck position-relative" id="col-3" style="width: 11rem;">
                            @if($row->stock_status == 1)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                ปกติ
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            @endif
                            <img src="{{ asset($row->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $row->stock_name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-row justify-content-between">
                                    <span>รหัส</span> <span>{{ $row->stock_num }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-row justify-content-between">
                                    <span>อยู่ที่ห้อง</span> <span>{{ $row->position }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-row justify-content-between">
                                    <span>จำนวน</span> <span>{{ $row->stock_amount }}</span>
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="" class="btn btn-light btn-sm">View</a>
                                <a href="{{ url('/stock/edit/'.$row->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h1 class="text-center">
                        ไม่มีข้อมูล <strong>{{ request()->query('search') }}</strong>
                    </h1>
                    @endforelse
                </div>
                {{ $stocks->appends(['search' => request()->query('search')], ['devices' => $devices->currentPage()])->links() }}
            </div>

            <div class="p-3 sm:px-20 bg-gray-800 border-b border-gray-200 text-gray-200 rounded-top">
                รายการพัสดุ
            </div>
            <div class="container p-3 sm:px-20 bg-white border-b border-gray-200 rounded-bottom">

                <div class="row mb-3" id="row">
                    @forelse($devices as $row)
                    <div class="col-2">
                        <div class="card card-deck position-relative" id="col-3" style="width: 11rem;">
                            @if($row->device_status == 1)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                ปกติ
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            @endif
                            <img src="{{ asset($row->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $row->device_name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex flex-row justify-content-between">
                                    <span>อยู่ที่ห้อง</span> <span>{{ $row->location }}</span>
                                </li>
                                <li class="list-group-item d-flex flex-row justify-content-between">
                                    <span>จำนวน</span> <span>{{ $row->device_amount }}</span>
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="" class="btn btn-light btn-sm">View</a>
                                <a href="{{ url('/device/edit/'.$row->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h1 class="text-center">
                        ไม่มีข้อมูล <strong>{{ request()->query('search') }}</strong>
                    </h1>
                    @endforelse
                </div>
                {{ $devices->appends(['search' => request()->query('search')], ['stocks' => $stocks->currentPage()])->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
