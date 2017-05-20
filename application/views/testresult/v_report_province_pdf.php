<style>
    body {
        font-family: "garuda", Georgia, Serif;
    }
    th , td {
        padding:10px;
        text-align:"center";
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>


<div class="content-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="panel panel">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> ข้อมูลคะแนนสูงสุดรายจังหวัด</h3>
            </div>
            <div class="panel-body">


              <img src="<?php echo APPPATH; ?>/controllers/testresult/img/RegionsMap.png" alt="">



            </div>
        </div>

            <h4>ข้อมูลรายจังหวัด</h4>
            <small> </small>
            <hr>

            <table border="1" id="table_individual" class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>จังหวัด</th>
                        <th>จำนวนโรงเรียนที่มีผู้สมัครสอบ</th>
                        <th>คะแแนนสูงสุด</th>
                        <th>คะแนนตำ่สุด</th>
                    </tr>
                </thead>
                   <tbody>
                    <?php  
                      foreach ($getProvincesAll as $values) {                         
                         echo "
                            <tr class='gradeX'>
                              <td>".$values['province_id']."</td>
                              <td>".$values['province_name_th']."</td>
                              <td>".$values['count_school_stud_regis']."</td>
                              <td>".$values['max_score_point']."</td>
                              <td>".$values['min_score_point']."</td>
                        </tr>";
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


