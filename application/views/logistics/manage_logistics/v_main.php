<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><?php echo $header_name;?></h2>
        </div>
        <div class="panel-body">
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-4 control-label">ปีการศึกษา</label>
                    <div class="col-lg-5   ">
                        <?php
                        echo form_dropdown('Year', $op_year, array($val_year), 'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">ประเภทข้อสอบ</label>
                    <div class="col-lg-5">
                        <select name="" class="form-control">
                            <option>O-Net</option>
                            <option>A-Net</option>
                        </select>
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
    </div>
</div>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <table class="table table-hover" width='100%'>
                <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>วิชา</th>
                    <th>ส่งออกข้อสอบ</th>
                    <th>ศูนย์สอบรับข้อสอบ</th>
                    <th>ศูนย์สอบส่งคือข้อสอบ</th>
                    <th>รับข้อสอบคืน</th>
                </tr>
                </thead>
                <tbody>
                <tr style="background-color:#003033">
                    <td colspan="5"><p style="color:#FFFFFF"><strong> ศุนย์สอบ
                                มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี </strong></p>

                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-success ">เพิ่มรายวิชา</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ภาษาไทย</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Eng</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>เคมี</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                </tr>
                <tr style="background-color:#003033">
                    <td colspan="5"><p style="color:#FFFFFF"><strong> ศุนย์สอบ มหาวิทยาลัยบูรพา </strong></p>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-success ">เพิ่มรายวิชา</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ภาษาไทย</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>

                </tr>
                <tr>
                    <td>2</td>
                    <td>Eng</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>เคมี</td>
                    <td>
                        <button type="Find" class="btn btn-sm btn-default">รอยืนยัน</button>
                    </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

  