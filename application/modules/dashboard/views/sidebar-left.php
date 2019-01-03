<?php
$set_active = null;
if($this->input->post('tab') || $this->input->post('tab')) {
    $set_active = urldecode($this->input->post('tab'));
}
$menu =  $this->menu_library->createMenu($set_active);          
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
          <?=$menu?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>