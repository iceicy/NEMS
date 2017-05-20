<section>
  <div class="content-wrapper">    
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <?php if($qu_news_pin_more->num_rows()>0){ ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                 <h3 style="margin: 0;"><em class="icon-pin"></em></i>&nbsp;&nbsp;ข่าวที่ปักหมุด</h3>                    
              </div>
              <div class="panel-body">
                <table id="datatable3" class="table table-striped table-hover">
                  <tbody>
                    <?php $num = 1;
                    foreach ($qu_news_pin_more->result() as $row) { ?>
                      <tr class="gradeX">
                        <th style="width:5%; text-align: center; vertical-align: middle;"><h4><?php echo $num++;?></h4></th>
                        <th style="width:85%;">
                          <h4 style="color:#5d9cec "><?php echo $row->topic; ?></h4>
                          <p><?php echo $row->Description; ?></p>
                          <small class="mr-sm"> 
                            <?php 
                              $date = date_create($row->active_date);
                              echo date_format($date, 'F d,Y');
                            ?>            
                          </small>
                        </th>
                        <th style="width:10%; text-align: center; vertical-align: middle;">
                          <?php $url = site_url("registration/news/topic_detail/".$row->news_ID); ?> 
                          <a href="<?php echo $url ?>">รายละเอียด</a>                   
                        </th>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php } 
          if($qu_news_more->num_rows()>0){ ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                 <h3 style="margin: 0;"><em class="fa fa-newspaper-o"></em>&nbsp;&nbsp;ข่าวเพิ่มเติม</h3>                    
              </div>
              <div class="panel-body">
                <table id="datatable3" class="table table-striped table-hover">
                  <tbody>
                    <?php $num = 1;                 
                    foreach ($qu_news_more->result() as $row) { ?>
                      <tr class="gradeX">
                        <th style="width:5%; text-align: center; vertical-align: middle;"><h4><?php echo $num++;?></h4></th>
                        <th style="width:85%;">
                          <h4 style="color:#5d9cec;"><?php echo $row->topic; ?></h4>
                          <p><?php echo $row->Description; ?></p>
                          <small class="mr-sm"> 
                            <?php 
                              $date = date_create($row->active_date);
                              echo date_format($date, 'F d,Y');
                            ?>            
                          </small>
                        </th>
                        <th style="width:10%; text-align: center; vertical-align: middle;">
                          <?php $url = site_url("registration/news/topic_detail/".$row->news_ID); ?> 
                          <a href="<?php echo $url ?>">รายละเอียด</a>                   
                        </th>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>    
    </div>
  </div>
</section>