

<?php 
/*
* report1
* Display search report1
* @author:  Jiranun
* @Create Date: 2560-04-11
*/

?>
<script type="text/javascript">

/* table_report 
 * Report1
 * @input: bgy_value
 * @output: table
 * @author: Jiranun
 * @Create Date: 2560-04-11
 */

function table_report(bgy_value){
	console.log("selected bgy : " + bgy_value);
	$.ajax({
		type: "POST",
		url: "<?php echo site_url()."/audit/Audit/table_report1";?>",
		data: {im_edu_bgy:bgy_value},
		success : function(data){
			$("#table_report").html(data);
			
			
			
		}//end success
	});//end ajax
}//end fn change_year

</script>


      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
           
			<div class="panel panel-default">
               <div class="panel-heading"></div>
               <div class="panel-body">
                  <form id="frm_report1" action="#"  enctype="multipart/form-data" class="form-horizontal" method="post" >
                   <fieldset>
					   <div class="form-group"> 
						  <label class="col-sm-2 control-label">ปีการศึกษา</label>
						  <div class="col-sm-4"  id="div_im_edu_bgy" >
							 <select class="form-control" id="im_edu_bgy" name="im_edu_bgy" onchange="table_report(this.value);"  >
								 <option value="">--- เลือก ---</option>
								 <?php 
								
								 if($rs_year_exam->num_rows() > 0){
									 foreach($rs_year_exam->result() as $year){
								?>
									<option value="<?php echo $year->Year;?>" ><?php echo $year->Year+543;?></option>
								<?php										 
									 }
									 
								 }
								 ?>
							 </select>
						  </div>
					   </div>
				</fieldset>  
				
				</form>
				</div>
			</div>				
            <div class="container-fluid">
               <!-- START DATATABLE 1 -->
             
              
               <!-- START DATATABLE 3-->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
							รายงานสถานะผู้สมัครสอบ				
                           <small></small>
                        </div>
                        <div class="panel-body">
                           <table id="tb_report" class="table table-striped table-hover">
                             
							  <thead>
								 <tr>
									<th rowspan="2"><center>ลำดับที่</center></th>
                                    <th rowspan="2"><center>ประเภทการสอบ</center></th>
                                    <th colspan="5"><center>จำนวน (คน)</center></th>
                                   
                                 </tr>
                                 <tr>									
                                    <th>สมัครสอบ</th>
                                    <th>ชำระเงิน</th>
                                    <th>ไม่ชำระเงิน</th>
                                    <th>เข้าสอบ</th>
									<th>ขาดสอบ</th>
                                 </tr>
                              </thead>
                              <tbody id="table_report"></tbody>
                     
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 3-->
               
			   
			
            </div>
         </div>
      </section>
      <!-- Page footer-->
 