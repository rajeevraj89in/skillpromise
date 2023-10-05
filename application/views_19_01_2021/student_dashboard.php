
<!--Student after login page -->
<?php
$this->load->view('header_view');
?>
<div class="container">
    <div class="main_body">
        <div id="bigCallout">
        <aside class = "col-md-3"><div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Dashboard</h4>
                <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                    <!--<li>-->
                    <!--    <a href = "#">Aptitude Development</a>-->
                    <!--    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--    <a href = "#">Employment Documentation</a>-->
                    <!--    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    <!--</li>-->
                    <li>
                        <a href = "#">Self-Assessment</a>
                        <!--<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    </li>
                    <li>
                        <a href = "<?php echo base_url('QuizAnalatics') ?>">Assessment Center</a>
                        <!--<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    </li>
                </ul>
        </div>
        </aside>
        <!-- end col-md-3 -->
        <!-- end sidebar panel -->


<!--content panel start-->
<section class="col-md-9" style="min-height: 395px;">
    <div class="dooble-border">
    <div class="page-header_">
    <div class="panel">
        <h1 class='header_text'>Dashboard</h1>
    </div><!-- end page header -->
        <div class="text-justify"></div>
    </div>
    </div>

</section> <!--end col-md-9-->
</div> <!--end bigCallout-->
<?php
 $this->load->view('footer_view');
?>