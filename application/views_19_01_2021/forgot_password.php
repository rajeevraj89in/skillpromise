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

        <title>Account Recovery</title>

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
                        <form class="form-signin" method="POST" action="<?php echo base_url('recover_password'); ?>" id="recoveryForm">
                            <h2 class="form-signin-heading">Please Enter Email</h2>
                            <input type="email" id="email" name="email" class="form-control" autocomplete="off" placeholder="Email address" required autofocus><br>
                            <input type="submit" class="btn btn-green btn-block" value="submit" name='submit'><br>
                            <a class="btn btn-green btn-block" href="<?php echo base_url('signin'); ?>">Back to Login</a>
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
                email: {required: true},
            },
            messages: {
                email: "Please enter valid UserID.",
            },
//           focusCleanup: true,
//            invalidHandler: function("#loginForm", "pwd") {$("#pwd").val(""); },
            submitHandler: function (form) {
                form.submit();
                //return false;
            }
        });
        
        // $('#recoveryForm').on('submit', function (e) {
        //   e.preventDefault();
        //   if ($("#recoveryForm").valid()){
        //     // alert("Temprory forgot password will disabled");
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php echo base_url('recover_password'); ?>",
        //         data: $('#recoveryForm').serialize(),
        //         success: function(response){
        //             console.log(response);
        //             if(response == 0){
        //                 Command: toastr["error"]("No Email Found !")

        //                 toastr.options = {
        //                   "closeButton": false,
        //                   "debug": false,
        //                   "newestOnTop": false,
        //                   "progressBar": false,
        //                   "positionClass": "toast-top-right",
        //                   "preventDuplicates": true,
        //                   "onclick": null,
        //                   "showDuration": "300",
        //                   "hideDuration": "1000",
        //                   "timeOut": "5000",
        //                   "extendedTimeOut": "1000",
        //                   "showEasing": "swing",
        //                   "hideEasing": "linear",
        //                   "showMethod": "fadeIn",
        //                   "hideMethod": "fadeOut"
        //                 }
        //             }else if(response == 1){
        //                 window.location="<?php echo base_url('otp_verification'); ?>";
                        
                        
        //             }else{
        //                 console.log(response);
        //             }
        //         },
        //     });
        //   }

        // });
    });
// end of mailer function //

</script>
