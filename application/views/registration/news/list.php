<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-2">
                                    <h2 class="">รายการข่าว</h2>
                                </div>
                                <div class="col-md-offset-8 col-md-2 text-right">
                                    <a href="<?php echo base_url("index.php/registration/news/form")?>">
                                        <button type="button" class="btn btn-primary btn-sm">Add News Form</button>
                                    </a>
                                </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table_news" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-1 text-center sort-numeric">No</th>
                                    <th class="col-md-7 sort-alpha">Topic</th>
                                    <th class="col-md-1 sort-numeric">Priority</th>
                                    <th class="col-md-1">Start Date</th>
                                    <th class="col-md-1">End Date</th>
                                    <th class="col-md-1 text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach($table_news_list->result_array() as $row){ ?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $i ?></td>
                                    <td class="text-left"><?php echo $row['topic'] ?></td>
                                    <td class="text-center"><?php echo $row['access_level'] ?></td>
                                    <td class="text-center"><?php echo date("d/m/Y", strtotime($row['active_date'])) ?></td>
                                    <td class="text-center"><?php echo date("d/m/Y", strtotime($row['expired_date'])) ?></td>
                                    <td class="text-center">
                                        <div class="row list-icon">
                                            <div class="col-sm-3">
                                                <a href="<?php echo site_url('registration/news/list/').$row['news_ID'] ?>">
                                                    <em class="fa fa-wrench"></em>
                                                </a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="<?php echo site_url('registration/news/delete_news/').$row['news_ID'] ?>">
                                                    <em class="fa fa-remove"></em>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <?php $i++; } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>