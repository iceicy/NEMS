
<li class=" ">
    <a href="#menu_module_examination_management" title="Examination Management" data-toggle="collapse">
        <em class="fa fa-folder-open-o"></em>
        <span>Examination Management</span>
    </a>
    <ul id="menu_module_examination_management" class="nav sidebar-subnav collapse">
        <li class="sidebar-subnav-header">menu_module_examination_management</li>
        <li class=" ">
            <a href="#menu_module_examination_management_level1" title="Level 1" data-toggle="collapse">
                <span>สมัครสอบ</span>
            </a>
             <ul id="menu_module_examination_management_level1" class="nav sidebar-subnav collapse">
                 <li class="sidebar-subnav-header">Level 1</li>
                 <li class=" ">
                    <a href="<?php echo site_url('examination_management/Register/Select_Subject');?>" title="RegisterforExam" data-toggle="">
                        <span>เลือกวิชาสอบ</span>
                    </a>
                </li> 
                <li class=" ">
                    <a href="<?php echo site_url('examination_management/Toprint/Invoice');?>" title="RegisterforExam" data-toggle="">
                        <span>พิมพ์ใบชำระเงิน</span>
                    </a>
                </li>   
                <li class=" ">
                    <a href="<?php echo site_url('examination_management/Toprint/Examcard');?>" title="RegisterforExam" data-toggle="">
                        <span>พิมพ์บัตรประจำตัวผูสอบ</span>
                    </a>
                </li>           
            </ul>
        <li class="sidebar-subnav-header">menu_module_examination_management</li>
        <li class=" ">
            <li class=" ">
                    <a href="<?php echo site_url('examination_management/Location/LocationManagement');?>" title="Add Location" data-toggle="">
                        <span>การจัดการสถานที่สอบ</span>
                    </a>
            </li>
        </li>
        <li class=" ">
               <a href="<?php echo site_url('examination_management/Subject/SubjectManagement');?>" title="Add Subject" data-toggle="">
                        <span>การจัดการวิชาสอบ</span>
               </a>
         </li>
         <li class=" ">
               <a href="<?php echo site_url('examination_management/Import/ImportData');?>" title="Import" data-toggle="">
                        <span>Import ข้อมูลผู้สมัครสอบ</span>
               </a>
         </li>  
         <li class=" ">
               <a href="<?php echo site_url('examination_management/Export/ExportData');?>" title="Add Subject" data-toggle="">
                        <span>Export ข้อมูลผู้สมัครสอบ</span>
               </a>
         </li>          
    </ul>
</li>