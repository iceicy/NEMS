<div class="col-sm-12">
    <!-- START panel-->
    <div class="content-wrapper">
      <div class="panel-heading">
          <h2>เพิ่มข้อมูลรายวิชาสอบ</h2>
      </div>
      <div class="panel panel-default">
          <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title"></div>
                  </div>
                  <div class="panel-body">

                  <form class="form-horizontal">       
      <br>
        </fieldset>
        <fieldset>
        <legend>ป้อนข้อมูลรายวิชาที่เปิดสอบ</legend>       
        <br>
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
            <label class="col-lg-2 control-label">รหัสวิชาสอบ</label>
            <div class="col-lg-3">
                <input type="text" placeholder="รหัสวิชาสอบ" class="form-control">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-2 control-label">ชื่อวิชาสอบ</label>
            <div class="col-lg-5">
                <input type="text" placeholder="ชื่อวิชาสอบ" class="form-control">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-2 control-label">วันที่สอบ</label>
            <div class="col-lg-4">
            <div id="" class="calendardate input-group date">
                    <input type="text" placeholder="วันที่สอบ" name="DateExam" class="form-control">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
            </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-2 control-label">เวลาที่สอบ</label>
            <div class="col-lg-3">
              <input type="text" placeholder="เวลาที่สอบ" class="form-control">
            </div>
            <label class="col-lg-2 control-label">Example: 08:00-10:00</label>

        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-2 control-label">ระยะเวลาที่ใช้สอบ</label>
            <div class="col-lg-2">
                <input type="text" placeholder="เวลา" class="form-control">
            </div> 
            <label class="col-lg-1 control-label">นาที</label>
        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-2 control-label"></label>
            <div class="col-lg-2">
                 <button type="submit" class="btn btn-sm btn-success pull-left">บันทึก</button>
            </div>
        </div>
                    <form class="form-horizontal">
                      <fieldset>
                     <legend>ข้อมูลวิชาสอบ</legend>
        <table id="datatable3" class="table table-striped table-hover">
           <thead>
             <tr>
                <th>ID</th>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th>วันที่สอบ</th>
                <th>เวลาที่สอบ</th>
                <th>ระยะเวลา(นาที)</th>
                <th>Management</th>
              </tr>

           </thead>
           <tbody>
              <tr class="gradeX">
                <td>1</td>
                <td>xxxxxx</td>
                 <td>คณิตศาสตร์</td>
                 <td>12/05/2017</td>
                 <td>08:30 - 10:00</td>
                 <td>120</td>
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
