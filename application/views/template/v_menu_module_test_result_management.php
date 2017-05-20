<li class=" ">
    <a href="#menu_module_test_result_management" title="Examination Management" data-toggle="collapse">
        <em class="fa fa fa-search"></em>
        <span>Test Result Management</span>
    </a>
    <ul id="menu_module_test_result_management" class="nav sidebar-subnav collapse">
        <li class="sidebar-subnav-header">Test Result Management  </li>        
        <li class="">
            <a href="<?php echo site_url('testresult/import');?>" title="import_report">
                <span>Import</span>
            </a>
        </li>

        <li class=" ">
            <a href="#menu_module_test_result_management_level1" title="สมัครสอบ" data-toggle="collapse">
                <span>Report View</span>
            </a>
             <ul id="menu_module_test_result_management_level1" class="nav sidebar-subnav collapse">
                 <li class=" ">
                    <a href="<?php echo site_url('testresult/report');?>"  data-toggle="">
                        <span>Dashboard View</span>
                    </a>
                </li>
                 <li class=" ">
                    <a href="<?php echo site_url('testresult/report/provincesview');?>"  data-toggle="">
                        <span>Province Level </span>
                    </a>
                </li>
                <li class=" ">
                    <a href="<?php echo site_url('testresult/report/schoolsview');?>"  data-toggle="">
                        <span>School Level </span>
                    </a>
                </li>
                <li class=" ">
                    <a href="<?php echo site_url('testresult/report/individualview');?>"  data-toggle="">
                        <span>Individual Level </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="<?php echo site_url('testresult/notification');?>" title="import_report">
                <span>Notification Test Result</span>
            </a>
        </li>
    </ul>
</li>

