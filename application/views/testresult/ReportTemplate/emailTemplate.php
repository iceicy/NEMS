<style>
    body {
        font-family: "garuda", Georgia, Serif;
    }
    th , td {
        padding:10px;
        text-align:"center";
    }
</style>


<h3>Nation Exam Management System (NEMs)</h3>
<h3>แจ้งผลคะแนนสอบ</h3>
<hr>
<p><strong>รายงานประจำวันที่</strong> : <?php echo date("Y/m/d"); ?></p>
<p><strong>รหัสประจำตัวผู้สอบ</strong> : <span><?php echo $result['student_id']; ?></p>
<p><strong>ชื่อ-นามสกุล</strong> : <span><?php echo $result['first_name']; ?>  <?php echo $result['last_name']; ?></p>
<hr>
<p><strong>ประเภทการสอบ</strong> : <?php echo $result['type_name']; ?></p>
<p><strong>ครั้งที่สอบ</strong>      : <?php echo $result['score_test_round']; ?></p>
<p><strong>วิชาที่สอบ</strong>      : <?php echo $result['subject_name']; ?></p>
<p><strong>ผลคะแนน</strong>      : <?php echo $result['score_point']; ?></p>
<p><strong>ข้อมูลเพิ่มเติม</strong> : <?php  
    if(empty($result['score_remark'])){
        echo "ไม่มี";
    }else{
        echo $result['score_remark'];
    }
 ?></p>


