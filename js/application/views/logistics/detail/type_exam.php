
<!-- Main section-->
<section>
    <style type="text/css">
        .type-exam{
            margin-left: 1.5%;
        }
        .type-txt{
            margin-left: 3%;
        }
    </style>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <legend>ข้อมูลข้อสอบ</legend>
                <div class="form-group">
                    <label class="col-lg-2 control-label">ค้นหาข้อสอบ</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="รหัสข้อสอบ" class=""><button type="submit">ค้นหา</button>
                    </div>
                </div>
                <br><br><br>

                <div class="type-exam">
                    <label class="control-label">ประเภทการสอบ</label>
                    <br>
                    <div class="type-txt">
                        <label class=""><a href="<?php echo site_url('logistics/detail/Place_Exam') ?>">O-NET</a></label><br>
                        <label class=""><a href="<?php echo site_url('logistics/detail/Place_Exam') ?>">GAT</a></label><br>
                        <label class=""><a href="<?php echo site_url('logistics/detail/Place_Exam') ?>">PAT1</a></label><br>
                        <label class=""><a href="<?php echo site_url('logistics/detail/Place_Exam') ?>">PAT2</a></label>
                    </div>
                    <br><br><br>
                </div>
            </div>				

        </div>
</section>
<!-- Page footer-->
