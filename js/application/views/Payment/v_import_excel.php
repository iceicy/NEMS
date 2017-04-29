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
<script src="<?php echo base_url();?>js/payment/validate.js"></script>

<script type="text/javascript">

/* check_form 
 * Checking validate form data
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
</script>


<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"><h4>นำเข้าไฟล์ข้อมูลการชำระเงิน</h4></div>
			<div class="panel-body">
				<form id="frm_import" action="<?php echo site_url()."/payment/Import/preview_file"?>" enctype="multipart/form-data" class="form-horizontal" method="post" > 
				  <fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">ปีการศึกษา</label>
						  <div class="col-sm-4" >
							 <select class="form-control" id="im_edu_bgy" name="im_edu_bgy" >
								 <option value="2560" >2560</option>
								 <option value="2559" >2559</option>
								 <option value="2558" >2558</option>
								 <option value="2557" >2557</option>
							 </select>
						  </div>
					   </div>
				</fieldset>
				<fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">ประเภทการสอบ</label>
						  <div class="col-sm-4">
							 <select class="form-control" id="im_exam" name="im_exam" >
								 <option value="o-net" >o-net</option>
								 <option value="GAT" >GAT</option>
							 </select>
						  </div>
					   </div>
				</fieldset>
				<fieldset>
					   <div class="form-group">
						  <label class="col-sm-2 control-label">นำเข้าไฟล์</label>
						  <div class="col-sm-4">
							 <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" name="uploadfile" />
							<input type="hidden" name="upload_data" value="payment" />
						  </div>
					   </div>
				 </fieldset>
				 <fieldset>
					  <div class="form-group">
						 <div class="col-lg-offset-2 col-lg-10">
							<button type="submit" class="btn btn-primary">นำเข้าไฟล์</button>
							<button type="reset" class="btn btn-default">ยกเลิก</button>
						 </div>
					  </div>
				 </fieldset>    
				</form>
			</div>  
		</div>
	</div>				
</section>
<!-- Page footer-->

