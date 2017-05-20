<div class="col-sm-12">
    <!-- START panel-->
    <div class="content-wrapper">
      <div class="panel-heading">
          <h2>เพิ่มข้อมูลสถานที่สอบ</h2>
      </div>
        <div class="row">
         <div class="col-lg-12">
        <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title"></div>
                  </div>
                  <div class="panel-body">

                  <form class="form-horizontal">

                  <fieldset>
                     <legend>อัพโหลดไฟล์ข้อมูลเข้าระบบ</legend>

            <div class="form-group">
    		        <label class="col-lg-3 control-label">ไฟล์</label>
                    <div class="col-lg-4">
                        <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-sm btn-success pull-right">อัพโหลดไฟล์</button>
                    </div>      
            </div>
       
         <br>
        </fieldset>
        <fieldset>
        <legend>ป้อนข้อมูลสถานที่สอบ</legend>
            <div class="form-group">
                <label class="col-lg-2 control-label">ประเภทการสอบ</label>
                    <div class="col-lg-5">
                    <select name="" class="form-control"></select>
                    </div>
            </div>      
           <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">ปีการศึกษา</label>
                    <div class="col-lg-2">
                        <input type="text" placeholder="ปีการศึกษา" class="form-control">
                    </div>
                <label class="col-lg-1 control-label">ครั้งที่</label>
                    <div class="col-lg-2">
                        <select name="" class="form-control"></select>
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">รหัสสถานที่สอบ</label>
                    <div class="col-lg-1">
                        <label class="col-lg-1 control-label">XXXXXXXXXX</label>
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อสถานที่สอบ</label>
                    <div class="col-lg-5">
                        <input type="text" placeholder="ชื่อสถานที่สอบ" class="form-control">
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">จังหวัด</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="จังหวัด" class="form-control">
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">แขวง</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="แขวง" class="form-control">
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">เขต</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="เขต" class="form-control">
                    </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">ห้องสอบ</label>
                    <div class="col-lg-2">
                        <input type="text" placeholder="จำนวน" class="form-control">
                    </div>
                    <label class="col-lg-1 control-label">ห้อง</label>
            </div>
            <br>
            <div class="form-group">
                <label class="col-lg-2 control-label">ที่นั่งสอบ</label>
                    <div class="col-lg-2">
                        <input type="text" placeholder="จำนวน" class="form-control">
                    </div>
                    <label class="col-lg-1 control-label">ที่นั่ง</label>
            </div>
            <br>
            <div class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-sm btn-success pull-left">บันทึก</button>
                    </div>
            </div>
                            <fieldset>
                     <legend>ข้อมูลสถานที่สอบ</legend>
          <table id="datatable3" class="table table-striped table-hover">
             <thead>
               <tr>
                  <th>รหัสสถานที่สอบ</th>
                  <th>ชื่อสถานที่สอบ</th>
                  <th>จังหวัด</th>
                  <th>แขวง</th>
                  <th>เขต</th>
                  <th>Management</th>
                </tr>

             </thead>
             <tbody>
                <tr class="gradeX">
                   <td>213213</td>
                   <td>โรงเรียน XXXX</td>
                   <td>กรุงเทพมหานคร</td>
                   <td>ห้วยขวาง</td>
                   <td>ห้วยขวาง</td>
                   <td>
                       <button type="Find" class="btn btn-sm btn-default">แก้ไข</button>
                       <button type="Createbarcode" class="btn btn-sm btn-default">ลบ</button>
                   </td>
                </tr>

             </tbody>

          </table>

        </div>
      </div>
    </div>

      <!-- START panel-->
</div>
