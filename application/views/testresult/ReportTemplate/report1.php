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
    <p>ระบบจัดทำรายงานผลการทดสอบรายบุคคล</p>
</div>
<br>
<br>



<div style="border:1px solid black; padding:20px; width:300px; margin-bottom:20px;">
    <p><strong>รายงานประจำวันที่</strong> : <?php echo date("Y/m/d"); ?></p>
    <p><strong>รหัสประจำตัวผู้สอบ</strong> : <span><?php echo $result['student_id']; ?></p>
    <p><strong>ชื่อ-นามสกุล</strong> : <span><?php echo $result['first_name']; ?>  <?php echo $result['last_name']; ?></p>
</div>

<br>

<table class="table table-striped table-bordered table-hover text-center" style="padding:20px;">
        <thead>
            <tr>
            <th>#</th>
            <th>ประเภทการสอบ</th>
            <th>ครั้งที่สอบ</th>
            <th>วิชาที่สอบ</th>
            <th>ผลคะแนน</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td><?php echo $result['type_name']; ?></td>
            <td><?php echo $result['score_test_round']; ?></td>
            <td><?php echo $result['subject_name']; ?></td>
            <td><?php echo $result['score_point']; ?></td>
        </tr>
        </tbody>             
</table>


<p>ข้อมูลเพิ่มเติม : <?php echo $result['score_remark']; ?></p>



