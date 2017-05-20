<!-- SWEET ALERT-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert/dist/sweetalert.css">

<script type="text/javascript">
  function optiondistrict(){
    var mval = $('#province').val();
    $('#district').empty();
    $('#district').append($('<option>').text(" -- อำเภอ -- "));
    if(mval){
      $.ajax({
        type: "POST",
        url: "<?php echo site_url().'/registration/singup/renderOptDistrict'; ?>",
        data: {	'province' : mval},
        dataType : "json",
        success : function(data){
          //console.log(data.opt_district);
            if(data.opt_data){
              $.each(data.opt_data, function(i, obj){
                  $('#district').append($('<option>').text(obj).attr('value', obj));
              });
            }
        }
      });
    }
  }
  function optionsubdistrict(){
    var mval = $('#province').val();
    var district = $('#district').val();
    $('#sub_district').empty();
    $('#sub_district').append($('<option>').text(" -- ตำบล -- "));
    $('#zipcode').val('');
    //if(mval && district){
      $.ajax({
        type: "POST",
        url: "<?php echo site_url().'/registration/singup/renderOptsubDistrict'; ?>",
        data: {	'province' : mval,'district' : district},
        dataType : "json",
        success : function(data){
          //console.log(data.opt);
            if(data.opt_data){
              $.each(data.opt_data, function(i, obj){
                  $('#sub_district').append($('<option>').text(obj).attr('value', obj));
              });
            }
            if(data.zipcode){
              $('#zipcode').val(data.zipcode);
            }
        }
      });

  }
  function checkValidmail(){
      //console.log('====');
      var mval = $('#email').val();
      var mmode = $('#mode').val();
      var mid = $('#student_ID').val();
      //console.log(mval);
      if(mval){
        $.ajax({
    			type: "POST",
    			url: "<?php echo site_url().'/registration/singup/callback_check_mail'; ?>",
    			data: {	'email' : mval,'mode':mmode,'student_ID':mid },
    			dataType : "json",
    			success : function(data){
            //console.log(data["ck_dup"]);
    				if(data["ck_dup"] === true){
    					swal("E-mail is already in use !!");
              $('#err_mail').show();
    				}else{
              $('#err_mail').hide();
            }
    			}
    		});
      }
    }
    function checkValidID(){
        var mval = $('#student_ID').val();
        var mmode = $('#mode').val();
        //console.log(mval);
        if(mval){
        var ck = checkNationalID(mval);
        if(ck == true){
          if(mval){
            $.ajax({
        			type: "POST",
        			url: "<?php echo site_url().'/registration/singup/callback_check_id'; ?>",
        			data: {	'id' : mval,'mode':mmode},
        			dataType : "json",
        			success : function(data){
                console.log(data["ck_dup"]);
        				if(data["ck_dup"] === true){
        					swal("ID is already in use !!");
                  $('#err_id').html('ID is already in use !!');
                  $('#err_id').show();
        				}else{
                  $('#err_id').empty();
                  $('#err_id').hide();
                }
        			}
        		});
          }
        }else{
          swal("Please Check ID Format !!");
          $('#err_id').html('Please Check ID Format !!');
          $('#err_id').show();
        }
        }
    }
    function checkNationalID(id) {
      if(id.length != 13) return false;

      for(i=0, sum=0; i < 12; i++) sum += parseFloat(id.charAt(i))*(13-i);

      if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;

      return true;
     }
</script>

<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <h3><?php echo $head_name; ?>
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

                  <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="" action="<?php echo site_url().'/registration/'.$n_controler.'/saveaction'?>" enctype="multipart/form-data" method="post">

                  <fieldset>
                     <legend>ข้อมูลทั่วไป</legend>
<div class="col-lg-12">
<div class="col-lg-9">
                    <div class="form-group">
                       <label class="col-lg-4 control-label">เลขบัตรประจำตัวประชาชน</label>
                       <div class="col-lg-5">
                          <input value="<?php echo (isset($mdata['student_ID'])) ? $mdata['student_ID'] : '' ?>" type="text" name="student[student_ID]" id="student_ID" placeholder="เลขบัตรประจำตัวประชาชน" required maxlength="13" data-parsley-length="[13, 13]" class="form-control" onblur="checkValidID()">
                          <small class="text-danger" id="err_id" style="display:none;"></small>
                       </div>
                    </div>
                    <br>
                    <div class="form-group">
                       <label class="col-lg-4 control-label">คำนำหน้า</label>
                       <div class="col-lg-3">
                        <?php $opttitle = array('นาย', 'นาง', 'นางสาว', 'เด็กชาย', 'เด็กหญิง'); ?>
                         <select name="student[title]" class="form-control">
                            <?php
                              if ($opttitle) {
                                  $ckselect = (isset($mdata['title'])) ? $mdata['title'] : '';
                                  foreach ($opttitle as $ival) {
                                      $sel = '';
                                      $sel = ($ckselect === $ival) ? 'selected' : '';
                                      echo '<option '.$sel.'>'.$ival.'</option>';
                                  }
                              }
                            ?>
                         </select>
                       </div>
                    </div>
                    <br>
                    <div class="form-group">
                       <label class="col-lg-4 control-label">เพศ</label>
                       <div class="col-lg-8">
                          <?php
                            $gender = (isset($mdata['gender'])) ? $mdata['gender'] : '';
                          ?>
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="student[gender]" value="M" <?php if ($gender == 'M' || !$gender) {
                              ?>checked <?php

                          }?>>
                             <span class="fa fa-check"></span>ชาย</label>
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="student[gender]" value="F" <?php if ($gender == 'F') {
                              ?>checked <?php

                          }?>>
                             <span class="fa fa-check"></span>หญิง</label>
                       </div>
                    </div>
