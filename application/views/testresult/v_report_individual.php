<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>


<div class="content-wrapper">
    <div class="content-heading">
        <h3>Individual Report View</h3>
    </div>
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Form elements</div> -->
        <div class="panel-body">

            <h4>ค้นหาข้อมูลด้วยรายบุคคล</h4>
            <small> รหัสประจำตัวผู้สอบ หรือ ชื่อ-นามสกุล</small>
            <hr>

            <table class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสประจำตัว</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th class="sort-numeric">ประเภทการสอบ</th>
                        <th class="sort-alpha">ครั้งที่สอบ</th>
                        <th class="sort-alpha">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                        <td>11111111</td>
                        <td>นัทซึกิ</td>
                        <td>ซุบารึ</td>
                        <td>ONET</td>
                        <td>ปีการศึกษา 2557</td>
                        <td>
                            <button onclick="edit_point(<?php echo 11111111 ?>)" class="btn btn-sm btn-warning" >Edit</button>
                            <button onclick="" class="btn btn-sm btn-success" >View</button>
                        </td>
                    </tr>
                    <tr class="gradeX">
                        <td>22222222</td>
                        <td>เอมีเลีย</td>
                        <td>วิดีเช่</td>
                        <td>ONET</td>
                        <td>ปีการศึกษา 2557</td>
                        <td>
                            <button onclick="edit_point()" class="btn btn-sm btn-warning" >Edit</button>
                            <button class="btn btn-sm btn-success" >View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>
    
    var edit_point = (studentCode) => {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/report/searchById"); ?>",
            data: { code : studentCode } ,
            success: function (res) {
                res = JSON.parse(res);
            }
        });
    
    }


</script>


