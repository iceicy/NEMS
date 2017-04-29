
<!-- Page content-->
<!--
 * {review Import payment
 * @author: Jiranun
 * @Create Date: 2560-04-11

--> 


<script type="text/javascript">
/*$( document ).ready(function() {
//Fixed Header of dataTable
	var table = $('#table_expend').dataTable();
	new $.fn.dataTable.FixedHeader( table ); 
});*/

function prev_page(){
	window.location.href = "<?php echo site_url()."/payment/Import/import_file";?>";
}


/* fn import_data 
 * Send project data to save DB.
 * @input: set of project data.
 * @output: Saved Success.
 * @author: Jiranun
 * @Create Date: 2559-08-17
*/

function import_data(){
		var im_edu_bgy = document.getElementById("im_edu_bgy").value;
		var im_exam = document.getElementById("im_exam").value;
		var ref_item = document.getElementsByName("ref_item[]");
		var code_item = document.getElementsByName("code_item[]");
		var date_item = document.getElementsByName("date_item[]");
		/*var resource_item = document.getElementsByName("resource_item[]");
		var sub_item = document.getElementsByName("sub_item[]");
		var list_item = document.getElementsByName("list_item[]");
		*/
		var amount_item = document.getElementsByName("amount_item[]");
		var note_item = document.getElementsByName("note_item[]");
			
		var arr_ref = [];
		var arr_code = [];
		var arr_date = [];
		var arr_resource = [];
		var arr_sub = [];
		var arr_list = [];
		var arr_amount = [];
		var arr_note = [];
		
		$.each(ref_item,function(index,obj){
			arr_ref.push(obj.value);
		});
				
		$.each(code_item,function(index,obj){
			arr_code.push(obj.value);
		});
		
		$.each(date_item,function(index,obj){
			arr_date.push(obj.value);
		});
		/*
		$.each(resource_item,function(index,obj){
			arr_resource.push(obj.value);
		});
		
		$.each(sub_item,function(index,obj){
			arr_sub.push(obj.value);
		});
		
		$.each(list_item,function(index,obj){
			arr_list.push(obj.value);
		});
		*/
		$.each(amount_item,function(index,obj){
			arr_amount.push(obj.value);
		});
		
		$.each(note_item,function(index,obj){
			arr_note.push(obj.value);
		});
		
		/*
		arr_resource:JSON.stringify(arr_resource),
					arr_sub:JSON.stringify(arr_sub),
					arr_list:JSON.stringify(arr_list),
		*/
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."/payment/Import/save_payment";?>",
			data: {	im_edu_bgy : im_edu_bgy,im_exam : im_exam,
					arr_ref:JSON.stringify(arr_ref),
					arr_code:JSON.stringify(arr_code),
					arr_date:JSON.stringify(arr_date),					
					arr_amount:JSON.stringify(arr_amount),
					arr_note:JSON.stringify(arr_note)
			},
			dataType : "json",
			success : function(data){				
				if(data["json_alert"] === true){
					//console.log(data["json_alert"]);
					call_notice("แจ้งเตือน",data["json_str"],data["json_type"]);
				}else{
					//console.log(data["json_alert"]);					
					call_notice("แจ้งเตือน",data["json_str"],data["json_type"]);
				}
				
				$("#alert_box").show();
				console.log(data["data_notice"]);
				$("#txt_alert").text(data["data_notice"]);
			}
		});
}//end fn import_data 
</script>

<div class="panel panel-default">
<div class="panel-heading"><h2><?php echo $section_txt;?></h2></div>
	<div class="panel-body">
		<fieldset>
			<div class="form-group">
				<input type="hidden" name="im_edu_bgy" id ="im_edu_bgy" value="<?php echo $im_edu_bgy;?>"  />
				<input type="hidden" name="im_exam" id ="im_exam" value="<?php echo $im_exam;?>"  />
				<table id="table_expend" class="table table-striped products-table" style="overflow-y:scroll;" >
					<thead>
						<tr class="info">
							<th width="3%">ลำดับ</th>
							<th width="10%">รหัสอ้างอิงใบชำระเงิน</th>
							<th width="10%">รหัสประจำตัวผู้เข้าสอบ</th>
							<th width="10%">วันที่ชำระ</th>					
							<th width="10%">จำนวนเงินที่ชำระ (บาท)</th>
							<th >หมายเหตุ</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						if(count($rs_data)>0){
							$seq = 1;
							foreach($rs_data as $key_pj => $val_pj){
					?>
						<tr>
								<td><?php echo $seq;?></td>
								<!--A--> <td><input type="text" name="ref_item[]" value="<?php echo $val_pj["pay_ref"];?>" /></td>
								<!--B--> <td><input type="text" name="code_item[]" value="<?php echo $val_pj["pay_code"];?>" /></td>
								<!--C--> <td><input type="text" name="date_item[]" value="<?php echo $val_pj["pay_date"];?>" /></td>
								<?php 
								/*
								<!--D--> <td><input type="text" name="resource_item[]" value="<?php echo $val_pj["pay_resource"];?>" /></td>
								<!--E--> <td><input type="text" name="sub_item[]" value="<?php echo $val_pj["pay_sub"];?>" /></td>
								<!--F--> <td><input type="text" name="list_item[]" value="<?php echo $val_pj["pay_list"];?>" /></td>
								
								*/
								?>
								<!--G--> <td><input type="text" name="amount_item[]" value="<?php echo $val_pj["pay_amount"];?>" /></td>
								<!--H--> <td><input type="text" name="note_item[]" value="<?php echo $val_pj["pay_note"];?>" /></td>
						</tr>
					<?php	
								$seq++;
							}//foreach rs_data
						}//count rs_data
						
						?>
						
					</tbody>
				</table>
			</div>
		</fieldset>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary" onclick="import_data()" >นำเข้าไฟล์</button>
				<button type="reset" class="btn btn-default">ยกเลิก</button>
			 </div>
		</div>
			
	</div>  
</div>			


 