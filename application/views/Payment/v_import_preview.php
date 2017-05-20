
<!-- Page content-->
<!--
 * {review Import payment
 * @author: Jiranun
 * @Create Date: 2560-04-11

--> 


<script type="text/javascript">

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
		
		var list_bill = document.getElementsByName("arr_bill[]");
		var list_date = document.getElementsByName("arr_date[]");
		var list_amount = document.getElementsByName("arr_amount[]");
		var list_receiver = document.getElementsByName("arr_receiver[]");
		
		var arr_bill = [];
		var arr_date = [];
		var arr_amount = [];
		var arr_receiver = [];
		
		$.each(list_bill,function(index,obj){
			arr_bill.push(obj.value);
		});
				
		$.each(list_date,function(index,obj){
			arr_date.push(obj.value);
		});
		
		$.each(list_amount,function(index,obj){
			arr_amount.push(obj.value);
		});
		
		$.each(list_receiver,function(index,obj){
			arr_receiver.push(obj.value);
		});
		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."/payment/Import/save_payment";?>",
			data: {	im_edu_bgy : im_edu_bgy,im_exam : im_exam,
					arr_bill:JSON.stringify(arr_bill),
					arr_date:JSON.stringify(arr_date),
					arr_amount:JSON.stringify(arr_amount),					
					arr_receiver:JSON.stringify(arr_receiver)
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
							<th width="10%">วันที่ชำระ</th>					
							<th width="10%">จำนวนเงินที่ชำระ (บาท)</th>
							<th >ผู้รับชำระ</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						if(count($rs_data)>0){
							$seq = 1;
							foreach($rs_data as $key => $val){
									//echo $val["arr_receiver"];
					?>
						<tr>
								<td><?php echo $seq;?></td>
								<!--A--> <td><input type="text" name="arr_bill[]" value="<?php echo $val["arr_bill_no"];?>" /></td>
								<!--B--> <td><input type="text" name="arr_date[]" value="<?php echo $val["arr_date"];?>" /></td>
								<!--C--> <td><input type="text" name="arr_amount[]" value="<?php echo $val["arr_amount"];?>" /></td>
								
								<!--G--> <td><input type="text" name="arr_receiver[]" value="<?php echo $val["arr_receiver"];?>" /></td>
								
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


 