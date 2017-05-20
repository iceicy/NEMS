<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>


<div class="content-wrapper">
    <div class="content-heading">
        <h3>Individual Report View</h3>
    </div>
    <div class="panel panel-default">
        <!-- <div class="panel-heading">Form elements</div> -->
        <div class="panel-body">

            <h4>ค้นหาข้อมูลด้วยรายบุคคล</h4>
            <small> รหัสประจำตัวผู้สอบ หรือ ชื่อ-นามสกุล</small>
            <hr>

            <table id="table_individual" class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสประจำตัว</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th class="sort-numeric">ประเภทการสอบ</th>
                        <th class="sort-alpha">วิชาที่สอบ</th>
                             <th class="sort-alpha">ครั้งที่สอบ</th>
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
    
    var all_score_individual = (<?php echo json_encode($all_score_individual); ?>);
    	var tb_row_str = '<tbody>';
		all_score_individual.map( (row, index) =>{
            // console.log(row)
				tb_row_str += `
					<tr>
						<td>${row.student_id}</td>
						<td>${row.first_name}</td>
						<td>${row.last_name}</td>
						<td>${row.type_name}</td>
						<td>${row.subject_name}</td>
                        <td>${row.score_test_round}</td>
                        <td>
                            <button onclick="edit_point(${row.student_id} , ${row.type_id} , ${row.subject_id} , ${row.score_test_round})" class="btn btn-sm btn-warning" >Edit</button>
                            <a  href="<?php echo site_url('testresult/report/individualviewReport/${row.student_id}/${row.type_id}/${row.subject_id}/${row.score_test_round}');?>" class="btn btn-sm btn-success" >View</a>
                        </td>
					</tr>
				`
		})
		
	tb_row_str += '</tobdy>';
	$('#table_individual').append(tb_row_str);
	

    var edit_point = (student_id ,type_id , subject_id  ,score_test_round) => {
        console.log(student_id ,type_id , subject_id  ,score_test_round)
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/report/searchById"); ?>",
            data : {  'student_id' :  student_id ,'type_id' : type_id , 'subject_id' : subject_id ,'score_test_round' : score_test_round },
            success: function (res) {
                res = JSON.parse(res);
                console.log('response =>' , res);

                swal({
                showCloseButton: true,
                showCancelButton: true,
                title: 'แก้ไขคะแนนของผู้สอบ',
                html:
                `
                <div class="text-left" style="font-size:14px; font-weight:bold;">
                    <p>ชื่อ : ${res.first_name} นามสกุล : ${res.last_name}</p>
                    <p>ประเภทการสอบ : ${res.type_name} วิชาที่สอบ : ${res.subject_name}</p>
                    <p>ครั้งที่สอบ : ${res.score_test_round}</p>
                </div>
                <p style="font-size:15px; color:red" class="pull-left">แก้ไขคะแนน</p>
                <input id="swal-input1" class="swal2-input" value=${res.score_point}>
                <p style="font-size:15px; color:red" class="pull-left">หมายเหตุ</p>                
                <input id="swal-input2" class="swal2-input" value=${res.score_remark}>`,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        if($('#swal-input1').val() != '' && $('#swal-input2').val() != ''){
                            resolve([
                                parseInt($('#swal-input1').val()),
                                $('#swal-input2').val()
                         ])
                        }else{
                            reject('กรุณาใส่ค่าที่ถูกต้อง')
                        }

                    })
                },
                onOpen: function () {
                    $('#swal-input1').focus()
                }
                }).then(function (result) {
                    var state = (isNaN(result[0]));
                    if(state == true){
                        swal({
                            type: 'error',
                            html: 'แก้ไขข้อมูลไม่สำเร็จ'
                        })
                    }else{
                      if(result[0] >= 0 && result[0] <=  100){
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url("/testresult/report/editPointStudent"); ?>",
                                data: { 'student_ref' : res , 'update_score' : result  },
                                success: function (response) {
                                    if(response){
                                        swal({
                                            type: 'success',
                                            html: 'แก้ไขข้อมูลสำเร็จ'
                                        })
                                    }else{
                                        swal({
                                            type: 'error',
                                            html: 'แก้ไขข้อมูลไม่สำเร็จ'
                                        })
                                    }
        
                                }
                            }); // end ajax
                      }else{
                           swal({
                            type: 'error',
                            html: 'ใส่ค่าคะแนนไม่ถูกต้อง'
                            })
                      }
  
                    }
                   
                }).catch(swal.noop)
            }
        });
    
    }


</script>

