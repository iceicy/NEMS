<div class="col-sm-12">
  <div class="content-wrapper">
    <div class="panel-heading">
      <h2>ข้อมูลผู้สอบ</h2>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"></div>
          </div>
          <div class="panel-body">
              <fieldset>
                <legend>ข้อมูลทั่วไป</legend>
                <div class="col-lg-12">
                  <div class="col-lg-10">
                    <div class="col-lg-3">
                      <div class="block-center col-md-12">
                        <img
                        alt=""
                        src="<?php echo base_url().$this->session->userdata('student_pic'); ?>"
                        class="block-center media-box-object img-responsive img-rounded thumb128"/>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <label class="col-lg-4 control-label">ชื่อ-นามสกุล</label>
                        <div class="col-lg-5">
                          <?php
                          $name = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
                          $id = $this->session->userdata('student_ID');
                          $dob = $this->session->userdata('DOB');
                          ?>
                          <label class="col-lg-9 control-label"><?php echo $name; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">หมายเลขบัตรประชาชน</label>
                        <div class="col-lg-5">
                          <label class="col-lg-9 control-label"><?php echo $id; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">ปีเกิด-เดือน-วัน</label>
                        <div class="col-lg-5">
                          <label class="col-lg-9 control-label"><?php echo $dob; ?></label>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                    <form class="form-horizontal" method="post" action="<?php echo site_url($this->config->item('exam_dir') . 'Register/saveRegistration') ?>">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">มีความประสงค์ที่จะสมัครสอบ</label>
                        <div class="col-lg-3">
                          <?php
                            echo form_dropdown('SubID', $op_subject, array($op_subject), 'class="form-control"');
                          ?>
                        </div>
                        <div class="col-lg-offset-10">                          
                          <button type="submit" class="btn btn-primary">สมัครสอบ</button>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>เลือกวิชาที่ต้องการสอบ</legend>
                      <table id="datatable3" class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>วันที่</th>
                            <th>รหัสวิชา</th>
                            <th>วิชา</th>
                            <th>ค่าสมัครสอบ</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_tables->result() AS $index => $item) { ?>
                          <tr class="gradeX">
                              <td><?php echo $item->CreateDate ?></td>
                              <td><?php echo $item->SubID; ?></td>
                              <td><?php echo $item->SubName; ?></td>
                              <td><?php echo $item->Price; ?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                  </div>
                </div>
                <!-- END panel-->

              </div>
            </div>
            <!-- END row-->
          </div>
        </div>
