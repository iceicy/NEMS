<div class="content-wrapper">
	<div class="content-heading">
		จัดการนำเข้าผลคะแนนสอบ
		<small>คุณสามารถนำผลคะแนนสอบของผู้สอบ เข้าสู่ฐานข้อมูลส่วนกลางเพื่อทำการวิเคราะห์ประมวลผลของผู้สอบ</small>
		<small style="margin-top:5px;">อัพโหลดไฟล์ผลคะแนนสอบ ด้วยนามสกุลไฟล์ .xls .csv สามารถโหลด template ตัวอย่างจาก <a href="<?php echo base_url("/uploads/upload_testresult/temp_tresult.csv") ?>">ที่นี่</a></small>
	</div>
	<div class="panel panel-default">
		<!-- <div class="panel-heading">Form elements</div> -->
		<div class="panel-body">
                
            <?php 
		         $attr = array('class' => 'form-horizontal' );
	  			 echo form_open_multipart('testresult/import/completeimport/'.$tresult_import['file_name'] , $attr );
	  		?>
			
 			<fieldset>
				<div class="row">
						<div class="col-md-6 form-group">
		                       <label class="col-sm-2 control-label">ประเภทการสอบ</label>
		                       <div class="col-sm-10">
									<input disabled type="text" class="form-control" name="tresult_import_type" value="<?php echo $tresult_import["tresult_import_type"]; ?>" / >
		                       </div>
						</div>

						<div class="col-md-6 form-group">
	                       <label class="col-sm-2 control-label">ครั้งที่สอบ / ปีการศึกษา</label>
	                       <div class="col-sm-10">
								<input disabled type="text" class="form-control" name="tresult_import_round" value="<?php echo $tresult_import["tresult_import_test_round"]; ?>" / >
	                       </div>
	                   </div>

	                   <div class="col-md-6 form-group">
	                       <label class="col-sm-2 control-label">วิชาผลคะแนนสอบ</label>
	                       <div class="col-sm-10">
								<input disabled type="text" class="form-control" name="tresult_import_subject" value="<?php echo $tresult_import["tresult_import_subject"]; ?>" / >
	                       </div>
	                   </div>


				</div>
			 </fieldset>

	  		<input class="btn btn-success" name="tresult_import_confirm" type="submit" value="ยืนยันการนำเข้า" />
	  		<input class="btn btn-danger"  name="tresult_import_cancel" type="submit" value="ยกเลิกการนำเข้า" />
	  		<input type="hidden" name="table_name" value="<?php echo $tresult_import['table_name']; ?>" />
	  		<input type="hidden" name="fileName" value="<?php echo $tresult_import['file_name']; ?>" />
	  		<?php 
			echo form_close();
		 ?>

            <table id="table_import_preview" class="testresult_datatable table table-striped table-hover">
	 		<?php if(isset($tresult_import['sheetData'])): ?>
			 		
			<?php else: ?>
				<h4 class="text-center text-danger">ยังไม่มีการนำเข้าข้อมูลผลคะแนนสอบ</h4>
			<?php endif; ?>
		</table>



		</div>
		<!--panel-body-->
	</div>
	<!--panel-->
</div>
<!--content-wrapper-->


<script>

	var tb_col = (<?php echo json_encode($tresult_import['table_column']); ?>)
	var tb_row = (<?php echo json_encode($tresult_import['sheetData']); ?>)
	
	var tb_col_str = '<thead><tr>';
		tb_col.map( (col , index) => {
			tb_col_str +=	(`<th>${col}</th>`);
		});
		tb_col_str += '</tr><thead>';
		$('#table_import_preview').append(tb_col_str);
	
	var tb_row_str = '<tbody>';
		tb_row.map( (row, index) =>{
			if(row.citizen_id != 1){
				tb_row_str += `
					<tr>
						<td>${row.citizen_id}</td>
						<td>${row.std_fname}</td>
						<td>${row.std_lname}</td>
						<td>${row.std_point}</td>
						<td>${row.std_school}</td>
					</tr>
				`
			}
		})
		
	tb_row_str += '</tobdy>';
	$('#table_import_preview').append(tb_row_str);
	



</script>