
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
           <div class="panel panel-default">
               <div class="panel-heading"></div>
               <div class="panel-body">
                  <form method="get" action="#" class="form-horizontal">
                    <fieldset>
                        <legend>ค้นหา</legend>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">ประเภทการสอบ
                              <br>
                              <small></small>
                           </label>
						    <div class="col-sm-4">
                              <!-- SELECT2-->
                              <select id="select2-1" class="form-control">
                                 <option value="AL">GAT</option>
								 <option value="AL">PAT1</option>
								 <option value="AL">PAT2</option>
                                 <option value="AR">O-NET</option>
                               
                               
                                 
                              </select>
							</div>
							 <div class="col-sm-6"></div>
							  <label class="col-sm-2 control-label">ครั้งที่สอบ/ ปีการศึกษา
                              <br>
                              <small></small>
                           </label>
						    <div class="col-sm-4">
                              <!-- SELECT2-->
                              <select id="select2-1" class="form-control">
                                 <option value="AL">2560</option>
                                 <option value="AR">2559</option>
                                 <option value="IL">2558</option>
                               
                                 
                              </select>
							</div>
							 <div class="col-sm-6"></div>
						</div>  
					</fieldset>
				   </form>
				
				</div>
			</div>				
            <div class="container-fluid">
               <!-- START DATATABLE 1 -->
             
              
               <div class="row">
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
							รายงานตรวจสอบการจัดส่งข้อสอบ										
                           <small></small>
                        </div>
                        <div class="panel-body">
                           <table id="datatable3" class="table table-striped table-hover">
                              <thead>
								 <tr>
									<th rowspan="2"><center>ลำดับที่</center></th>
									<th rowspan="2"><center>ประเภทการสอบ</center></th>
                                    <th rowspan="2"><center>สถานที่สอบ</center></th>
                                    <th colspan="4">จำนวนข้อสอบ (ชุด)</th>
                                   
                                 </tr>
                                 <tr>
                                    <th>ส่ง</th>
                                    <th>รับ</th>
                                    <th>ส่งคืน</th>
                                    <th>รับคืน</th>
									<th>หมายเหตุ</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="gradeX">
									<th>1</th>
									<td rowspan="5">O NET</td>
                                    <td>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</td>
                                    <td>224</td>
                                    <td>76</td>
                                    <td>220</td>
									 <td>220</td>
                                    <td>ไม่พบข้อสอบ 1 ชุดของเลขที่ผู้สมัคร 598909</td>
                                 </tr>
                                 <tr class="gradeX">
									<th>2</th>
									
                                    <td>มหาวิทยาลัยขอนแก่น</td>
                                    <td>224</td>
                                    <td>76</td>
                                    <td>220</td>
									 <td>220</td>
                                    <td></td>
                                 </tr>
								  <tr class="gradeX">
									<th>3</th>
									
                                    <td>มหาวิทยาลัยธรรมศาสตร์</td>
                                    <td>224</td>
                                    <td>76</td>
                                    <td>220</td>
									 <td>220</td>
                                    <td></td>
                                 </tr>
								  <tr class="gradeX">
									<th>4</th>
									
                                    <td>มหาวิทยาลัยบูรพา</td>
                                    <td>224</td>
                                    <td>76</td>
                                    <td>220</td>
									 <td>220</td>
                                    <td></td>
                                 </tr>
								  <tr class="gradeX">
									<th>5</th>
									
                                    <td>มหาวิทยาลัยสงขลา</td>
                                    <td>224</td>
                                    <td>76</td>
                                    <td>220</td>
									 <td>220</td>
                                    <td></td>
                                 </tr>
                              </tbody>
                             <tfoot> 
							 <tr>
								<td colspan="8">หมายเหตุ </br>
									1.ส่ง : ศูนย์สอบส่งไปยังสถานที่สอบ</br>
									2.รับ :สถานที่สอบรับชุดข้อสอบจากศูนย์สอบ</br>
									3.ส่งคืน : สถานที่สอบส่งคืนศูนย์สอบ </br>
									4.รับคืน : ศูนย์สอบรับคืนสถานที่สอบ</br>
									5. ตัวสีแดงหมายถึงข้อมูลที่มีความผิดปกติ
								</td></tr>
							 </tfoot>
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
 