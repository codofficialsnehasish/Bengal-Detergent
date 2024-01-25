<?php $this->load->view('employee_management/partialss/main');?>

    <head> 
        <?php $this->load->view('employee_management/partialss/title-meta');?>

        <?php PageSpecCss($pagecss);?>
        
        <?php $this->load->view('employee_management/partialss/head-css');?>
       
    </head>
    <?php $this->load->view('employee_management/partialss/body');?>

        <!-- Begin page -->
        <div id="layout-wrapper">
        <?php $this->load->view('employee_management/partialss/menu');?>
        
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">