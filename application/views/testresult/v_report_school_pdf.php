<style>
    body {
        font-family: "garuda", Georgia, Serif;
    }
    th , td {
        padding:10px;
        text-align:"center";
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<div style="border-bottom: 1px solid black;">
    <h3>Nation Exam Management System (NEMs)</h3>
    <p>ระบบจัดทำรายงานผลการทดสอบตามโรงเรียน</p>
</div>
<br>
<br>


<div style="border:1px solid black; padding:20px; width:300px; margin-bottom:20px;">
    <p><strong>รายงานประจำวันที่</strong> : <?php echo date("Y/m/d"); ?></p>
    <p><strong>รหัสโรงเรียน</strong> : <span><?php echo $school->school_id; ?></p>
    <p><strong>ชื่อโรงเรียน</strong> : <span>โรงเรียน<?php echo $school->school_name; ?></p>
    <p><strong>สังกัด</strong> : <span><?php echo $school->school_type; ?></p>
</div>

<br>

 <div style="text-align:center">  
   <img  width="auto" height:="auto" src="<?php echo APPPATH; ?>/controllers/testresult/img/<?php echo $fileName ?>.png"  />
 </div>
 
 
  <table border="1" id="table_individual" class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสนักเรียน</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ประเภทการสอบ</th>
                        <th>วิชา</th>
                        <th>ผลคะแนน</th>
                    </tr>
                </thead>
                   <tbody>
                    <?php  
                      foreach ($all_student as $values) {                         
                         echo "
                            <tr class='gradeX'>
                              <td>".$values['student_ID']."</td>
                              <td>".$values['first_name']."</td>
                              <td>".$values['last_name']."</td>
                              <td>".$values['type_name']."</td>
                              <td>".$values['subject_name']."</td>
                              <td>".$values['score_point']."</td>
                        </tr>";
                      }
                    ?>
                </tbody>
    </table>


<p>ข้อมูลเพิ่มเติม : <?php echo $result['score_remark']; ?></p>


