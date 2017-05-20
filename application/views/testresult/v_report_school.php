<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js" ></script>


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
		list_school_available.map( (row, index) =>{
            // console.log(row)
            tb_row_str += `
                <tr>
                    <td>${row.school_id}</td>
                    <td>${row.school_name}</td>
                    <td>${row.score_max}</td>
                    <td>${row.score_min}</td>
                    <td>
                        <button onclick="genChartView(${row.school_id} , '${row.school_name}')" class="btn btn-sm btn-success" >View</button>
                    </td>
                </tr>
            `
		})
		
	tb_row_str += '</tobdy>';
	$('#table_individual').append(tb_row_str);
	
    var genChartView = (school_id , school_name) => {
        console.log('genChartView =>' , school_id , school_name)
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/report/genChartSchool"); ?>",
            data: { school_id : school_id },
            success: function (response) {
                console.log('response ::' ,  JSON.parse(response));
                

                genJson = _.reduce(  JSON.parse(response) , function(result, value, key) {
           
                        if(key==0){
                            result['header'] = ['ประเภทการสอบ'];
                            result[value.type_name] = [value.type_name];
                        }

                        if(!result['header'].includes(value.subject_name)){
                             result['header'].push(value.subject_name)
                        }
                        

                        // result[value.type_name].push(value.score_point)
                     return result;
           
           
                }, {});
                console.log('genJson ==>' , genJson)

            //    var rowPoint =  _.reduce(  JSON.parse(response) , function(result, value, key) {
            //             if(!result[value.type_name]){
            //                 result[value.type_name] = [value.type_name];
            //             }
            //             result[value.type_name].push(value.score_point)
            //             return result;
            //     }, {});

            //     var title =  _.reduce(  JSON.parse(response) , function(result, value, key) {
            //             if(!result['subject_name']){
            //                 result['subject_name'] = ['ประเภทการสอบ'];
            //             }
            //             if(result['subject_name'].includes(value.subject_name)){                          
            //                 // console.log('not epeat ::' , value.subject_name );
            //             }else{
            //                 result['subject_name'].push(value.subject_name)
            //                 // console.log('repeat ::' , value.type_name );
            //             }
            //             return result;
            //     }, {});
            //     console.log('title ===>' , title['subject_name']);
            //     countTitle = title['subject_name'].length;
                


                // console.log('row ===>' ,   rowPoint['PAT'])
                // console.log('row ===>' ,   rowPoint['O-NET'])
                // console.log('rowPoint =>' , rowPoint)

            // google.charts.load('current', {'packages':['bar']});
            // google.charts.setOnLoadCallback(drawChart);
            // function drawChart() {
            //     var data = google.visualization.arrayToDataTable([
            //     title['subject_name'],
            //     ]);

            //     var options = {
            //     chart: {
            //         title: `โรงเรียน${school_name}`,
            //         subtitle: 'ผลสอบตามรายวิชาที่คะแนนสูงสุด - ต่ำสุด',
            //     }
            //     };

            //     var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            //     $('#columnchart_material').show();
            //     chart.draw(data, google.charts.Bar.convertOptions(options));
            // }



            }
        });


        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['ประเภทการสอบ', 'ความถนัดทางคณิตศาสตร์', 'ความถนัดทางวิทยาศาสตร์', 'ความถนัดทางวิศวกรรมศาสตร์' , 'ความถนัดทางสถาปัตยกรรมศาสตร์'],
            ['O-NET', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1), 0],
            ['GAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1) , 0],
            ['PAT', Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1), Math.floor((Math.random() * 100) + 1) , Math.floor((Math.random() * 100) + 1)]
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

    }

  
      
    // var edit_point = (student_id ,type_id , subject_id  ,score_test_round) => {
    //     console.log(student_id ,type_id , subject_id  ,score_test_round)
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo site_url("/testresult/report/searchById"); ?>",
    //         data : {  'student_id' :  student_id ,'type_id' : type_id , 'subject_id' : subject_id ,'score_test_round' : score_test_round },
    //         success: function (res) {
    //             res = JSON.parse(res);
    //             console.log('response =>' , res);

    //             swal({
    //             showCloseButton: true,
    //             showCancelButton: true,
    //             title: 'แก้ไขคะแนนของผู้สอบ',
    //             html:
    //             `
    //             <div class="text-left" style="font-size:14px; font-weight:bold;">
    //                 <p>ชื่อ : ${res.first_name} นามสกุล : ${res.last_name}</p>
    //                 <p>ประเภทการสอบ : ${res.type_name} วิชาที่สอบ : ${res.subject_name}</p>
    //                 <p>ครั้งที่สอบ : ${res.score_test_round}</p>
    //             </div>
    //             <p style="font-size:15px; color:red" class="pull-left">แก้ไขคะแนน</p>
    //             <input id="swal-input1" class="swal2-input" value=${res.score_point}>
    //             <p style="font-size:15px; color:red" class="pull-left">หมายเหตุ</p>                
    //             <input id="swal-input2" class="swal2-input" value=${res.score_remark}>`,
    //             preConfirm: function () {
    //                 return new Promise(function (resolve) {
    //                     if($('#swal-input1').val() != '' && $('#swal-input2').val() != ''){
    //                         resolve([
    //                             parseInt($('#swal-input1').val()),
    //                             $('#swal-input2').val()
    //                      ])
    //                     }else{
    //                         reject('กรุณาใส่ค่าที่ถูกต้อง')
    //                     }

    //                 })
    //             },
    //             onOpen: function () {
    //                 $('#swal-input1').focus()
    //             }
    //             }).then(function (result) {
    //                 var state = (isNaN(result[0]));
    //                 if(state == true){
    //                     swal({
    //                         type: 'error',
    //                         html: 'แก้ไขข้อมูลไม่สำเร็จ'
    //                     })
    //                 }else{
    //                   if(result[0] >= 0 && result[0] <=  100){
    //                         $.ajax({
    //                             type: "POST",
    //                             url: "<?php echo site_url("/testresult/report/editPointStudent"); ?>",
    //                             data: { 'student_ref' : res , 'update_score' : result  },
    //                             success: function (response) {
    //                                 if(response){
    //                                     swal({
    //                                         type: 'success',
    //                                         html: 'แก้ไขข้อมูลสำเร็จ'
    //                                     })
    //                                 }else{
    //                                     swal({
    //                                         type: 'error',
    //                                         html: 'แก้ไขข้อมูลไม่สำเร็จ'
    //                                     })
    //                                 }
        
    //                             }
    //                         }); // end ajax
    //                   }else{
    //                        swal({
    //                         type: 'error',
    //                         html: 'ใส่ค่าคะแนนไม่ถูกต้อง'
    //                         })
    //                   }
  
    //                 }
                   
    //             }).catch(swal.noop)
    //         }
    //     });
    
    // }


</script>

