	
	<div class="content-wrapper">
		<div class="content-heading">
			จัดการนำเข้าผลคะแนนสอบ
			<small>คุณสามารถนำผลคะแนนสอบของผู้สอบ เข้าสู่ฐานข้อมูลส่วนกลางเพื่อทำการวิเคราะห์ประมวลผลของผู้สอบ</small>
			<small style="margin-top:5px;">อัพโหลดไฟล์ผลคะแนนสอบ ด้วยนามสกุลไฟล์ .xls .csv สามารถโหลด template ตัวอย่างจาก <a href="<?php echo base_url("/uploads/upload_testresult/temp_tresult.csv") ?>">ที่นี่</a></small>
		</div>
		<div class="panel panel-default">
		<!-- <div class="panel-heading">Form elements</div> -->
			<div class="panel-body">

				
				<?php echo form_open_multipart('testresult/import/importaction'); ?>
				 <fieldset>
      					 <div class="form-group <?php echo (form_error('tresult_import_type')) ? 'has-error' : ''; ?>">
                           <label class="col-sm-2 control-label">ประเภทการสอบ</label>
                           <div class="col-sm-10">
						   <?php 
								$data = array(
								'name'          => 'tresult_import_type',
								'id'            => 'tresult_import_type',
								'class'			=> 'form-control'
								);
								$options = array(
								''			   => 'เลือกประเภทการสอบ',
								'onet'         => 'O-NET',
								'gat_pat'           => 'GAT/PAT',
								'enet'         => 'E-NET',
								'nnet'        => 'N-NET',
								);
								echo form_dropdown('tresult_import_type', $options, set_value('tresult_import_type') , $data);
								echo form_error('tresult_import_type');   
						   ?>
                           </div>
                        </div>
                     </fieldset>

					<fieldset>
      					 <div class="form-group <?php echo (form_error('tresult_import_test_round')) ? 'has-error' : ''; ?>">
                           <label class="col-sm-2 control-label">ครั้งที่สอบ / ปีการศึกษา</label>
                           <div class="col-sm-10">
						   <?php 
								$data = array(
								'name'          => 'tresult_import_test_round',
								'id'            => 'tresult_import_test_round',
								'class'			=> 'form-control'
								);
								$options = array(
								''			   => 'เลือกครั้งที่สอบ / ปีการศึกษา',
								'1/2557'         => 'การจัดสอบครั้งที่ 1/2557',
								'2/2558'           => 'การจัดสอบครั้งที่ 2/2558',
								'3/2559'         => 'การจัดสอบครั้งที่ 3/2559',
								'4/2560'        => 'การจัดสอบครั้งที่ 4/2560',
								);
								echo form_dropdown('tresult_import_test_round', $options, set_value('tresult_import_test_round') , $data);
								echo form_error('tresult_import_test_round');   
						   ?>
                           </div>
                        </div>
                     </fieldset>
					 

					<fieldset>
      					 <div class="form-group <?php echo (form_error('tresult_import_subject')) ? 'has-error' : ''; ?>">
                           <label class="col-sm-2 control-label">เลือกรายวิชาผลคะแนนสอบ</label>
                           <div class="col-sm-10">
						   <?php 
								$data = array(
								'name'          => 'tresult_import_subject',
								'id'            => 'tresult_import_subject',
								'class'			=> 'form-control',
								'value'         => set_value('tresult_import_subject'),
								);
								$options = array(
								''			   => 'เลือกรายวิชาผลคะแนนสอบ',
								'swe605'         => 'SWE605 (613) Software varification and validation',
								'swe604'           => 'SWE604 (606) Software Structures and Architecture',
								'swe651'         => 'SWE651 Software Metrics',
								'swe610'        => 'SWE610 Software Engineering Principles',
								);
								echo form_dropdown('tresult_import_subject', $options, set_value('tresult_import_subject') , $data);
								echo form_error('tresult_import_subject');   
						   ?>
                           </div>
                        </div>
                     </fieldset>

					   <fieldset>
						<div class="form-group <?php echo (form_error('tresult_import_file')) ? 'has-error' : ''; ?>">
                           <label class="col-sm-2 control-label">อัพโหลดไฟล์</label>
                           <div class="col-sm-10">
						    <?php 
								$data = array(
								'name'          => 'tresult_import_file',
								'id'            => 'tresult_import_file',
								'class'			=> 'form-control',
								);
								echo form_upload($data);
								echo form_error('tresult_import_file');   
								// if(isset($upload_error)){
								// 	echo '<small class="text-danger">'.$upload_error.'</small>';
								// }
						   ?>
                           </div>
                        </div>
                     </fieldset>


					   <fieldset>
                        <div class="form-group">
                           <div class="col-sm-4 col-sm-offset-2">
							<?php

									$data = array(
										'name'          => 'tresult_import_submit',
										'id'            => 'tresult_import_submit',
										'class'			=> 'btn btn-success',
										'value'         => 'ยืนยันการนำเข้า'
									);
									echo form_submit($data);
								
								?>             
				                </div>
                        </div>
                     </fieldset>
				<?php echo form_close(); ?>


			</div>
			<!--end panel-body-->
		</div>
		<!--end panel-master-->
	</div>
	<!--end content-wrapper-->
