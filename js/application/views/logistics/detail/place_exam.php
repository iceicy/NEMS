
<!-- Main section-->
<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="panel panel-default">
            <br>
            <label class="col-sm-2 control-label">ข้อสอบ O-NET <br></label>
            <div class="panel-heading"></div>

            <div class="panel-body">
                <label class="col-sm-2 control-label"> ปีการศึกษา
                    <br>
                    <small></small>
                </label>
                <div class="col-sm-4">
                    <!-- SELECT2-->
                    <select id="select2-1" class="form-control">
                        <option value="IL">2557</option>
                        <option value="AL">2558</option>
                        <option value="AR">2559</option>
                    </select>
                </div>
                <br><br><br>
                <label class="col-sm-2 control-label"> ศุนย์สอบ
                    <br>
                    <small></small>
                </label>
                <div class="col-sm-4">
                    <!-- SELECT2-->
                    <select id="select2-1" class="form-control">
                        <option value="AL">กทม เขต1</option>
                        <option value="AR">กทม เขต1</option>
                        <option value="IL">กทม เขต2</option>


                    </select>
                </div>
                <br><br><br>
                <label class="col-sm-2 control-label"> โรงเรียน
                    <br>
                    <small></small>
                </label>
                <div class="col-sm-4">
                    <!-- SELECT2-->
                    <select id="select2-1" class="form-control">
                        <option value="AL">รร. เตรียมอุดม</option>
                        <option value="AR">รร. สาธิตจุฬา</option>
                        <option value="IL">รร. บางมดวิทยา</option>


                    </select>
                </div>
                <br><br><br>
                <label class="col-sm-2 control-label"> เลือกระดับชั้น
                    <br>
                    <small></small>
                </label>
                <div class="col-sm-4">
                    <!-- SELECT2-->
                    <select id="select2-1" class="form-control">
                        <option value="AL">ป.6</option>
                        <option value="AR">ม.3</option>
                        <option value="IL">ม.6</option>


                    </select>
                </div>
                <br><br><br>

                <form method="get" action="<?php echo site_url('logistics/detail/Num_Exam') ?>">
                    <button type="submit">แสดงจำนวนข้อสอบ</button>
                </form>
                <br>
            </div>
        </div>				

    </div>
</section>
<!-- Page footer-->
