<div class="col-sm-12">
    <!-- START panel-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>สร้างรหัสประจำรายวิชา</h2>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="#">

                <div class="form-group">
                    <label class="col-lg-2 control-label">รหัสรายวิชา</label>
                    <div class="col-lg-2">
                        <input type="text" placeholder="รหัสรายวิชา" class="form-control">
                    </div>
                    <label class="col-lg-2 control-label">ชื่อรายวิชา</label>
                    <div class="col-lg-2">
                        <input type="text" placeholder="ชื่อรายวิชา" class="form-control">
                    </div>
                    <div class="clo-lg-2">
                        <button type="Find" class="btn btn-sm btn-default">ค้นหา</button>
                        <button type="Createbarcode" class="btn btn-sm btn-default">สร้างรหัส Barcode</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="reset" class="btn btn-sm btn-default">เคลียร์</button>
                        <button type="submit" class="btn btn-sm btn-success pull-right">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END panel-->
    </div>
</div>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>รายละเอียดวิชา</h2>
        </div>
        <div class="panel-body">
            <table class="table table-bordered" width=100% style="background-color:rgba(255,255,255,0.9)">
                <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รายวิชา</th>
                    <th>รายละเอียด</th>
                    <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>ภาษาไทย</td>
                    <td>การสะกดคำ</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">View</button>
                        <button type="Createbarcode" class="btn btn-sm btn-default">Print</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>วิทยาศาสตร์</td>
                    <td>พื้นฐานทางวิทยาศาสตร์</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">View</button>
                        <button type="Createbarcode" class="btn btn-sm btn-default">Print</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>