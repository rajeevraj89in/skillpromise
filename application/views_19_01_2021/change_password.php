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

        <title>:: Skill Promise Change Password::</title>

        <!-- Bootstrap core base_url() . 'assets/css/' -->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'signin.css'); ?>" />
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.md5.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.validate.min.js'); ?>"></script>

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
            <form method="post" class="form-signin" id="changePwd" role="form" action="<?php echo base_url() . 'do_password_change'; ?>" >
                <h2 class="form-signin-heading">Change Password</h2>
                <input id="old_pwd" type="password" name="old_pwd" class="form-control" pattern=".{6,20}" placeholder="Old Password" size="20" maxlength="20" minlength="6" title="Enter old password between 6 to 20 Characters." required autofocus>
                <input id="new_pwd" type="password" name="new_pwd" class="form-control" pattern=".{6,20}" placeholder="New Password" size="20" maxlength="20" minlength="6" title="Enter New password between 6 to 20 Characters." required>
                <input id="cng_pwd" type="password" name="cng_pwd" class="form-control" pattern=".{6,20}" placeholder="Confirm Password" size="20" maxlength="20" minlength="6" title="Confirm new password between 6 to 20 Characters." required>
                <div class="col-md-offset-1"></div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
            </form>
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
        $("#old_pwd").val($.md5($("#old_pwd").val(), false));
        $("#new_pwd").val($.md5($("#new_pwd").val(), false));
        $("#cng_pwd").val($.md5($("#cng_pwd").val(), false));
        return true;
    }


//    $(document).ready(function () {//form validation
//
//
//        $("#changePwd").validate({
//            rules: {old_pwd: {required: true, minlength: 6},
//                new_pwd: {required: true, minlength: 6},
//                cng_pwd: {required: true, equalTo: "#new_pwd", minlength: 6}
//            },
//            messages: {
//                old_pwd: "Please enter valid old password.",
//                new_pwd: "Please enter valid new password.",
//                cng_pwd: "Please enter matching password.",
////                    required: "Please enter matching password.",
////                    equalTo: "Password Mismach. !",
//            },
//            focusInvalid: true,
////            focusCleanup: true,
//            submitHandler: function (form) {
//                convert_md5();
//                form.submit();
//            }
//        });
//    });

    $("#changePwd").submit(function (evt) {
        if ($("#new_pwd").val() == $("#cng_pwd").val()) {
            convert_md5();
            return true;
        } else {
            $("#new_pwd").val("");
            $("#cng_pwd").val("");
            $('#myModal').find('.modal-title').text('Alert !');
            $('#myModal').find('.modal-body').text('"New Passwords did not match. Please Re-enter New Passwords. "');
            $('#myModal').modal('show');
            evt.preventDefault();
            return false;
        }

    });



</script>
