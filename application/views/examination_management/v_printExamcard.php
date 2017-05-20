<form class="" action="#" method="post">

<div class="col-sm-12">
	<div class="content-wrapper">
      <div class="panel-heading">
          <h2>พิมพ์บัตรประจำตัวผู้สมัครสอบ</h2>
      </div>
      <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title"></div>
                  </div>
                  <div class="panel-body">

                  <form class="form-horizontal">

                  <fieldset>
                     <legend>บัตรประจำตัวผู้สมัครสอบ</legend>
        <div class="col-lg-12">
		<div class="col-lg-10">
			<div class="col-lg-9">
        <div class="form-group">
                       <label class="col-lg-4 control-label">รหัสผู้สมัครสอบ</label>
                       <div class="col-lg-5">
												 <?php
												 $name = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
												 $id = $this->session->userdata('student_ID');
												 $studentID = $this->session->userdata('student_ID');
												 $dob = $this->session->userdata('DOB');
												 ?>
                        <label class="col-lg-9 control-label"><?php echo $studentID; ?></label>
                       </div>
         		</div>
				<div class="form-group">
                       <label class="col-lg-4 control-label">ชื่อ-นามสกุล</label>
                       <div class="col-lg-5">
												 <label class="col-lg-9 control-label"><?php echo $name; ?></label>
                       </div>
         		</div>
         		<div class="form-group">
                       <label class="col-lg-4 control-label">หมายเลขบัตรประชาชน</label>
                       <div class="col-lg-5">
                          <label class="col-lg-9 control-label"><?php echo $id; ?></label>
                       </div>
                       <label class="col-lg-4 control-label">วัน-เดือน-ปี เกิด</label>
                       <div class="col-lg-5">
                          <label class="col-lg-9 control-label"><?php echo $dob; ?></label>
                       </div>
         		</div>

      </div>
			<div class="col-lg-9">
				<div class="form-group">
                       <label class="col-lg-4 control-label">ประเภทการสอบ</label>
                       <div class="col-lg-3 control-label">
												 <select>
													 <option value="volvo">GAT/PAT</option>
													 <option value="opel">O-NET</option>
												</select>
                       </div>
         </div>
				 <div class="form-group">
				 	<button type="submit" class="btn btn-sm btn-success pull-right">พิมพ์บัตรประจำตัวผู้สมัครสอบ</button>
				 </div>

			</div>

      </div>
</form>
