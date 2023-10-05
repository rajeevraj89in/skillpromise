<?php
$this->load->view('home_header_view');
$this->load->library('cart');
?>


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
                                    <td class="text-right"><?= $this->cart->total_items(); ?></td>
                                </tr>
                                <tr>
                                    <td class="no-border">Cost</td>
                                    <td class="no-border text-right">INR <?= $this->cart->total() + (($this->cart->total() / 100) * 18); ?></td>
                                </tr>
                            </table>
                        </div>
<!--                        <p class="text-center">

                            <button class="btn btn-warning">Proceed to Checkout</button></p>-->

                    </div>
                </div>
                <!--cart page end-->

                <?php $this->load->view('ProgramSideView'); ?>



            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Checkout</h1>
                </div>


                <div class="checkout"> 
                        <p><strong>Your Details - 1 of 3</strong></p>
                        <div class="row">
                            <form>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required sr-only" for="select"></label>
                                        <select class="form-control">
                                            <option value="">Enquiry Type </option>
                                            <option value="">I need some Information</option>
                                            <option value="">I seek permission to reproduce some content</option>
                                            <option value="">I want to report an error in the content</option>
                                            <option value="">I want to report a technical problem</option>
                       <option value="">I would like to write an Article for Blog</option>
                                            <option value="">I would like to advertise with Skillpromise.com</option>
                                            <option value="">I want to enquire about a corporate tie up</option>
                                            <option value="">I want to enquire about an institutional tie up</option>
                    
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Name"></label>
                                        <input id="name" type="text" placeholder="Name" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="email"></label>
                                        <input id="email" type="text" placeholder="Email" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Phone"></label>
                                        <input id="phone" type="text" placeholder="Phone" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control pdt20" id="textarea" name="textarea" rows="4" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <button class="btn btn-success btn-sm ">Send message</button>
                                </div>
                            </form>
                        </div>
                </div>
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>