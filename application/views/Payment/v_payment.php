

<script>

function edit(pay_id){
	var url_get = 'http://nems.sit.kmutt.ac.th/NEMs/index.php/payment/Payment/index/'+pay_id;
	window.location.href = url_get;
}

function delete_pay(pay_id) {
		$.ajax({
		type:'POST',

		url:'http://nems.sit.kmutt.ac.th/NEMs/index.php/payment/Payment/delete_by_payid/',
		data:{pay_id:pay_id},
		success: function(data){
			console.log(data);
			 if(data=="YES"){
				//swal("Deleted!", "Your record has been deleted.", "success");
				alert('Your record has been deleted ');
				location.reload();
			 }else{
				// swal("Deleted Fail !", "Your record hasn't been deleted.", "Fail");
			 }
		}

		})
		
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
}
</script>



<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"></div>
         <div class="panel-body">
            <form method="POST" class="form-horizontal" action="http://nems.sit.kmutt.ac.th/NEMs/index.php/payment/Payment/insert">
			
               <fieldset>
                  <legend>จัดการรายละเอียดการชำระเงิน</legend>
                 
                        <input class="form-control m-b" type="hidden" name="pay_id" value="<?php if(isset($rs_edit)){ echo $rs_edit->row()->pay_id; } ?> "> 
						
                  <div class="form-group">
                     <label class="col-sm-3 control-label">เลขที่อ้างอิงการชำระเงิน<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text" name="pay_bill" value="<?php if(isset($rs_edit)){ echo $rs_edit->row()->pay_bill; } ?>">
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">วันที่ชำระเงิน<br></label>
                     <div class="col-sm-3">
                        <div class="calendardate input-group date">
                           <input type="text" class="form-control" name="pay_date" value="<?php if(isset($rs_edit)){ echo date("d/m/Y",strtotime($rs_edit->row()->pay_date) ); } ?>">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">สถานะการชำระเงิน<br></label>
                     <div class="col-sm-3">
                        <select id="status" class="form-control" name="pay_bs_id" >
						<?php if(isset($rs_option_status)){
								$seleted=""; 
								foreach($rs_option_status->result() as $option){
									if(isset($rs_edit)){ 
										
										if($rs_edit->row()->pay_bs_id == $option->bs_id){
											$seleted="selected";
										}  
									} 
						?>
                           <option value="<?php echo $option->bs_id;?>" <?php echo $seleted;?> ><?php echo $option->bs_name;?> </option>
                          
						<?php 	}
							}
						?>
                        </select>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">จำนวนเงินที่ต้องชำระ<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" readonly type="text" name="must_pay" value="<?php if(isset($rs_edit)){ echo "รอ"; } ?>">
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">จำนวนเงินที่ชำระจริง<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text" name="pay_amount" value="<?php if(isset($rs_edit)){ echo $rs_edit->row()->pay_amount; } ?>" >
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">ผู้รับเงิน<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text" name="pay_receiver" value="<?php if(isset($rs_edit)){ echo $rs_edit->row()->pay_receiver; } ?>" >
                     </div>
                  </div>
						<div class="col-sm-6"></div>
					</fieldset>
               <fieldset>
                  <div class="form-group">
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="submit" class="btn btn-default">ยกเลิก</button>
                     </div>
                  </div>
               </fieldset>    
				</form>
			</div>  
		</div>
	</div>				
</section>
<!-- Page footer-->
<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"></div>
         <div class="panel-body">
            <form method="get" action="#" class="form-horizontal">
               <legend>รายละเอียดการชำระค่าสมัครสอบ</legend>
               <button type="submit" class="btn btn-primary start pull-right"><i class="fa fa-fw fa-upload"></i>
                  <span>นำเข้าข้อมูลการชำระเงิน</span>
               </button>
               <table id="datatable3" class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th rowspan="2"><center>ลำดับที่</center></th>
                        <th rowspan="2"><center>เลขที่ใบชำระเงิน</center></th>
                      
                        <th rowspan="2"><center>วันที่ชำระเงิน</center></th>
                        <th rowspan="2"><center>สถานะการชำระเงิน</center></th>
                        <th rowspan="2"><center>จำนวนเงินที่ต้องชำระ</center></th>
                        <th rowspan="2"><center>จำนวนเงินที่ชำระ</center></th>
                        <th rowspan="2"><center>ผู้รับเงิน</center></th>
                        <th rowspan="2"><center>วันเวลาที่บันทึกข้อมูล</center></th>
                        <th rowspan="2"><center>ผู้ที่แก้ไขข้อมูล</center></th>
                        <th rowspan="2"><center>แก้ไข</center></th>
						 <th rowspan="2"><center>ลบ</center></th>
                     </tr>
                  </thead>
                  <tbody>
				  <?php 
					if(isset($rs_payment)){
						date_default_timezone_set('Asia/Bangkok');
						if($rs_payment->num_rows()>0){
							$i=1;
							foreach($rs_payment->result() as $payment){
					?>
                     <tr class="gradeX">
						 <td><center><?php echo $i; ?></center></td>
                        <td><center><?php echo $payment->pay_bill; ?></center></td>
                        <td><center><?php echo date("d/m/Y",strtotime($payment->pay_date) ); ?></center></td>
                       
                        <td><center><?php echo $payment->bs_name; ?></center></td>
                        <td><center><?php echo "รอดึงจากทีมที่สร้างbill"; ?></td>
						 <td><center><?php echo $payment->pay_amount; ?></td>
                        <td><center><?php echo $payment->pay_receiver; ?></center></td>
                        <td><center><?php echo date("d/m/Y H:i:s",strtotime($payment->pay_createdate) );?></center></td>
                        <td><center><?php echo $payment->pay_creator; ?></center></td>
                        
                        <td><center><em class="fa fa-pencil" title="Edit" onclick="edit(<?php echo $payment->pay_id;?>)" ></em> </center></td>
						 <td> <center> <em class="fa fa-trash" title="Delete"onclick="delete_pay(<?php echo $payment->pay_id;?>)" ></em></center></td>
                     </tr>
					<?php 
							$i++;
							}
						}
					}?>
                  </tbody>
               </table>
            </form>
         </div>  
      </div>            
   </div>
</section>
<!-- Page footer-->
 

 