<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header"><strong>ตารางผู้ใช้งาน</strong></div>
                            <div class="card-body">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อ</th>
                                            <th scope="col">อีเมลล์</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($users as $row)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->created_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
