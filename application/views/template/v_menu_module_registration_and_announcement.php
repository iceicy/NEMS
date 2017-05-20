<?php //echo $GroupID;
  $GroupID = (isset($GroupID)) ? $GroupID : '';
  $groupshow = 'display:none;';
  if ($GroupID == 'SADM' || $GroupID == 'ADM') {
      $groupshow = '';
  }
?>

<li class=" ">
    <a href="#menu_module_registration_and_announcement" title="Examination Management" data-toggle="collapse">
        <em class="fa fa-folder-open-o"></em>
        <span>Registration & Announcement</span>
    </a>
    <ul id="menu_module_registration_and_announcement" class="nav sidebar-subnav collapse">
        <li class="sidebar-subnav-header">menu_module_registration_and_announcement</li>
        <li class=" ">
            <a href="<?php echo site_url('registration/register/form'); ?>" title="Profile" data-toggle="">
                <span>Profile</span>
            </a>
        </li>
        <!-- class=" ">
            <a href="<?php //echo site_url('registration/news/form');?>" title="News Form" data-toggle="">
                <span>News Form</span>
            </a>
        </li-->
        <li class=" " style="<?php echo $groupshow; ?>">
            <a href="<?php echo site_url('registration/news/list'); ?>" title="News List" data-toggle="">
                <span>News List</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?php echo site_url('registration/news/listview'); ?>" title="News View" data-toggle="">
                <span>News View</span>
            </a>
        </li>
    </ul>

</li>
