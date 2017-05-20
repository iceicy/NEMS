<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <?php if($qu_news_pin_more->num_rows()>0 || $qu_news_more->num_rows()>0){ ?>
         <h3 style="text-align: right;"><a href="<?php echo site_url("registration/news/listview_more"); ?>">
            <em class="fa fa-bullhorn"></em>&nbsp;&nbsp;ข่าวเพิ่มเติม</a>&nbsp;&nbsp;
         </h3>
      <?php } ?>
      <div class="row">
         <!-- Blog Content-->
         <div class="col-lg-12">
            <?php if($qu_first_news->num_rows()>0 || $qu_first_news_pin->num_rows()>0){
               if($qu_first_news_pin->num_rows()>0){ ?>
                  <?php foreach ($qu_first_news_pin->result() as $row) { ?>
                     <div class="panel">
                        <div class="row row-table row-flush">
                           <div class="col-xs-6">
                              <?php $url = site_url("registration/news/topic_detail/".$row->news_ID); ?>
                                    <a href="<?php echo $url ?>">
                                       <img src='<?php echo base_url("uploads/registration/news/".$row->tb_new_img_path_news_id); ?>' class="img-responsive">
                                    </a>
                           </div>
                           <div class="col-xs-7 align-middle p-lg">
                              <p>
                                 <span class="pull-left">
                                    <h4 class="mr-sm">
                                       <em class="icon-pin"></em>&nbsp;&nbsp;
                                       <?php 
                                          $date = date_create($row->active_date);
                                          echo date_format($date, 'F d,Y');
                                       ?>
                                    </h4>
                                 </span>
                              </p>
                              <h3 style="color:#5d9cec;"><?php echo $row->topic; ?></h3>                      
                              <p><?php echo $row->Description; ?></p>
                              <p class="mr-sm" class="pull-left">
                                 <a href="<?php echo $url ?>">รายละเอียด</a>
                              </p>
                           </div>
                        </div>
                     </div>
                  <?php }
               } ?>
               <div class="row">
                  <?php foreach ($qu_first_news->result() as $row) { ?>
                     <div class="col-lg-4">
                        <div class="panel">
                           <?php $url = site_url("registration/news/topic_detail/".$row->news_ID); ?>
                           <a href="<?php echo $url ?>">
                              <img src='<?php echo base_url("uploads/registration/news/".$row->tb_new_img_path_news_id); ?>' class="img-responsive">
                           </a>
                           <div class="panel-body">
                              <p class="clearfix">
                                 <span class="pull-left">
                                    <small class="mr-sm">
                                       <?php 
                                          $date = date_create($row->active_date);
                                          echo date_format($date, 'F d,Y');
                                       ?>
                                    </small>
                                    <small class="mr-sm" class="pull-left">
                                       <a href="<?php echo $url ?>">รายละเอียด</a>
                                    </small>
                                 </span>
                              </p>
                              <h4 style="color:#5d9cec;"><?php echo $row->topic; ?></h4>                      
                              <p><?php echo $row->Description; ?></p>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               </div>
            <?php } 
            else { ?>
               <div class="panel">
                  <h4>&nbsp;&nbsp;&nbsp;<?php echo "ไม่มีข่าวประกาศ"; ?></h4>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>
</section>
