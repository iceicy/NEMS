<?php
/**
 * User: Developer Jirayus
 * Date: 5/5/2560
 * Time: 23:27
 */

?>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><?php echo $header_name; ?></h2>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post"
                  action="<?php echo site_url($this->config->item('lg_dir') . 'Generator_Exam/action') ?>">
                <input type="hidden" name="mapId" value="<?php echo $val_mapId ?>">
                <div class="form-group">
                    <label class="col-lg-4 control-label">ปี</label>
                    <div class="col-lg-5">
                        <?php
                        echo form_dropdown('Year', $op_year, array($val_year), 'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">สถานที่</label>
                    <div class="col-lg-5">
                        <?php
                        echo form_dropdown('tb_location', $op_location, array($val_location), 'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">ชนิดรายวิชา</label>
                    <div class="col-lg-5">
                        <?php
                        echo form_dropdown('TypeID', $op_typeexam, array($val_subject), 'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">รายวิขา</label>
                    <div class="col-lg-5">
                        <?php
                        echo form_dropdown('SubID', $op_subject, array($val_typeexam), 'class="form-control"');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">จำนวนชุดข้อสอบ</label>
                    <div class="col-lg-5">
                        <input type="number" name="numberExam" value="<?php echo $val_numberExam?>" min="1" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="reset" class="btn btn-sm btn-default">เคลียร์</button>
                        <button type="submit" class="btn btn-sm btn-success pull-right">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>รายละเอียดวิชา</h2>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ปี</th>
                    <th class="text-center">สถานที่</th>
                    <th class="text-center">ชนิดวิชา</th>
                    <th class="text-center">รายวิชา</th>
                    <th class="text-center">จำนวนชุดข้อสอบ</th>
                    <th class="text-center">Barcode</th>
                    <th class="text-center">ดำเนินการ</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data_tables->result() AS $index => $item) { ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $item->Year ?></td>
                        <td><?php echo $item->LocName; ?></td>
                        <td><?php echo $item->TypeName; ?></td>
                        <td><?php echo $item->SubName; ?></td>
                        <td class="text-right">
                            <?php echo number_format($item->numberExam); ?>
                        </td>
                        <td class="text-center">
                            <img src="<?php echo site_url($this->config->item('lg_dir') . 'Generator_Exam/Barcode/' . $item->GenaratorCode) ?>">
                        </td>
                        <td class="text-center">
                            <a href="<?php echo site_url($this->config->item('lg_dir') . 'Generator_Exam/index/'.$item->mapId);?>"><i class="icon-pencil"></i></a>
                            &nbsp;&nbsp;
                            <a onclick="delete_value(<?php echo $item->mapId;?>)" ><i class="icon-trash" style="color:red"></i></a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete_value(id){

        if(confirm('ต้องการลบข้อมูล ?') == true){
            window.location = "<?php echo site_url($this->config->item('lg_dir') . 'Generator_Exam/delete/'.$item->mapId);?>";
        }else{
            return false;
        }
    }
</script>