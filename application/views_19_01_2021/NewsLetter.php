<!--news letter inner page-->
<div id="newsletter">

    <div class="dooble-border">

        <div class="well fre_news" style="margin-left: 0;">
            <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>


            <div class="row">
                <div class="col-md-9" style=" padding: 0 6px 0 15px;">
                    <div class="input-group">
                        <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                            <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                            <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                            <button type="submit" class="bttn btn btn-primary inputbox">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 8px 9px 0 0;">
                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" >
                </div>
            </div>

            <p class="textstyle">Signup for our free email newsletter and get our Art of Building Credibility e-Book FREE as the Subscription bonus<br><br><small class="text-right block"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Our Privacy Policy</a></small></p>
            <!-- /.input-group -->
        </div>
    </div>

</div>
<!--news letter inner end-->