<?php $this->load->view('home_front_view');

?>


<!-- Content Row -->
<div class="program container">
	<center><h5 class="our-prog-title"><?php echo $name; ?> </h5></center>
	<div class="program-details">
	   <?php echo $description; ?>
	</div>
	<div class="row grid-5">
		<?php
		if($package){
			// echo "<pre>";
			// print_r($package);
			// die;
			foreach($package as $packkey => $packvalue){
		?>
		<div class="col-xs-12 col-sm-4 col-md-3">
			<div class="card program-card">
				<div class="prog-img">
					<a href = "<?php echo base_url('programedetails/'.$packvalue->id); ?>">
						<img class = "img-responsive" src = "<?php echo  base_url($packvalue->image_file); ?>" alt = "IMAGE"/>
					</a>
				</div>
				<div class="prog-content margin-bottom text-center">
				<a class="title text-uppercase" href = "<?php echo base_url('programedetails/'.$packvalue->id); ?>">
					<?php echo $packvalue->name; ?>
				</a>
				<p class="text-center nopadding"><?php echo $package_master[0]->name; ?></p>
				<p class="price">Rs <?php echo $packvalue->price; ?></p>
				<div class="prog-btn">
				    <?php 
						echo form_open('add_cart', array('class' => 'add-to-cart-form'));
						echo form_hidden('id', $packvalue->id);
						echo form_hidden('name', $packvalue->name);
                        echo form_hidden('package_name', $package_master[0]->name);
						echo form_hidden('program_type', 'normal');
                        echo form_hidden('product_image', base_url($packvalue->image_file));
						echo form_hidden('price', $packvalue->price);
						echo form_submit(
							   array(
									'class' => 'btn btn-success',
									'value' => 'Add to Cart',
									'name' => 'action'
								)
						   );
						echo form_close();
					?>
					<!--<a href="<?php //echo base_url('programedetails/'.$packvalue->id); ?>" class="btn btn-success" title="">Add to Cart</a> -->
					<a href="<?php echo base_url('Packagedetails/'.$packvalue->id.'/normal'); ?>" class="btn btn-default" style="background:#f27052; color:#fff;margin-left:5px;" >Know More</a>
				</div>
				</div>
				<div class="plus-details text-center">
					<p class=" nopadding title-sm"><?php echo $package_master[0]->name; ?> Plus</p>
					<p class="price">Rs <?php echo $packvalue->price_plus; ?></p>
					<div class="prog-btn">
					    <?php 
							echo form_open('add_cart', array('class' => 'add-to-cart-form'));
							echo form_hidden('id', $packvalue->id);
							echo form_hidden('name', $packvalue->name);
                            echo form_hidden('package_name', $package_master[0]->name.' Plus');
							echo form_hidden('program_type', 'plus');
							echo form_hidden('price', $packvalue->price_plus);
							echo form_submit(
								   array(
										'class' => 'btn btn-success',
										'value' => 'Add to Cart',
										'name' => 'action'
									)
							   );
							echo form_close();
						?>
						<!-- <a href="<?php //echo base_url('programedetails/'.$packvalue->id); ?>" class="btn btn-success" title="">Add to Cart</a> -->
						<a class="btn btn-default" style="background:#f27052; color:#fff;margin-left:5px;" href="<?php echo base_url('Packagedetails/'.$packvalue->id.'/plus'); ?>">Know More</a>
					</div>
				</div>
				<?php /*
				if(!empty($packvalue->video_link)){
				?>
				<div class="prog-btn">
					<a class="btn btn-warning btn-block" data-toggle="modal" data-target="#program_video<?php echo $packkey; ?>" title="">Video Tour</a>
				</div>
				<?php
				} */
				?>
			
			</div>
			
			
		</div>
		<?php
			}
		}else{
			echo "<center><h1>No Package is assigned.</h1></center>";
		}
		?>
		
		
		<!--<div class="col-xs-12 col-sm-4 col-md-3">-->
                            <!--    <div class="prog-img">-->
                            <!--        <a href = "#!">-->
                            <!--            <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-er.jpg'); ?>" alt = ""/>-->
                            <!--        </a>-->
                            <!--    </div>-->
                            <!--    <div class="prog-content margin-bottom">-->
                            <!--        <a class="title" href = "#!">-->
                            <!--            Employment Readiness Program-->
                            <!--        </a>-->
                            <!--        <p class="text-center nopadding">Engineering Graduates</p>-->
                            <!--        <p class="price">Program Cost : Rs 2500</p>-->

                            <!--        <div class="prog-btn">-->
                            <!--            <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal2" title="">Know More</a>-->
                            <!--        </div>-->
                            <!--    </div>-->

                            <!--</div>-->
                            <!--<div class="col-xs-12 col-sm-4 col-md-3">-->
                            <!--    <div class="prog-img">-->
                            <!--        <a href = "#!">-->
                            <!--            <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-mg.jpg'); ?>" alt = ""/>-->
                            <!--        </a>-->
                            <!--    </div>-->
                            <!--    <div class="prog-content margin-bottom">-->
                            <!--        <a class="title" href = "#!">-->
                            <!--            Employment Readiness Program-->
                            <!--        </a>-->
                            <!--        <p class="text-center nopadding">Management Graduates</p>-->
                            <!--        <p class="price">Program Cost : Rs 2500</p>-->

                            <!--        <div class="prog-btn">-->
                            <!--            <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal3" title="">Know More</a>-->
                            <!--        </div>-->
                            <!--    </div>-->

                            <!--</div>-->




                            <!--div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#! <?php //echo(base_url() . "sana-for-school"); ?>">
                                        <img class = "img-responsive" src = "<?php //echo(base_url() . 'assets/img/' . 'aptitude_devlopment_home.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        Aptitude Development Program
                                    </a>
                                    <p class="text-center nopadding"> </p>
                                    <p class="price">Program Cost : Rs 3000</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a href="#!" class="btn btn-default" title="">Know More</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#! <?php //echo(base_url() . "sana-for-school"); ?>">
                                        <img class = "img-responsive" src = "<?php //echo(base_url() . 'assets/img/' . 'mba-entrance.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        MBA Entrance Examination
                                    </a>
                                    <p class="text-center nopadding">Basic Readiness Program</p>
                                    <p class="price">Program Cost : Rs 3000</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal" title="">Know More</a>
                                    </div>
                                </div>

                            </div-->

                        </div>


    <section class="row">
        <div class="col-md-12">
                <div class="dooble-border">
                    
                        

                </div>
            </div>

            <!--Modal Section -->
                <!--Modal programs Start-->
                <?php
                    foreach($package as $packkey => $packvalue){
                        ?>
                         <div class="modal fade" id="program_modal<?php echo $packkey; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="program-owl2" class="owl-carousel program-owl">
                                            <div class="item">
                                                <img class="img-responsive" src="<?php echo(base_url($packvalue->slider_1)); ?>" >
                                            </div>
                                            <div class="item">
                                                <img class="img-responsive" src="<?php echo(base_url($packvalue->slider_2)); ?>" >
                                            </div>
                                            <div class="item">
                                                <img class="img-responsive" src="<?php echo(base_url($packvalue->slider_3)); ?>" >
                                            </div>
                                            <div class="item">
                                                <img class="img-responsive" src="<?php echo(base_url($packvalue->slider_4)); ?>" >
                                            </div>
                                            <div class="item">
                                                <img class="img-responsive" src="<?php echo(base_url($packvalue->slider_5)); ?>" >
                                            </div>
                                            <!--<div class="item">-->
                                            <!--    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide6.jpg'); ?>" >-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start for the video url link -->
                        <?php
                            if(!empty($packvalue->video_link)){
                                ?>
                                    <div class="modal fade" id="program_video<?php echo $packkey; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                    
                                                    <div id="program-owl2" class="owl-carousel program-owl">
                                                        <div class="item">
                                                            <?php echo $packvalue->video_link; ?>
                                                        </div>
                                                        <!--<div class="item">-->
                                                        <!--    <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide2.jpg'); ?>" >-->
                                                        <!--</div>-->
                                                        <!--<div class="item">-->
                                                        <!--    <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide3.jpg'); ?>" >-->
                                                        <!--</div>-->
                                                        <!--<div class="item">-->
                                                        <!--    <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide4.jpg'); ?>" >-->
                                                        <!--</div>-->
                                                        <!--<div class="item">-->
                                                        <!--    <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide5.jpg'); ?>" >-->
                                                        <!--</div>-->
                    
                                                    </div>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        
                        <!-- End of the video url link -->
                        <?php
                    }
                ?>
               
                <!-- Modal programs  end-->
                <!--Modal programs Start-->
              
                
                <!-- Modal programs  end-->

            <!--Modal programs Start-->
                <div class="modal fade" id="program_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide5.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide6.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide7.jpg'); ?>" >
                                    </div>
                                    <!--div class="item">
                                        <div class="text-center"><img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/' . 'slide8-1.jpg'); ?>" ></div>
                                        <div class="d-flex">
                                            <div style="width: 27%;">
                                                <ul class="list-group">
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Engineering Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Management Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">MBA Entrance Examination Readiness Program</a></li>
                                                </ul>
                                            </div>
                                            <div style="width: 42%; margin-left: 4rem;">
                                                    <div class="prog-img">
                                                        <a href="http://skillpromise.com/sana-for-school">
                                                            <img class="img-responsive" src="http://skillpromise.com/assets/img/aptitude_devlopment_home.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="prog-content margin-bottom">
                                                        <a class="title" href="http://skillpromise.com/sana-for-school">
                                                            Aptitude Development Program
                                                        </a>

                                                        <div class="prog-btn">
                                                            <a href="#!" class="btn btn-success" title="">Buy Now</a><span class="price">Rs 3000</span>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div-->

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->
            <!--Modal Section End-->

    </section>
	
	
<!-- Modal -->
<div id="message-boxd-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">&nbsp;</h4>
		<button type="button" class="close pull-right"  data-dismiss="modal">&times;</button>
      </div>
      <div id="message-boxd" class="modal-body">
        <p >&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script>
        let BASE_URL = "<?php echo base_url(); ?>";
	$(document).ready(function(){
	  $('.add-to-cart-form').submit(function(e){
		  var formdata = $(this).serialize();
		  e.preventDefault();
		  $.ajax({
			  url: BASE_URL+"add_cart",
			  type: 'POST',									  
			  data: formdata,
			  success: function(result){
				  if(result=='1'){
					  //alert('Item added to cart successfully.');
					  $('#message-boxd').html('<div class="alert alert-success">Item added to cart successfully.</div><a href="'+ BASE_URL +'reviewCart" class="btn pull-left" style="background:#f27052; color:#fff;margin-left:5px;">Review Cart</a><a href="'+ BASE_URL +'checkout" class="btn btn-success pull-right">Proceed to Checkout</a>');
				  }
				  else{
					  //alert('Add to cart failed.');
					  $('#message-boxd').html('<div class="alert alert-danger">Item add to cart failed.</div>');
				  }
				  $('#message-boxd-modal').modal('show');
			  }
		  });
	  });
	});
	</script>

</div>

<div class="container">

        <?php
        $this->load->view('home_footer');
        ?>
    </div>

