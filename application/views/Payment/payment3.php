<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"></div>
         <div class="panel-body">
            <form method="get" action="#" class="form-horizontal">
               <fieldset>
                  <legend>นำเข้าข้อมูลการชำระเงิน</legend>
                  <div class="form-group">
                     <div class="col-sm-12">
                        <h5><b>1.  ดูตัวอย่างการกรอกแฟ้มข้อมูลการชำระเงิน และดาวน์โหลดแฟ้มข้อมูล เพื่อกรอกข้อมูล ดาวน์โหลดแฟ้มตัวอย่าง <a href="<?php echo base_url("/uploads/payment_audit/PA_csv_template.csv") ?>">คลิกที่นี่</a></b><br></h5>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-12">
                        <center>
                           <img src="<?php echo base_url("/uploads/payment_audit/PA_csv_template.png") ?>"></img>
                        </center>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-1"></div>
                     <div class="col-sm-10">
                        <h5>หมายเหตุ : ระบบจะอ่านคอลัมน์ A-F เท่านั้น และข้อมูลในคอลัมน์ต้องเรียงตามลำดับต่อไปนี้<br>
                        1. เลขที่ใบชำระเงิน ประกอบด้วย 17 หลัก<br>
                        2. เลขที่อ้างอิงใบชำระเงิน<br>
                        3. วันเวลาที่ชำระเงิน ในรูปแบบ dd/mm/yyyy ตัวอย่างเช่น 19/10/2016<br>
                        4. สถานะการชำระเงิน (ชำระเงินแล้วหรือไม่ชำระเงิน) กรณีที่ไม่ใช่ระบบจะไม่ทำการบันทึกข้อมูล<br>
                        5. จำนวนเงินที่ชำระ รูปแบบ 0.00<br>
                        6. ชื่อผู้รับชำระ
                        </h5>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <div class="col-sm-12">
                        <h5><b>2.  เลือกแฟ้มข้อมูลที่จะนำเข้า (แฟ้มข้อมูลต้องเป็นชนิด Excel มีนามสกุลเป็น .xls, .xlsx เท่านั้น)</b></h5>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <div class="col-sm-1"></div>
                     <div class="col-sm-3">
                        <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
                     </div>
                  </div>
                  <br>
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

 