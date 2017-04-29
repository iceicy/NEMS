<?php 
	// print_r($this->session->userdata);
?>
<div class="content-wrapper">
    <div class="content-heading">
        จัดการนำเข้าผลคะแนนสอบ
        <small>คุณสามารถนำผลคะแนนสอบของผู้สอบ เข้าสู่ฐานข้อมูลส่วนกลางเพื่อทำการวิเคราะห์ประมวลผลของผู้สอบ</small>
    </div>
	
	

	  <?php if(isset($sheetData)): ?>
		<div class="panel panel-default">
		    <div class="panel-body">
	  		<?php 
		         $attr = array('class' => 'form-horizontal');
	  			 echo form_open_multipart('testresult/import/completeimport/'.$fileName , $attr );
	  		?>
	  		<input class="btn btn-success" name="tresult_import_confirm" type="submit" value="ยืนยันการนำเข้า" />
	  		<input class="btn btn-danger"  name="tresult_import_cancel" type="submit" value="ยกเลิกการนำเข้า" />
	  		<input type="hidden" name="table_name" value="<?php echo $table_name; ?>" />
	  		<input type="hidden" name="fileName" value="<?php echo $fileName; ?>" />
	  		<?php 
			echo form_close();
		 ?>
		 </div>
	  	</div>
	 <?php endif; ?>


	<?php  if(!isset($sheetData)): ?>
	<div class="panel panel-default">
               <!-- <div class="panel-heading">Form elements</div> -->
               <div class="panel-body">
	<?php 
		  	$attr = array('class' => 'form-horizontal');
			echo form_open_multipart('testresult/import/importaction' , $attr );
	?>
			 	 	<br>
                     <fieldset>
      					 <div class="form-group">
                           <label class="col-sm-2 control-label">การจัดสอบครั้งที่</label>
                           <div class="col-sm-10">
                              <select name="tresult_import_test_round" class="form-control m-b">
                                 <option>:: กรุณาเลือกการจัดสอบครั้งที่ ::</option>
                                 <option>การจัดสอบครั้งที่ 1</option>
                                 <option>การจัดสอบครั้งที่ 2</option>
                                 <option>การจัดสอบครั้งที่ 3</option>
                                 <option>การจัดสอบครั้งที่ 4</option>
                              </select>
                              <br>
                           	   <small>เลือกการจัดสอบครั้งที่</small>
                           </div>
                        </div>
                     </fieldset>

                      <fieldset>
      					 <div class="form-group">
                           <label class="col-sm-2 control-label">เลือกรายวิชาผลคะแนนสอบ</label>
                           <div class="col-sm-10">
                              <select name="tresult_import_subject" class="form-control m-b">
                                 <option>:: กรุณาเลือกวิชาของผลคะแนนสอบ ::</option>
                                 <option>SWE605 (613) Software varification and validation</option>
                                 <option>SWE604 (606) Software Structures and Architecture</option>
                                 <option>SWE651 Software Metrics</option>
                                 <option>SWE610 Software Engineering Principles</option>
                              </select>
                              <br>
                           	   <small>เลือกรายวิชาของผลคะแนนสอบ</small>
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                     	<div class="form-group">
                           <label class="col-sm-2 control-label">อัพโหลดไฟล์</label>
                           <div class="col-sm-10">
							<input name="tresult_import_file" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle"><br>
							<?php 
								if(isset($message_upload)){
									echo "<small style='color:red !important;'>$message_upload</small>";
								}else{
							?>
							   <small>อัพโหลดไฟล์ผลคะแนนสอบ ด้วยนามสกุลไฟล์ .xls .csv สามารถโหลด template ตัวอย่างจาก <a href="<?php echo base_url("/uploads/upload_testresult/temp_tresult.csv") ?>">ที่นี่</a></small>
							<?php
								}
							  ?>
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <div class="col-sm-4 col-sm-offset-2">
                              <button type="submit" class="btn btn-success" name="tresult_import_submit" value="tresult_import_submit">ยืนยันการนำเข้า</button>
                           </div>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>

<?php echo form_close();
endif;
 ?>


<div class="panel panel-default" style="margin-top:10px;">
		<div class="panel-body">
			<table class="testresult_datatable table table-striped table-hover">
	 		<?php if(isset($sheetData)): ?>
					<thead>
						<tr>
						<?php foreach ($table_column as $key => $field):  ?>
							<th><?php echo $field; ?></th>
						<?php endforeach; ?>
						</tr>	
					</thead>

					<tbody>
						<?php foreach ($sheetData as $key => $row):  ?>
							<tr>
							<?php foreach ($row as $key => $column):  ?>
								<td><?php echo $column; ?></td>
						     	<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>

		<?php else: ?>
				<h4 class="text-center text-danger">ยังไม่มีการนำเข้าข้อมูลผลคะแนนสอบ</h4>
		<?php endif; ?>
		</table>
	</div>
</div>





