<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/testresult/select.js"></script>



	<div class="content-wrapper">
		<div class="content-heading">
                <h3>Report View</h3>
        </div>

        <div class="panel panel-default">
		<!-- <div class="panel-heading">Form elements</div> -->
			<div class="panel-body">

                <form role="form" class="form-inline">
                    <div class="input-group col-sm-6">
                   <!--select province-->
                    <select id="provinces_select" class="form-control select_search">
                    </select>
                    <!--end select province-->    
                    </div>
                    <button type="button" class="btn btn-sm btn-primary">Search</button>
                </form>
                <p style="color:#c1c1c1; margin-top:10px;">เลือกจังหวัดที่คุณต้องการให้แสดงรายงาน</p>
            </div>
        </div>
    </div>

    <canvas id="chartjs-piechart" width="914" height="456" style="width: 457px; height: 228px;"></canvas>




    <script>
         var provinces = (<?php echo $provinces; ?>);
         provinces.map( (ele , index) =>
              {  $('#provinces_select').append(`<option value="${ele.province}">${ele.province}</option>`);}
         );
    </script>