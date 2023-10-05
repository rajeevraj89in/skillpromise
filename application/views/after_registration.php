<?php
$this->load->view('home_header_view');
?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">

            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Thank You!</h1>
                </div>

                <div class="text-justify">
                    <p>
                        You have successfully Registered on Skillpromise.com<br><br>
                        Click on the Link below to download the ‘Art of Building Credibility e-Book
                    </p>
                    <div class="input-group">

                        <a download href="<?php echo base_url() . 'assets/Art of Building Credibility e-Book.pdf' ?>">&nbsp;<button type="button" id="sub" class="bttn btn btn-primary"><b>Download</b></button></a>
                    </div>
                    <br><br><p>
                        Click on the Link below to access your Programs
                    </p>
                    <div class="input-group">
                        <a href="<?php echo base_url() . 'login_handler/' . $user_id; ?>">&nbsp;<button type="button" id="sub" class="bttn btn btn-primary"><b>Start Program</b></button></a>

                    </div>
                </div>
            </section><!-- end col-md-9 -->

        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>



<script>
    $(document).ready(function () {

        var t = '<?php echo $chec; ?>';

        $('#sub').click(function (e) {

            if ($("input[type='radio'].radioBtnClass").is(':checked')) {
                var checked_val = $("input[type='radio'].radioBtnClass:checked").val();
                var dataString = {};
                dataString['cat'] = checked_val;
                dataString['id'] = t;

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>/category",
                    data: dataString,
                    success: function (data) {



                    }

                });


            }


        }
        );
    });

</script>

