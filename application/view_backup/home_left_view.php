<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
     <div class="row" id="bigCallout">
    <!--sidebar panel start -->
      <aside class="col-md-3">
 <?php
//                $query['data'] = $this->main_model->get_records('node', 'parent_id', 0, 'name');
//                foreach ($query['data']->result() as $rec) {
//                    echo '<li><a class="text" href="' . base_url() . "node/program/$rec->id" . '">' . "$rec->name  </a></li>";
//                }
             echo    $this->custom->get_side_navigation_panel_new(0, 'program','name') ;
                
                
                ?>
        <!-- programe menu start -->
<!--       <div class="panel panel-primary border">
            <div class="panel-heading">
                <h3 class="panel-title text">Programs</h3>
            </div>
        <h3 class="text" align="center"><u>Programs</u></h3>
           <div class="panel quickpanelhead "> <h4>Programs</h4></div>
        <div class="navbar-collapse navbar-ex1-collapse">
			
			<ul class="nav navbar-nav side-nav">
			    <li class="dropdown">
                              <a href="#" class="dropdown-toggle text" data-toggle="dropdown"> Aptitude Development <b class="fa fa-chevron-down li_caret"></b></a>
			      <ul class="dropdown-menu dropdown_box" role="menu">
			        <li><a href=""> Quantitative </a></li>	
				<li><a href=""> Reasoning </a></li>
                              </ul>
                            </li>
			    <li class="dropdown">
			        <a href="" class="dropdown-toggle text" data-toggle="dropdown">Bank PO Exam <b class="fa fa-chevron-down li_caret"></b></a>
				<ul class="dropdown-menu dropdown_box" role="menu">
				 <li><a href="">Communication </a></li>
				</ul>
			    </li>
                            <li class="dropdown">
			    <a href="#" class="dropdown-toggle text" data-toggle="dropdown">Hard Skill<b class="fa fa-chevron-down li_caret"></b></a>
				<ul class="dropdown-menu dropdown_box" role="menu">
				   <li><a href="">Computer Fundamentals</a></li>
				   <li><a href="">Hard Skills</a></li>
				</ul>
			    </li>
                            <li class="dropdown">
			    <a href="#" class="dropdown-toggle text" data-toggle="dropdown">Program1 <b class="fa fa-chevron-down li_caret"></b></a>
				<ul class="dropdown-menu dropdown_box" role="menu">
				   <li><a href="">Program1</a></li>
				</ul>
			    </li>
                            <li class="dropdown">
			    <a href="#" class="dropdown-toggle text" data-toggle="dropdown">score_quiz_test <b class="fa fa-chevron-down li_caret"></b></a>
				<ul class="dropdown-menu dropdown_box" role="menu">
				   <li><a href="">score_quiz_test</a></li>
				</ul>
			    </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle text" data-toggle="dropdown">test level 1 <b class="fa fa-chevron-down li_caret"></b></a>
				<ul class="dropdown-menu dropdown_box" role="menu">
				   <li><a href="">test level 1</a></li>
				</ul>
			    </li>
                            
			</ul>
             
             
             
             
                
                
                
                <?php
//                $query['data'] = $this->main_model->get_records('node', 'parent_id', 0, 'name');
//                foreach ($query['data']->result() as $rec) {
//                    echo '<li><a class="text" href="' . base_url() . "node/program/$rec->id" . '">' . "$rec->name  </a></li>";
//                }
            // echo    $this->custom->get_side_navigation_panel_new(0, 'program','name') ;
                
                
                ?>
                
            
        </div></div>-->
        <!-- end programe menu -->

    </aside><!-- end col-md-3 -->
    <!-- end sidebar panel -->
    
    <script type="text/javascript">
var site_url = '<?= $_SERVER['HTTP_HOST']; ?>'
$(document).ready(function($){
$(".dropdown").on('click',function(){
        if($(this).hasClass('open')){
            $(this).find(".dropdown-menu").slideUp('fast');
        }else{
            $(this).find(".dropdown-menu").slideDown('fast');
        }
    });
	
}); 
</script>