<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<x-jet-welcome />-->
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <a href=" " class="btn btn-warning btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                            เพิ่มวัสดุชำรุด <i class="fas fa-plus-circle"></i>
                        </a>
                        <div class="card">
                            <div class="card-header">ตารางวัสดุชำรุด</div>
                            <div class="card-body">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">วัสดุ</th>
                                            <th scope="col">จำนวนชำรุด</th>
                                            <th scope="col">วันที่</th>
                                        </tr>
                                    </thead>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href=" " class="btn btn-warning btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                            เพิ่มครุภัณฑ์ชำรุด <i class="fas fa-plus-circle"></i>
                        </a>
                        <div class="card">
                            <div class="card-header">ตารางครุภัณฑ์ชำรุด</div>
                            <div class="card-body">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ครุภัณฑ์</th>
                                            <th scope="col">จำนวนชำรุด</th>
                                            <th scope="col">วันที่</th>
                                        </tr>
                                    </thead>

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
