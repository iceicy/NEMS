<!-- Main section-->
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <div class="panel panel-default">
         <div class="panel-heading"></div>
         <div class="panel-body">
            <form method="get" action="#" class="form-horizontal">
               <fieldset>
                  <legend>จัดการรายละเอียดการชำระเงิน</legend>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">เลขที่ใบชำระเงิน<br></label>
						   <div class="col-sm-4">
                        <input class="form-control m-b" type="text">
							</div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">เลขที่อ้างอิงการชำระเงิน<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text">
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">วันที่ชำระเงิน<br></label>
                     <div class="col-sm-3">
                        <div class="calendardate input-group date">
                           <input type="text" class="form-control">
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
                        <select id="status" class="form-control">
                           <option value="1" selected >ชำระเงินเรียบร้อยแล้ว</option>
                           <option value="2">ยังไม่ชำระเงิน</option>
                        </select>
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">จำนวนเงินที่ต้องชำระ<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text">
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">จำนวนเงินที่ชำระจริง<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text">
                     </div>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">ผู้รับเงิน<br></label>
                     <div class="col-sm-4">
                        <input class="form-control m-b" type="text">
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

 