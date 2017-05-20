<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert/dist/sweetalert.css">
<?php
  if($form == null) {
    $news_id = null;
    $access_level = null;
    $topic = null;
    $description = null;
    $content = null;
    $priority = null;
    $startDate = null;
    $endDate = null;
    $pin = null;
  } else {
    $news_id = $form['news_ID'];
    $access_level = $form['access_level'];
    $topic = $form['topic'];
    $description = $form['Description'];
    $content = $form['content'];
    $priority = $form['priority'];
    $startDate = date("d-m-Y", strtotime($form['active_date']));
    $endDate = date("d-m-Y", strtotime($form['expired_date']));
    $pin = $form['pin_flag'];
  }
?>
<section>
   <!-- Page content-->
   <div class="content-wrapper">
      <h3>Form News
         <small></small>
      </h3>
      <!-- START row-->
      <div class="row">
         <div class="col-lg-12">

               <!-- START panel-->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="panel-title"></div>
                  </div>
                  <div class="panel-body">

                  <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="" action="<?php echo site_url()."/registration/news/form_edit"?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <label class="col-lg-2 control-label"></label>
                       <div class="col-lg-10">
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="access_level" value="1" <?php if($access_level == 1 || $access_level == null) echo "checked";?>>
                             <span class="fa fa-check"></span>Public</label>
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="access_level" value="2" <?php if($access_level == 2) echo "checked";?>>
                             <span class="fa fa-check"></span>Private</label>
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Topic</label>
                       <div class="col-lg-10">
                          <input type="text" placeholder="Topic" class="form-control" name="topic" required value="<?php echo $topic;?>">
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Description</label>
                       <div class="col-lg-10">
                          <input type="text" placeholder="Description" class="form-control" name="description" required value="<?php echo $description;?>">
                       </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                          <div data-role="editor-toolbar" data-target="#editor" class="btn-toolbar btn-editor">
                                                             <div class="btn-group">
                                                                <a data-edit="bold" data-toggle="tooltip" title="Bold (Ctrl/Cmd+B)" class="btn btn-default">
                                                                   <em class="fa fa-bold"></em>
                                                                </a>
                                                                <a data-edit="italic" data-toggle="tooltip" title="Italic (Ctrl/Cmd+I)" class="btn btn-default">
                                                                   <em class="fa fa-italic"></em>
                                                                </a>
                                                                <a data-edit="strikethrough" data-toggle="tooltip" title="Strikethrough" class="btn btn-default">
                                                                   <em class="fa fa-strikethrough"></em>
                                                                </a>
                                                                <a data-edit="underline" data-toggle="tooltip" title="Underline (Ctrl/Cmd+U)" class="btn btn-default">
                                                                   <em class="fa fa-underline"></em>
                                                                </a>
                                                             </div>
                                                             <div class="btn-group">
                                                                <a data-edit="insertunorderedlist" data-toggle="tooltip" title="Bullet list" class="btn btn-default">
                                                                   <em class="fa fa-list-ul"></em>
                                                                </a>
                                                                <a data-edit="insertorderedlist" data-toggle="tooltip" title="Number list" class="btn btn-default">
                                                                   <em class="fa fa-list-ol"></em>
                                                                </a>
                                                                <a data-edit="outdent" data-toggle="tooltip" title="Reduce indent (Shift+Tab)" class="btn btn-default">
                                                                   <em class="fa fa-dedent"></em>
                                                                </a>
                                                                <a data-edit="indent" data-toggle="tooltip" title="Indent (Tab)" class="btn btn-default">
                                                                   <em class="fa fa-indent"></em>
                                                                </a>
                                                             </div>
                                                             <div class="btn-group">
                                                                <a data-edit="justifyleft" data-toggle="tooltip" title="Align Left (Ctrl/Cmd+L)" class="btn btn-default">
                                                                   <em class="fa fa-align-left"></em>
                                                                </a>
                                                                <a data-edit="justifycenter" data-toggle="tooltip" title="Center (Ctrl/Cmd+E)" class="btn btn-default">
                                                                   <em class="fa fa-align-center"></em>
                                                                </a>
                                                                <a data-edit="justifyright" data-toggle="tooltip" title="Align Right (Ctrl/Cmd+R)" class="btn btn-default">
                                                                   <em class="fa fa-align-right"></em>
                                                                </a>
                                                                <a data-edit="justifyfull" data-toggle="tooltip" title="Justify (Ctrl/Cmd+J)" class="btn btn-default">
                                                                   <em class="fa fa-align-justify"></em>
                                                                </a>
                                                             </div>
                                                             <div class="btn-group dropdown">
                                                                <a data-toggle="dropdown" title="Hyperlink" class="btn btn-default">
                                                                   <em class="fa fa-link"></em>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                   <div class="input-group ml-xs mr-xs">
                                                                      <input id="LinkInput" placeholder="URL" type="text" data-edit="createLink" class="form-control input-sm">
                                                                      <div class="input-group-btn">
                                                                         <button type="button" class="btn btn-sm btn-default">Add</button>
                                                                      </div>
                                                                   </div>
                                                                </div>
                                                                <a data-edit="unlink" data-toggle="tooltip" title="Remove Hyperlink" class="btn btn-default">
                                                                   <em class="fa fa-cut"></em>
                                                                </a>
                                                             </div>
                                                             <div class="btn-group">
                                                                <a id="pictureBtn" data-toggle="tooltip" title="Insert picture (or just drag &amp; drop)" class="btn btn-default">
                                                                   <em class="fa fa-picture-o"></em>
                                                                </a>
                                                                <input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px">
                                                             </div>
                                                             <div class="btn-group pull-right">
                                                                <a data-edit="undo" data-toggle="tooltip" title="Undo (Ctrl/Cmd+Z)" class="btn btn-default">
                                                                   <em class="fa fa-undo"></em>
                                                                </a>
                                                                <a data-edit="redo" data-toggle="tooltip" title="Redo (Ctrl/Cmd+Y)" class="btn btn-default">
                                                                   <em class="fa fa-repeat"></em>
                                                                </a>
                                                             </div>
                                                          </div>
                          <div style="overflow:scroll; height:250px;max-height:250px" class="form-control wysiwyg mt-lg" id="editor" data-target="content">
                             <?php if($content != null) {
                              echo $content;
                            } else { ?>
                              Type something ...
                            <?php } ?>
                           </div>
                          <textarea type="text" class="hidden" name="content" id="content"></textarea>
                        </div>
                     </div>
                     <script>
                      $(document).ready(function(){
                       $("#copyeditor").on("click", function() {
                          var targetName = $("#editor").attr('data-target');
                          $('#'+targetName).val($('#editor').html());
                        });
                       });
                     </script>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Upload Picture</label>
                        <div class="col-lg-10">
                          <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" name="picture">
                        </div>
                     </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Priority</label>
                       <div class="col-lg-3">
                         <select class="form-control m-b" name="priority">
                            <option value="1" <?php if($priority == 1) echo "selected='selected'";?>>1</option>
                            <option value="2" <?php if($priority == 2) echo "selected='selected'";?>>2</option>
                            <option value="3" <?php if($priority == 3) echo "selected='selected'";?>>3</option>
                         </select>
                       </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Start date</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="Start date" class="form-control" name="start_date" required value="<?php echo (isset($startDate) ? $startDate : date("d/m/Y"));?>">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                      </div>
                      <label class="col-lg-2 control-label">End date</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="End date" class="form-control" name="end_date" required value="<?php echo $endDate;?>">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                           <div class="checkbox c-checkbox">
                              <label>
                                 <input type="checkbox" name="pin" value="1" <?php if($pin == 1) echo "checked";?>>
                                 <span class="fa fa-check"></span>Pin</label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
                     <div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
                           <button type="submit" class="btn btn-primary" id="copyeditor">Submit</button>
                        </div>
                     </div>
                  </form>
                  </div>
               </div>
               <!-- END panel-->

         </div>
      </div>
      <!-- END row-->
   </div>
</section>

 <!-- PARSLEY-->
   <script src="<?php echo base_url(); ?>assets/vendor/parsleyjs/dist/parsley.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($alert)){
  echo $alert;
} ?>
