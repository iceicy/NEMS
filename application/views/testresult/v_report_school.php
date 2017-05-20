
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
<script>

    function genChartView(school_id, school_name){
     $('#columnchart_material').hide();
        console.log('genChartView =>', school_id, school_name)
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/report/genChartSchool"); ?>",
            data: {
                school_id: school_id
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.length == 0){
                     $('#columnchart_material').hide();
                   return swal({
                        type: 'error',
                        html: 'ไม่มีผลคะแนน'
                    })

                }
                // console.log(response)
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['ประเภทการสอบ', 'ความถนัดทางคณิตศาสตร์', 'ความถนัดทางวิทยาศาสตร์',
                            'ความถนัดทางวิศวกรรมศาสตร์', 'ความถนัดทางสถาปัตยกรรมศาสตร์'
                        ],
                        ['O-NET', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                            100) + 1), Math.floor((Math.random() * 100) + 1), 0],
                        ['GAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                            100) + 1), Math.floor((Math.random() * 100) + 1), 0],
                        ['PAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                            100) + 1), Math.floor((Math.random() * 100) + 1), Math.floor((
                            Math.random() * 100) + 1)]
                    ]);

                    var options = {
                        chart: {
                            title: `โรงเรียน${school_name}`,
                            subtitle: 'ผลสอบตามรายวิชาที่คะแนนสูงสุด - ต่ำสุด',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                    $('#columnchart_material').show();
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            } // end success
        });
    } // end functio gen cgaet view



    function exportchart(school_id , school_name ){
             $('#columnchart_material').hide();
            $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/report/genChartSchool"); ?>",
            data: {
                school_id: school_id
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.length == 0){
                     $('#columnchart_material').hide();
                     return swal({
                            type: 'error',
                            html: 'ไม่มีผลคะแนน'
                        })
                }


            chartExport = null;
            google.charts.load('current', { 'packages': ['corechart' ,'bar'] });
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['ประเภทการสอบ', 'คณิตศาสตร์', 'วิทยาศาสตร์',
                        'วิศวกรรมศาสตร์', 'สถาปัตยกรรมศาสตร์'
                    ],
                    ['O-NET', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                        100) + 1), Math.floor((Math.random() * 100) + 1), 0],
                    ['GAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                        100) + 1), Math.floor((Math.random() * 100) + 1), 0],
                    ['PAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() *
                        100) + 1), Math.floor((Math.random() * 100) + 1), Math.floor((
                        Math.random() * 100) + 1)]
                ]);

                var options = {
                    chart: {
                        title: `โรงเรียน${school_name}`,
                        subtitle: 'ผลสอบตามรายวิชาที่คะแนนสูงสุด - ต่ำสุด',
                    }
                };

                var chart_div = document.getElementById('columnchart_material');
                chartExport = new google.visualization.ColumnChart(chart_div);

                    // Wait for the chart to finish drawing before calling the getImageURI() method.
                google.visualization.events.addListener(chartExport, 'ready', function () {
                    chart_div.innerHTML = '<img style="width:500px;height:500px;"     src="' + chartExport.getImageURI() + '">';
                    // console.log(chart_div.innerHTML);
                    console.log(chartExport.getImageURI());
                });

                chartExport.draw(data, options);
                genChartToImg(chartExport ,school_id , school_name );               
            }

            
             }
            }); //end ajax
                


    }


    function genChartToImg(chart , school_id , school_name){
        console.log('genChartToImg')
        var url = "<?php echo base_url(); ?>/index.php/testresult/report/savecharttoimg";
        console.log(chart)
        $.post( url, {data: chart.getImageURI(), fileName: `${school_id}_${school_name}.png`});
        window.location.assign(`/NEMs/index.php/testresult/report/schoolviewpdf/${school_id}/${school_id}_${school_name}`);
    }


</script>

<div class="content-wrapper">
    <div class="content-heading">
        <h3>School Report View</h3>
    </div>
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Form elements</div> -->
        <div class="panel-body">
            <div id="columnchart_material" style="display:none; width:auto; height:300px;"></div>
            <hr>

            <table id="table_individual" class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสโรงเรียน</th>
                        <th>ชื่อโรงเรียน</th>
                        <th>ผลคะแนนสูงสุด (MAX)</th>
                        <th class="sort-numeric">ผลคะแนนต่ำสุด (MIN)</th>
                        <th class="sort-alpha">
                            Actions
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>




<script>
    var list_school_available = (<?php echo json_encode($list_school_available); ?>);
    var tb_row_str = '<tbody>';
    list_school_available.map((row, index) => {
        // console.log(row)
        tb_row_str +=
            `
                <tr>
                    <td>${row.school_id}</td>
                    <td>${row.school_name}</td>
                    <td>${row.score_max}</td>
                    <td>${row.score_min}</td>
                    <td>
                        <button onclick="genChartView(${row.school_id} , '${row.school_name}')" class="btn btn-sm btn-success" >View</button>
                        <button onclick="exportchart(${row.school_id} , '${row.school_name}')" class="btn btn-sm btn-warning" >Export</button>

                    </td>
                </tr>
            `
    })

    tb_row_str += '</tobdy>';
    $('#table_individual').append(tb_row_str);



</script>