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

                  <form class="form-horizontal">
                    <div class="form-group">
                       <label class="col-lg-2 control-label"></label>
                       <div class="col-lg-10">
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="i-radio" value="option1" checked>
                             <span class="fa fa-check"></span>Public</label>
                          <label class="radio-inline c-radio">
                             <input id="inlineradio10" type="radio" name="i-radio" value="option1" checked>
                             <span class="fa fa-check"></span>Private</label>
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Topic</label>
                       <div class="col-lg-10">
                          <input type="text" placeholder="Topic" class="form-control">
                       </div>
                    </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Description</label>
                       <div class="col-lg-10">
                          <input type="text" placeholder="Description" class="form-control">
                       </div>
                    </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                          <div data-role="editor-toolbar" data-target="#editor" class="btn-toolbar btn-editor">
                                                             <div class="btn-group dropdown">
                                                                <a data-toggle="dropdown" title="Font" class="btn btn-default">
                                                                   <em class="fa fa-font"></em><b class="caret"></b>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                   <li><a href="" data-edit="fontName Arial" style="font-family:'Arial'">Arial</a>
                                                                   </li>
                                                                   <li><a href="" data-edit="fontName Sans" style="font-family:'Sans'">Sans</a>
                                                                   </li>
                                                                   <li><a href="" data-edit="fontName Serif" style="font-family:'Serif'">Serif</a>
                                                                   </li>
                                                                </ul>
                                                             </div>
                                                             <div class="btn-group dropdown">
                                                                <a data-toggle="dropdown" title="Font Size" class="btn btn-default">
                                                                   <em class="fa fa-text-height"></em>&nbsp;<b class="caret"></b>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                   <li><a href="" data-edit="fontSize 5" style="font-size:24px">Huge</a>
                                                                   </li>
                                                                   <li><a href="" data-edit="fontSize 3" style="font-size:18px">Normal</a>
                                                                   </li>
                                                                   <li><a href="" data-edit="fontSize 1" style="font-size:14px">Small</a>
                                                                   </li>
                                                                </ul>
                                                             </div>
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
                          <div style="overflow:scroll; height:250px;max-height:250px" class="form-control wysiwyg mt-lg">Type something ...</div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Upload Picture</label>
                        <div class="col-lg-10">
                          <input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle">
                        </div>
                     </div>
                    <div class="form-group">
                       <label class="col-lg-2 control-label">Priority</label>
                       <div class="col-lg-3">
                         <select name="" class="form-control m-b">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                         </select>
                       </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Start date</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="Start date" class="form-control">
                           <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                           </span>
                        </div>
                      </div>
                      <label class="col-lg-2 control-label">End date</label>
                      <div class="col-lg-4">
                        <div id="" class="calendardate input-group date">
                           <input type="text" placeholder="End date" class="form-control">
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
                                 <input type="checkbox" checked="">
                                 <span class="fa fa-check"></span>Pin</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
                           <button type="submit" class="btn btn-primary">Submit</button>
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