<br>
</div>
<div class="col-lg-3">
    <div class="block-center col-md-12">
      <?php //echo base_url();
          $pathpic = '';
          $pic = (isset($mdata['student_pic']) && $mdata['student_pic'] != '') ? $mdata['student_pic'] : 'assets/img/user/profil-pic_dummy.png';
          $pathpic = base_url().$pic;
        ?>
    <img
    alt=""
    src="<?php echo $pathpic; ?>"
    class="block-center media-box-object img-responsive img-rounded thumb128"/>
  </div>
</div>
</div>
<div class="col-lg-12">
                    <div class="form-group">
                       <label class="col-lg-3 control-label">ชื่อ</label>
                       <div class="col-lg-3">
                       <input type="text" placeholder="ชื่อ" name="student[first_name]" required class="form-control" value="<?php echo (isset($mdata['first_name'])) ? $mdata['first_name'] : ''; ?>">
                       </div>
                       <label class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                      <input type="text" placeholder="นามสกุล" name="student[last_name]" required class="form-control" value="<?php echo (isset($mdata['last_name'])) ? $mdata['last_name'] : ''; ?>">
                      </div>
                    </div>
<br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">วัน/เดือน/ปีเกิด</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="วัน/เดือน/ปีเกิด" name="student[DOB]" class="form-control" value="<?php echo (isset($mdata['DOB'])) ? $mdata['DOB'] : ''; ?>">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                      </div>
                    </div>
                  <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">ที่อยู่</label>
                      <!--div class="col-lg-8">
                          <div class="panel">
                             <div class="panel-body">
                                <textarea rows="5" class="form-control note-editor" name="field[address]"></textarea>
                             </div>
                          </div>
                      </div-->
                      <div class="col-lg-3">
                        <input type="text" placeholder="บ้านเลขที่" name="field[house_no]" class="form-control" value="<?php echo (isset($mdata['house_no'])) ? $mdata['house_no'] : ''; ?>">
                      </div>
                      <label class="col-lg-3 control-label">หมู่</label>
                      <div class="col-lg-3">
                        <input type="text" placeholder="หมู่" name="field[village_no]" class="form-control" value="<?php echo (isset($mdata['village_no'])) ? $mdata['village_no'] : ''; ?>">
                      </div>
                    </div>
                  <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">ซอย</label>
                      <div class="col-lg-3">
                        <input type="text" placeholder="ซอย" name="field[alley]" class="form-control" value="<?php echo (isset($mdata['alley'])) ? $mdata['alley'] : ''; ?>">
                      </div>
                      <label class="col-lg-3 control-label">ถนน</label>
                      <div class="col-lg-3">
                        <input type="text" placeholder="ถนน" name="field[road]" class="form-control" value="<?php echo (isset($mdata['road'])) ? $mdata['road'] : ''; ?>">
                      </div>
                    </div>
                  <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">จังหวัด</label>
                      <div class="col-lg-3">
                        <select required id="province" name="field[province]" class="form-control" onchange="optiondistrict();optionsubdistrict();">
                        <option> -- จังหวัด -- </option>
                        <?php
                          if ($optProvince) {
                              $ckselect = (isset($mdata['province'])) ? $mdata['province'] : '';
                              foreach ($optProvince as $ival) {
                                  $sel = '';
                                  $sel = ($ckselect === $ival) ? 'selected' : '';
                                  echo '<option '.$sel.'>'.$ival.'</option>';
                              }
                          }
                        ?>
                        </select>
                        <!--input type="text" placeholder="จังหวัด" name="" class="form-control"><!--field[province]-->
                      </div>
                      <label class="col-lg-3 control-label">อำเภอ</label>
                      <div class="col-lg-3">
                        <select required id="district" name="field[district]" class="form-control" onchange="optionsubdistrict();">
                        <option> -- อำเภอ -- </option>
                        <?php
                          if ($optDistrict) {
                              $ckselect = (isset($mdata['district'])) ? $mdata['district'] : '';
                              foreach ($optDistrict as $ival) {
                                  $sel = '';
                                  $sel = ($ckselect === $ival) ? 'selected' : '';
                                  echo '<option '.$sel.'>'.$ival.'</option>';
                              }
                          }
                        ?>
                        </select>
                        <!--input type="text" placeholder="อำเภอ" name="" class="form-control"><!--name="field[district]"-->
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">ตำบล</label>
                      <div class="col-lg-3">
                        <select required id="sub_district" name="field[sub_district]" class="form-control">
                        <option> -- ตำบล -- </option>
                        <?php
                          if ($optSubdis) {
                              $ckselect = (isset($mdata['sub_district'])) ? $mdata['sub_district'] : '';
                              foreach ($optSubdis as $ival) {
                                  $sel = '';
                                  $sel = ($ckselect === $ival) ? 'selected' : '';
                                  echo '<option '.$sel.'>'.$ival.'</option>';
                              }
                          }
                        ?>
                        </select>
                        <!--input type="text" placeholder="ตำบล" name="" class="form-control"><!--name="field[sub_district]"-->
                      </div>
                      <label class="col-lg-3 control-label">รหัสไปรษณีย์</label>
                      <div class="col-lg-3">
                        <input type="text" required data-parsley-length="[5, 5]" placeholder="รหัสไปรษณีย์" id="zipcode" name="field[zipcode]" value="<?php echo (isset($mdata['zipcode'])) ? $mdata['zipcode'] : ''; ?>" class="form-control"><!--field[zcode]-->
                      </div>
                    </div>
                  <br>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Upload Picture</label>
                     <div class="col-lg-9">
                       <input type="file" data-classbutton="btn btn-default" name="student[student_pic]" data-classinput="form-control inline" class="form-control filestyle">
                     </div>
                  </div>
                  </div>
                </fieldset>
                <fieldset>
                <legend>ข้อมูลการติดต่อ</legend>
                <div class="col-lg-12">
                  <div class="form-group">
                     <label class="col-lg-3 control-label">เบอร์โทรศัพท์</label>
                     <div class="col-lg-5">
                        <input type="text" placeholder="เบอร์โทรศัพท์" name="contact[main_phone]" class="form-control" value="<?php echo (isset($mdata['main_phone'])) ? $mdata['main_phone'] : ''; ?>">
                     </div>
                    <label class="col-lg-3 control-label"></label>
                  </div>
                  <br>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Skype ID</label>
                     <div class="col-lg-3">
                     <input type="text" placeholder="Skype ID" name="contact[skyp_ID]" class="form-control" value="<?php echo (isset($mdata['skyp_ID'])) ? $mdata['skyp_ID'] : ''; ?>">
                     </div>
                     <label class="col-lg-2 control-label">Line ID</label>
                    <div class="col-lg-3">
                    <input type="text" placeholder="Line ID" name="contact[line_ID]"  class="form-control" value="<?php echo (isset($mdata['line_ID'])) ? $mdata['line_ID'] : ''; ?>">
                    </div>
                  </div>
                <br>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">WhatApp ID</label>
                     <div class="col-lg-3">
                     <input type="text" placeholder="What App" name="contact[whatApp_ID]" class="form-control" value="<?php echo (isset($mdata['whatApp_ID'])) ? $mdata['whatApp_ID'] : ''; ?>">
                     </div>
                     <label class="col-lg-2 control-label">WeChat ID</label>
                    <div class="col-lg-3">
                    <input type="text" placeholder="WeChat ID" name="contact[weChat_ID]"  class="form-control" value="<?php echo (isset($mdata['weChat_ID'])) ? $mdata['weChat_ID'] : ''; ?>">
                    </div>
                  </div>
                </div>

                </fieldset>
