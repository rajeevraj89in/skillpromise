<!--news letter inner page-->

        <div class="fre_news">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">

                <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>

                <p class="textstyle text-justify">Signup for our free email newsletter and get our Art of Building Credibility e-Book FREE as the Subscription bonus</p>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">

                        <div class="col-xs-8 col-sm-8 col-md-8">


                            <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter">
                                <input id="first_name" name="first_name" class="form-control inputbox" placeholder="Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                                <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                                <div class="policy-wrap">
                                    <button type="button" id="subsc" class="bttn btn btn-primary">Subscribe</button>
                                        <p class="policy"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Privacy Policy</a></p>
                                </div>

                            </form>


                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4"><img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'newsL-img.jpg'); ?>" ></div>
                    </div>
                </div>

        </div>



</div>
<!--news letter inner end-->
<!--Modal -->
<div class = "modal fade" id = "newLetter_modal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel">
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
    $(document).ready(function () {
        $('#subsc').click(function (e) {

            var datastr = {};
            datastr['first_name'] = $('#first_name').val();
            datastr['email'] = $('#email').val();


            if (datastr['first_name'] != '' && datastr['email'] != '') {

                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url(); ?>subscribNewsLetter/",
                    data: datastr,
                    success: function (data) {
                        $('#newLetter_modal').modal('show');
                    }

                });
            }

        }
        );
    });

</script>



<!--ALTER TABLE `news_letter` CHANGE `is_mailconfirm` `is_mailconfirm` ENUM('0','1','2') NULL DEFAULT '0' COMMENT 'Pending=2,Subscribed=1 & Unsubscribed=0;';-->







