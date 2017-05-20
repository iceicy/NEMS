<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <h3>Form News
            <small></small>
        </h3>
        <!-- START row-->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <!-- START panel-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"></div>
                    </div>
                    <div class="panel-body">
                        <div class="news-subject" style="padding-bottom: 50px">
                            <h2><?php echo $rs_news->topic ?></h2>
                        </div>
                        <div class="news-img" align="center">
                            <img src="<?php echo base_url("uploads/registration/news/").$rs_news->tb_new_img_path_news_id?>" width="600px" >
                        </div>
                        <div class="news-content" style="padding-top: 50px">
                            <p>&emsp;&emsp;<?php echo $rs_news->content ?></p>
                        </div>
                        <div>
                            <a href="javascript:window.history.go(-1);">
                                <button type="button" class="btn btn-default ">Back</button>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- END panel-->

            </div>
        </div>
        <!-- END row-->
    </div>
</section>
