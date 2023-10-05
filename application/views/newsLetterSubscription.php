<!--news letter inner page-->

        <div class="" >
                                            <h3 id="free_news" style="border:1px solid green;padding:3% 5% 3% 5%;width:100%;font-size:20px;height:43px;background-color:green;color:white;text-align:center;margin:0%">FREE Email Newsletter </h3>
            <div class="row">

              <div class="col-xs-8 col-sm-8 col-md-8">



                <p class="textstyle text-justify" style="font-size:14px;">Signup for our free email newsletter and get our <span style="color:orange;">ART OF BUILDING CREDIBILITY e-BOOK  </span> FREE as a subscription bonus</p>
                 <form action="<?php echo base_url() . 'subscribNewsLetter'; ?>" method="POST" class="" source="email" name="form">
                                    <!--<input type="hidden" id="siteId" name="siteId" value="680585">-->
                                    <!--<input type="hidden" id="pageId" name="pageId" value="680593">-->
                                    <div class="form-group">
                                        <input type="text" placeholder="Name" id="name-b360" name="first_name"
                                            class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email-b360" name="email"
                                            class="form-control" required="">
                                    </div>
                                    <div class="form-submit">
                                        <!--<a href="#" class="glb-btn">Subscribe</a>-->
                                         <button type="submit" class="glb-btn">Subscribe</button>
                                        <a href="<?php echo(base_url() . "privacy-policy"); ?>" class="reverse-btn">Privacy Policy</a>
                                        <input type="submit" value="submit" class="u-form-control-hidden d-none">
                                    </div>
                                </form>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                            <!--<img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/' . 'newsL-img.jpg'); ?>" >-->
                            
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'home-email-subscribe-image.png'); ?>" style="height:209px;width:100%;margin-top:11%;">
                       
                            </div>

            <!--<div class="col-xs-12 col-sm-12 col-md-12">-->
            <!--        <div class="row">-->

            <!--            <div class="col-xs-8 col-sm-8 col-md-8">-->


                            


            <!--            </div>-->
                        
            <!--        </div>-->
            <!--    </div>-->

        </div>



</div>
<!--news letter inner end-->
<!--Modal -->
<div class = "modal fade" id = "newLetter_modal"   data-backdrop="static" data-keyboard="false">
    <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <!--h4 class = "modal-title" id = "myModalLabel">Modal title</h4-->
            </div>
            <div class = "modal-body">
                <div class = "row">
                    <div class = "col-md-8">
                        <h4>Thank you for subscribing to our Email Newsletter. Please follow the following steps to complete your signup process:</h4>
                        <ul class = "custom">
                            <li>Check for our Email in your Inbox and in case it is not there, check your Spam folder.</li>
                            <li>Click the link “Confirm” in the Email that you will receive from us.</li>
                            <li>Download your Art of Building e-Book.</li>



                        </ul>
                    </div>
                    <div class = "col-md-4">
                        <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" ><br>

                    </div>
                </div>
            </div>
            <!--div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
            <button type = "button" class = "btn btn-primary">Save changes</button>
            </div-->
        </div>
    </div>
</div>
<!--Modal end-->



 <script>
//     $(document).ready(function () {
//         $('#subsc').click(function (e) {

//             var datastr = {};
//             datastr['first_name'] = $('#first_name').val();
//             datastr['email'] = $('#email').val();


//             if (datastr['first_name'] != '' && datastr['email'] != '') {

//                 $.ajax({

//                     type: "POST",
//                     url: "<?php echo base_url(); ?>subscribNewsLetter/",
//                     data: datastr,
//                     success: function (data) {
//                         $('#newLetter_modal').modal('show');
//                     }

//                 });
//             }

//         }
//         );
//     });
// // $('#newLetter_modal').modal({
// //     backdrop: 'static',
// //     keyboard: false
// // })
// </script>



<!--ALTER TABLE `news_letter` CHANGE `is_mailconfirm` `is_mailconfirm` ENUM('0','1','2') NULL DEFAULT '0' COMMENT 'Pending=2,Subscribed=1 & Unsubscribed=0;';-->