<!--fieldset>
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

</fieldset-->

<fieldset>
<legend>ข้อมูลยืนยัน</legend>
<div class="col-lg-12">
  <div class="form-group">
     <label class="col-lg-3 control-label">*E-mail</label>
     <div class="col-lg-5">
        <input type="email" required placeholder="E-mail" id="email" name="contact[e-mail]" class="form-control" value="<?php echo (isset($mdata['e-mail'])) ? $mdata['e-mail'] : ''; ?>" onblur="checkValidmail()"><!--onblur="checkValidmail()"-->
        <small class="text-danger" id="err_mail" style="display:none;">E-mail is already in use !!</small>
     </div>
  </div>
  <br>
  <div class="form-group">
     <label class="col-lg-3 control-label">*Password</label>
     <div class="col-lg-5">
        <input type="password" required data-parsley-length="[4, 8]" maxlength="8" placeholder="Password" id="pwd" name="user[password]" class="form-control" value="">
     </div>
  </div>
  <br>
  <div class="form-group">
     <label class="col-lg-3 control-label">*Re-type Password</label>
     <div class="col-lg-5">
        <input type="password" required data-parsley-length="[4, 8]" maxlength="8" placeholder="Password" data-parsley-equalto="#pwd" class="form-control" value="">
     </div>
  </div>
<br>
<?php
  $mGroupID = (isset($mdata['GroupID'])) ? $mdata['GroupID'] : 'STD';
?>
  <input type="hidden" name="user[GroupID]" class="form-control" value="<?php echo $mGroupID; ?>">
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
                    <input type="hidden" name="mode" id="mode" class="form-control" value="<?php echo $mode; ?>">
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
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/parsleyjs/dist/parsley.min.js"></script>
