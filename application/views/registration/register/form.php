<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <h3>Sing Up
         <small></small>
      </h3>
      <!-- START row-->
      <div class="row">
         <div class="col-lg-12">

               <!-- START panel-->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title"></div>
                  </div>
                  <div class="panel-body">

                  <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="" action="<?php echo site_url().'/registration/register/saveaction'?>" enctype="multipart/form-data" method="post">

                  <fieldset>
                     <legend>ข้อมูลทั่วไป</legend>
<div class="col-lg-12">
<div class="col-lg-9">
                    <div class="form-group">
                       <label class="col-lg-4 control-label">เลขบัตรประจำตัวประชาชน</label>
                       <div class="col-lg-5">
                          <input value="1234567890123" type="text" name="field[card_id]" placeholder="เลขบัตรประจำตัวประชาชน" required maxlength="13" data-parsley-length="[13, 13]" class="form-control">
                       </div>
                    </div>
                    <br>
                    <div class="form-group">
                       <label class="col-lg-4 control-label">คำนำหน้า</label>
                       <div class="col-lg-3">
                         <select name="field[prefix]" class="form-control">
                            <option>นาย</option>
                            <option>นาง</option>
                            <option>นางสาว</option>
                         </select>
                       </div>
                    </div>
                    <br>
                    <div class="form-group">
                       <label class="col-lg-4 control-label">เพศ</label>
                       <div class="col-lg-8">
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="field[gender]" value="M" checked>
                             <span class="fa fa-check"></span>ชาย</label>
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="field[gender]" value="F" checked>
                             <span class="fa fa-check"></span>หญิง</label>
                       </div>
                    </div>
<br>
</div>
<div class="col-lg-3">
    <div class="block-center col-md-12">
    <img
    alt=""
    src="<?php echo base_url(); ?>assets/img/user/profil-pic_dummy.png"
    class="block-center media-box-object img-responsive img-rounded thumb128"/>
  </div>
</div>
</div>
<div class="col-lg-12">
                    <div class="form-group">
                       <label class="col-lg-3 control-label">ชื่อ</label>
                       <div class="col-lg-3">
                       <input type="text" placeholder="ชื่อ" name="field[name]" required class="form-control" value="test">
                       </div>
                       <label class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                      <input type="text" placeholder="นามสกุล" name="field[sername]" required class="form-control" value="ser-test">
                      </div>
                    </div>
<br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">วัน/เดือน/ปีเกิด</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="วัน/เดือน/ปีเกิด" name="field[bdate]" class="form-control">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                      </div>
                    </div>
                  <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">ที่อยู่</label>
                      <div class="col-lg-8">
                          <div class="panel">
                             <div class="panel-body">
                                <textarea rows="5" class="form-control note-editor" name="field[address]"></textarea>
                             </div>
                          </div>
                      </div>
                    </div>
                  <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">จังหวัด</label>
                      <div class="col-lg-3">
                        <input type="text" placeholder="จังหวัด" name="field[province]" class="form-control">
                      </div>
                      <label class="col-lg-3 control-label">รหัสไปรษณีย์</label>
                      <div class="col-lg-3">
                        <input type="text" placeholder="รหัสไปรษณีย์" name="field[zcode]" class="form-control">
                      </div>
                    </div>
                  <br>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Upload Picture</label>
                     <div class="col-lg-9">
                       <input type="file" data-classbutton="btn btn-default" name="field[pic]" data-classinput="form-control inline" class="form-control filestyle">
                     </div>
                  </div>
  </div>



</fieldset>
<fieldset>
<legend>ข้อมูลยืนยัน</legend>
<div class="col-lg-12">
    <div class="form-group">
       <label class="col-lg-3 control-label">ชื่อ</label>
       <div class="col-lg-3">
       <input type="text" placeholder="ชื่อ" class="form-control">
       </div>
       <label class="col-lg-2 control-label">นามสกุล</label>
      <div class="col-lg-3">
      <input type="text" placeholder="นามสกุล" class="form-control">
      </div>
    </div>
  <br>
    <div class="form-group">
       <label class="col-lg-3 control-label">เลขบัตรประจำตัวประชาชน</label>
       <div class="col-lg-5">
          <input type="text" placeholder="เลขบัตรประจำตัวประชาชน" class="form-control">
       </div>
      <label class="col-lg-3 control-label"></label>
    </div>
</div>

</fieldset>

<fieldset>
<div class="col-lg-12">
  <div class="form-group">
     <label class="col-lg-3 control-label">*E-mail</label>
     <div class="col-lg-5">
        <input type="email" required placeholder="E-mail" name="field[email]" class="form-control" value="mail@mail.com">
     </div>
  </div>
  <br>
  <div class="form-group">
     <label class="col-lg-3 control-label">*Password</label>
     <div class="col-lg-5">
        <input type="password" required data-parsley-length="[4, 8]" maxlength="8" placeholder="Password" id="pwd" name="field[pwd]" class="form-control">
     </div>
  </div>
  <br>
  <div class="form-group">
     <label class="col-lg-3 control-label">*Re-type Password</label>
     <div class="col-lg-5">
        <input type="password" required data-parsley-length="[4, 8]" maxlength="8" placeholder="Password" data-parsley-equalto="#pwd" class="form-control">
     </div>
  </div>
<br>
</div>

                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                           <div class="checkbox c-checkbox">
                              <label>
                                 <input name="ck" type="checkbox" required data-parsley-mincheck="1">
                                 <span class="fa fa-check"></span>ข้าพเจ้ายอมรับเงื่อนไขการสมัคร</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>

                  </form>
                  </div>
               </div>
               <!-- END panel-->

         </div>
      </div>
      <!-- END row-->
   </div>
</section>
<!-- PARSLEY-->
<script src="<?php echo base_url(); ?>assets/vendor/parsleyjs/dist/parsley.min.js"></script>
