<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>


<script type="text/javascript">
    google.load("visualization", "1", {packages: ["geochart"]});
    google.setOnLoadCallback(drawRegionsMap);

    var chart = null;

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['จังหวัด', 'คะแแนนสูงสุด'],
            <?php echo $dataRender; ?>
        ]);

        var options = {
            region: 'TH',
            // displayMode: 'markers',
            resolution: 'provinces',
            colorAxis: {colors: ['yellow', 'green']}
        };

        chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);
    }

    function genChartToImg(){
        var url = "<?php echo base_url(); ?>/index.php/testresult/report/savecharttoimg";
        $.post( url, {data: chart.getImageURI(), fileName: "RegionsMap.png"});

        window.location.assign("/NEMs/index.php/testresult/report/provincesviewpdf");
    }


</script>

<div class="content-wrapper">
    <div class="content-heading">
        <h3>Provinces Report Viewer</h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="panel panel">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> ข้อมูลคะแนนสูงสุดรายจังหวัด</h3>               
            </div>
            <div class="panel-body">
                <div id="regions_div" style="width: 100%; height: 450px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <h4>ข้อมูลรายจังหวัด</h4>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary" onclick="genChartToImg()">Export PDF</button>
                <small> </small>        
            </div>
        </div>

        <hr>

            <table id="table_individual" class="testresult_datatable table table-striped table-hover">
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



