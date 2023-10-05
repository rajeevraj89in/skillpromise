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

        <title>:: Skill Promise Sign In::</title>

        <!-- Bootstrap core base_url() . 'assets/css/' -->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />

        <!-- Custom styles for this template -->
        <!--<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />-->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'signin.css'); ?>" />
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.md5.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.validate.min.js'); ?>"></script>
        <script> var base_url = "<?php echo base_url(); ?>";</script>

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
                        <form method="post" class="form-signin" id="loginForm" role="form" action="<?php echo base_url() . 'login_handler'; ?>">

                            <h2 class="form-signin-heading">Please sign in</h2>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                            <input id="pwd" type="password" name="pwd" class="form-control" placeholder="Password" size="20" required>
                            <button class="btn btn-green btn-block" type="submit">Sign in</button>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <!--check box-->
                                    <label class="checkbox check-custom">
                                        <input type="checkbox" value="remember-me"> Remember Me
                                        <span class="checkmark"></span>
                                    </label>
                                    <!--check box end-->
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <br><br>
                                    <a class="pull-right" href="<?php echo base_url('forgotpassowrd'); ?>">Forgot Password?</a>
                                </div>
                            </div>
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

    function convert_md5() {
        $("#pwd").val($.md5($("#pwd").val(), false));
        return true;
    }


    $(document).ready(function () {//form validation
        $("#loginForm").validate({
            rules: {
//                email: {required: true, email: true},
                email: {required: true},
                pwd: {required: true, minlength: 6},
            },
            messages: {
                email: "Please enter valid UserID.",
                pwd: "Please enter valid password.",
            },
//            focusCleanup: true,
//            invalidHandler: function("#loginForm", "pwd") {$("#pwd").val(""); },
            submitHandler: function (form) {
                convert_md5();
                form.submit();
            }
        });
    });




</script>
