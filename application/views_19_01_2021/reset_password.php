<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">

        <title>OTP Verification Skill Promsie</title>

        <!-- Bootstrap core base_url() . 'assets/css/' -->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        
        <!--toster cdn css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/toster/build/toastr.css">
        
        <!-- Custom styles for this template -->
        <!--<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />-->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'signin.css'); ?>" />
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.md5.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.validate.min.js'); ?>"></script>
        
        <!-- toster cdn java script-->
        <script src="<?php echo base_url(); ?>assets/toster/build/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/toster/toastr.js"></script>
        <!-- toster cdn java script end-->
        
        <script> var base_url = "<?php echo base_url(); ?>";</script>
        <style>
            .error{
                color:red !important;
            }
        </style>
    </head>
    <body>
        <div class="modal fade" id="myModal"> <!-- modal div start -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <!--                        <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrap">
                        <div class="login-logo text-center"><a href="<?php echo(base_url()); ?>"><img class="logo" alt="" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>"></a></div>
                        <form class="form-signin" id="recoveryForm" method="POST" action="<?php echo base_url('reset_account'); ?>">
                            <h2 class="form-signin-heading">Please Enter Password</h2>
                            <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" required autofocus><br>
                            <input type="password" id="password2" name="password2" class="form-control" autocomplete="off" placeholder="Re-Enter Password"><br>
                            <input type="submit" class="btn btn-green btn-block" value="submit" name='submit'><br>
                        </form>
                    </div>
                </div>

            </div>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
<script>
<?php
if ($_SESSION['msg_str'] != "") {
    echo "$(document).ready(function () {"
    . "$('#myModal').find('.modal-title').text('Alert !');"
    . "$('#myModal').find('.modal-body').text('" . $_SESSION['msg_str'] . "');"
    . "$('#myModal').modal('show');"
    . " });";
    $_SESSION['msg_str'] = "";
}
?>
// mailer function written by shubham kr das //
    $(document).ready(function () {//form validation
        $("#recoveryForm").validate({
            rules: {
                password : {
                    minlength : 8
                },
                password2 : {
                    minlength : 8,
                    equalTo : "#password"
                }
            },
            // messages: {
            //     password: "Plese Enter Password",
            //     password2: "Plese Enter Same Password",
            // },
//           focusCleanup: true,
//            invalidHandler: function("#loginForm", "pwd") {$("#pwd").val(""); },
            submitHandler: function (form) {
                form.submit();
                //return false;
            }
        });
    });
// end of mailer function //

</script>
