<link href="{{asset('css/formuser.css')}}" rel="stylesheet">

<x-app-layout>
    <div class="py-6">
        <div class="container">
            <h3 class="titleForm">แบบฟอร์มขอยืม-เบิกพัสดุ</h3>
            <div class="form-row">
                <label class="titleName">ชื่อ-นามสกุล</label>
                <div class="formName">
                    <div class="col-sm-12 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">คำนำหน้า</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="ชื่อ"
                                value="{{ Auth::user()->name }}" readonly>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="นามสกุล">
                        </div>
                    </div>
                </div>
                <div class="date">
                    <input type="date" id="birthday" name="birthday">
                </div>
                <label class="titleOrder">รายการยืม-เบิก</label>
                <div class="form-row">
                    <div class="formOrder">
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">1</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">จำนวน</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>

                        </div>
                    </div>
                    <div class="formOrder">
                        <div class="col-md-9 ">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">2</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">จำนวน</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>

                        </div>
                    </div>
                    <div class="formOrder">
                        <div class="col-md-9 ">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">3</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">จำนวน</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername">
                            </div>

                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger">ยกเลิก</button>
            </div>
        </div>
</x-app-layout>