
<!--Student after login page -->
<?php
$this->load->view('header_view');
?>
<div class="container">
    <div class="main_body">
        <div id="bigCallout">
        <aside class = "col-md-3"><div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Interview Preperation Program</h4>
                <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                    <li>
                        <a href = "#">Aptitude Development Program</a>
                        <div class = "my_left_link"></div>
                    </li>
                    <li>
                        <a href = "#">Employment Documentation</a>
                        <div class = "my_left_link"></div>
                    </li>
                    <li>
                        <a href = "#">Self-Assessment Program</a>
                        <!--<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    </li>
                    <!--<li>-->
                    <!--    <a href = "<?php echo base_url('QuizAnalatics') ?>">Assessment Center</a>-->
                        <!--<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>-->
                    <!--</li>-->
                     <li>
                        <a href = "<?php echo base_url('') ?>">Personal Interview</a>
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
        <div class="text-justify">
            <h4>
                Employment Readiness or Job Readiness or Employability refers to the attributes of a person that make that person able to gain and maintain employment. In simple words employability is the quality of being suitable for paid work.

            </h4><br>
            <p>
                This program will equip management and engineering students with the essentials skills required to be job ready like aptitude development, Guesstimation, group discussion, employment documentation, self - assessment, domain questions with answers, HR questions with answers, functional questions with answers and personal interview

            </p><br>
            <h4 style="color:green;">
                Introduction to Employment Readiness or Job Readiness or Employability

            </h4><br>
            <p>
                Employment Readiness or Job Readiness or Employability is the ability of a person to do Intelligent Self-Assessment with an objective of exploring personal assets (Skills, Values, Strengths, motivations etc.), explore opportunities in the market, make informed career related decisions, identify and bridge training gaps in terms of assets required for the desired jobs and current inventory of personal assets, create a compelling action plan (Effective curriculum vitae, Covering letter, Preparation for Personal Interview etc.), Gain the first employment, ensure self-development throughout professional career, grow in an organization and gain subsequent employments. 

            </p>
        </div>
    </div>
    </div>

</section> <!--end col-md-9-->
</div> <!--end bigCallout-->
<?php
 $this->load->view('footer_view');
?>