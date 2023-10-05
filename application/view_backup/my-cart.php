<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">

            <!--cart page-->
            <div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Cart Summary</h4>
                <div class="cart-inner">
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                            <td>Program (s)</td>
                            <td class="text-right">1</td>
                        </tr>
                        <tr>
                            <td class="no-border">Cost</td>
                            <td class="no-border text-right">INR 999</td>
                        </tr>
                      </table>
                    </div>
                    <p class="text-center"><button class="btn btn-warning">Proceed to Checkout</button></p>
                     
                </div>
            </div>
            <!--cart page end-->

            <!--program menu start -->
            <div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Programs</h4>
                <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for School Students</a>
                    </li> 
                </ul>
                </div>

                

            </aside>


            
            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                        <h1 class="header_text">My Cart</h1>
                </div> 


                <div class="text-justify">
                     <div class="table-responsive">
                      <table class="table">
                        <tr style="background: #8abd54; color: #fff;">
                            <th>Program Name</th>
                            <th class="text-center">Cost INR</th>
                        </tr>
                        <tr>
                            <td class="no-border">Self Assessment & Development Need Analysis (SANA) for School Students</td>
                            <td class="no-border text-center">999</td>
                        </tr>
                        <tr>
                            <td class="no-border bold">Subtotal</td>
                            <td class="no-border text-center">999</td>
                        </tr>
                        <tr>
                            <td class="no-border">GST @ 18%</td>
                            <td class="no-border text-center">180</td>
                        </tr>
                        <tr style="font-size: 16px;">
                            <td class="bold border-bottom">Total</td>
                            <td class="bold text-center border-bottom">1180</td>
                        </tr>
                      </table>
                    </div>
                    
                    <br><br>
                    <div class="row">
                         <div class="col-md-6 text-left margin-bottom"><a href="<?php echo(base_url() . "sana-for-school"); ?>" class="btn btn-warning">Explore more Programs</a></div> 
                         <div class="col-md-6 text-right margin-bottom"><a href="#!" class="btn btn-warning">Proceed to Checkout</a></div>  
                     </div>
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>