	<style>
        #myBar {
            height: "auto";
            font-size:13px;
            background-color: #4CAF50;
            text-align: center; /* To center it horizontally (if you want) */
            color: white; 
        }
    </style>



    
    <div class="content-wrapper">

		<div class="content-heading">
                <h3>Notification Test Result</h3>
                <div id="myProgress" style="display:none;">
                    <div id="myBar">10%</div>
                </div>
        </div>




        <div class="panel panel-default">
		<!-- <div class="panel-heading">Form elements</div> -->
			<div class="panel-body">
              <div class="row" style="padding:20px; border-bottom:0.5px solid #c2c2c2;">
                <div class="col-md-6">
                     <h4>ส่งอีเมล์แจ้งเตือนคะแนนผลสอบให้แก่ผู้เข้าสอบทุกคน</h4>
                    <button id="sendAll" class="btn btn-large btn-success">Send All</button>
                </div>
                <div class="col-md-6">
                    <div class="row row-table row-flush" style="border:0.5px solid #e7e8e8;">
                                <div class="col-xs-4 text-center text-info" style="border-right:0.5px solid #e7e8e8;">
                                    <em class="fa fa-users fa-2x"></em>
                                </div>
                                <div class="col-xs-8">
                                    <div class="panel-body text-center">
                                        <h4 id="count_all_test_result" class="mt0"></h4>
                                        <p class="mb0 text-muted">ผลคะแนนที่พร้อมส่ง</p>
                                    </div>
                                </div>
                        </div>
                </div>
              </div>
              <br>
                
                <table id="table_individual" class="testresult_datatable table table-striped table-hover">
                <thead>
                    <tr>
                        <th><input id="checkall" type="checkbox"></th>
                        <th>รหัสประจำตัว</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th class="sort-numeric">ประเภทการสอบ</th>
                        <th class="sort-alpha">ครั้งที่สอบ</th>
                        <th class="sort-alpha">วิชาที่สอบ</th>
                        <th class="sort-alpha">
                            Actions
                        </th>
                    </tr>
                </thead>
            </table>

            </div>
        </div>
        <!--end panel -->
    </div>
    <!--end content-wrapper-->


    <script>

    $("#myProgress").hide();
    function move(callback) {
        $("#myProgress").show();
        var elem = document.getElementById("myBar"); 
        var width = 0;
        var id = setInterval(frame, 100);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                $("#myProgress").hide();
                return callback('ok')
            } else {
                width++; 
                elem.style.width = width + '%'; 
                elem.innerHTML = width * 1 + '%';
            }
        }
    }


    var checkAll = document.querySelector('#checkall');


    checkAll.addEventListener('click', function(){
        var checkRow = document.querySelectorAll('.checkRow');
        if(checkAll.checked == true){
                for(var i = 0 ; i < checkRow.length  ; i ++){
                    checkRow[i].checked = true;
                }
        }else  if(checkAll.checked == false){
                for(var i = 0 ; i < checkRow.length  ; i ++){
                    checkRow[i].checked = false;
                }
        } 
    });

        var all_score_individual = (<?php echo json_encode($all_score_individual); ?>);
        document.getElementById('count_all_test_result').innerHTML = all_score_individual.length + ' คน' ;
    	var tb_row_str = '<tbody>';
		all_score_individual.map( (row, index) =>{
            // console.log(row)
				tb_row_str += `
					<tr>
                        <td><input class="checkRow" type="checkbox"></td>
                         <td>${row.student_id}</td>
						<td>${row.first_name} </td>
						<td>${row.last_name}</td>
						<td>${row.type_name}</td>
						<td>${row.subject_name}</td>
						<td>${row.email_name}</td>
                        <td>
                         <button onclick="send_email('${row.email_name}' , '${row.first_name} ${row.last_name}' ,${row.student_id} , ${row.type_id} , ${row.subject_id} , ${row.score_test_round})" class="btn btn-sm btn-success" >Send Email</button>
                        </td>
					</tr>
				`
		})
		                        //  <a  href="<?php echo site_url('testresult/notification/sendEmail/${row.student_id}/${row.type_id}/${row.subject_id}/${row.score_test_round}');?>" class="btn btn-sm btn-success" >View</a>
        //  <button onclick="send_email('${row.email_name}' , '${row.first_name} ${row.last_name}' , ${row.student_id} , ${row.type_id} , ${row.subject_id} , ${row.score_test_round})" class="btn btn-sm btn-success" >Send Email</button>
	tb_row_str += '</tobdy>';
	$('#table_individual').append(tb_row_str);

     var send_email = (email , name , student_id ,type_id , subject_id  ,score_test_round) => {
            console.log('send email => ' ,email , name , student_id ,type_id , subject_id  ,score_test_round);
            var data = {
                "email_name" : email,
                "name"  : name,
                "student_id" : student_id,
                "type_id" : type_id,
                "subject_id" : subject_id,
                "score_test_round" : score_test_round   
            }

           
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("/testresult/notification/sendEmail"); ?>",
            data : data,
            success: function (res) {
                console.log('res ::' , res)
                if(res == 'success'){
                    swal(
                        `ส่งผลสอบ  ${email} `,
                        `ส่งอีเมล์ไป ${name} ให้สำเร็จ !`,
                        'success'
                    )
                }else{
                        swal(
                        `ส่งผลสอบ  ${email} `,
                        `ส่งอีเมล์ไป ${name} ไม่สำเร็จ !`,
                        'error'
                    )
                }
            }
        })
    // ${row.email_name}
    // ${row.name}
    // ${row.last_name}
    // ${row.student_id}
    // ${row.type_id}
    // ${row.subject_id}
    // ${row.score_test_round}
        // swal(
        //     `ส่งผลสอบ  ${email} `,
        //     `ส่งอีเมล์ไป ${name} ให้สำเร็จ !`,
        //     'success'
        // )
     } // end send_email

    $('#sendAll').click(()=>{
        swal({
            title: '<p>กรุณาพิมพ์ "confirm" เพื่อยืนยันการส่งอีเมล์ </p>',
            input: 'text',
            showCancelButton: true,
            inputValidator: function (value) {
                return new Promise(function (resolve, reject) {
                if (value == 'confirm') {
                    resolve()
                } else {
                    reject('ใส่ข้อมูลไม่ถูกต้อง กรุณาใส่ให้ถูกต้อง')
                }
                })
            }
            }).then(function (result) {
                     move(function(status){
                          swal(
                            'ส่งอีเมล์ไปยังผู้สอบสำเร็จ !',
                            `อีเมล์ ${all_score_individual.length} ฉบับ`,
                            'success'
                          )
                     }); 
                     
            })
     })


      
    </script>