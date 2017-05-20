<?php 
/*
* v_import_excel
* Display import excel page
* @input:   import file excel 
* @output:  semd spreadsheet .xls/ . xlsx into preview_file
* @author:  Jiranun
* @Create Date: 2560-04-11
*/

?>
<script type="text/javascript"  src="<?php echo base_url();?>js/payment/validate.js"></script>

<script type="text/javascript">

/* check_form 
 * Checking  form data
 * @input: form_id
 * @output: Insert data to DB
 * @author: Jiranun
 * @Create Date: 2560-04-11
 */
function check_form(form_id){
	//console.log(form_id);
	var check_frm = validate_form_payment(form_id);	
	
	if(check_frm == true){	
		console.log("true");
		$("#"+form_id).submit();		
	}else{
		console.log("false");
	}
}//end fn check_form

//เปลี่ยน ปีการศึกษา ---> ไปดึง ประเภทการสอบ ในปีนั้นๆ
function change_year(bgy_value){
	console.log("selected bgy : " + bgy_value);
	$.ajax({
		type: "POST",
		url: "<?php echo site_url()."/payment/Import/type_exam_option";?>",
		data: {im_edu_bgy:bgy_value},
		success : function(data){
			$("#im_exam").html(data);
		}//end success
	});//end ajax
}//end fn change_year

</script>


<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"><h4>นำเข้าไฟล์ข้อมูลการชำระเงิน</h4></div>
			<div class="panel-body">
				<form id="frm_import" action="<?php echo site_url()."/payment/Import/preview_file"?>"  enctype="multipart/form-data" class="form-horizontal" method="post" > 
				  <fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">ปีการศึกษา</label>
						  <div class="col-sm-4"  id="div_im_edu_bgy" >
							 <select class="form-control" id="im_edu_bgy" name="im_edu_bgy" onchange="change_year(this.value);"  >
								 <option value="">--- เลือก ---</option>
								 <?php 
								
								 if($rs_year_exam->num_rows() > 0){
									 foreach($rs_year_exam->result() as $year){
								?>
									<option value="<?php echo $year->Year;?>" ><?php echo $year->Year;?></option>
								<?php										 
									 }
									 
								 }
								 ?>
							 </select>
						  </div>
					   </div>
				</fieldset>
				<fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">ประเภทการสอบ</label>
						  <div class="col-sm-4" id="div_im_exam" >
							 <select class="form-control" id="im_exam" name="im_exam" >
							 </select>
						  </div>
					   </div>
				</fieldset>
				<fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">นำเข้าไฟล์</label>
						  <div class="col-sm-4" id="div_im_file">
							 <input id="im_file" type="file" accept=".xls" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" name="uploadfile"  />
							<input type="hidden" name="upload_data" value="payment" />
						  </div>
					   </div>
				 </fieldset>
				    
				</form>
			</div> 
			
			<div class="panel-footer">
				<div class="row">
					  <div class="form-group">
						 <div class="col-lg-offset-2 col-lg-10">
							<button type="submit" class="btn btn-primary" onclick="check_form('frm_import')">นำเข้าไฟล์</button>
							<button type="reset" class="btn btn-default">ยกเลิก</button>
						 </div>
					  </div>
				</div> 
			</div> 
			
		</div>
	</div>				
</section>
<!-- Page footer-->

