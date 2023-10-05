<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
        <div class="row" id="bigCallout">
		   <div class="col-md-12">
                 <ul class="breadcrumb breadcrumb_background">
				      <li><a href="<?php echo site_url(); ?>">Home</a> <span class="divider"></span></li>
					  <li <?php if(empty($dashboard_type)){ ?> class="active" <?php } ?> ><a href="<?php echo site_url("dashboard"); ?>">Dashboard</a>  <?php if(!empty($dashboard_type)){ ?> <span class="divider"></span> <?php } ?> </li>
					  <?php if(!empty($dashboard_type)){ ?>
					       <li class="active"><?php echo ucwords($dashboard_type); ?></li>
					  <?php } ?>
				  </ul>
           </div>
		   
		   <aside class="col-md-3">
                 <div class="panel panel-primary border">
						    
                            <h4 class="quickpanelhead quiz_head">Placement PREP Program</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                                <li>
                                    <a href="<?php echo site_url("dashboard/aptitude-development"); ?>">Aptitude Development Program</a>
                                </li>  
                                <li>
                                    <a href="<?php echo site_url("dashboard/employment-documentation"); ?>">Employment Documentation</a>
                                </li>  
                                <li>
                                    <a href="<?php echo site_url("dashboard/self-assessment"); ?>">Self-Assessment Program</a>
                                </li>  
                                <li>
                                    <a href="<?php echo site_url("dashboard/personal-interview"); ?>">Personal Interview</a>
                                </li>								
                            </ul>
							                              
				</div> 
            </aside>
