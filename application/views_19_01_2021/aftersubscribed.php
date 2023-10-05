<?php $this->load->view('home_header_view'); ?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">

            <section class="col-md-12" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Thank You</h1>
                </div>

                <div class="text-justify">
                    <span>
                        You have successfully subscribed to our Email Newsletter. We request you to Share your role in order to receive customized communication from us:

                    </span><br>


                    <form action="#" id="thankyouform">

                        <div class="input-group col">
                            <input value="school student" id="role_radiio1" class="radioBtnClass" type="radio" name="role"/> &nbsp;School Student<br>
                            <input value="higher education student"  id="role_radiio2" class="radioBtnClass" type="radio" name="role" checked=""/> &nbsp;Higher Education Student<br>
                            <input value="school teacher"  id="role_radiio3" class="radioBtnClass" type="radio" name="role"/> &nbsp;School Teacher<br>
                            <input value="college professor"  id="role_radiio4" class="radioBtnClass" type="radio"  name="role"/> &nbsp;College Professor<br>
                            <input value="first job seeker"  id="role_radiio5" class="radioBtnClass" type="radio" name="role"/>&nbsp;First Job Seeker<br>
                            <input value="management professional"  id="role_radiio6" class="radioBtnClass" type="radio" name="role"/> &nbsp;Management Professional<br>
                            <input value="leadership professional"  id="role_radiio7" class="radioBtnClass" type="radio" name="role"/> &nbsp;Leadership Professional<br>
                            <input value="college director"  id="role_radiio8" class="radioBtnClass" type="radio" name="role"/> &nbsp;College Director<br>
                            <input value="college vice chancellor"  id="role_radiio9" class="radioBtnClass" type="radio" name="role"/> &nbsp;College Vice Chancellor<br><br>
                            <br>


                        </div>

                        <div class="input-group">
                            <a download href="<?php echo base_url(); ?>assets/Art of Building Credibility e-Book.pdf">&nbsp;<button type="button" id="sub" class="bttn btn btn-sm btn-primary">Download your Art of Building Credibility e-Book</button></a>

                        </div>

                    </form>

                    <br><br>

 Please spare some time to check our programs, that are relevant to you:<br><br>
                    <ul>
                       

                       <!-- <li class="">
                            <a href="http://skillpromise.lexiconcpl.com/dev/sana-for-higher">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                        </li>
                        <li class="">
                            <a href="http://skillpromise.lexiconcpl.com/dev/sana-for-professionals">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                        </li>
                        <li class="">
                            <a href="http://skillpromise.lexiconcpl.com/dev/sana-for-school">Self Assessment and Development Need Analysis (SANA) for School Students</a>
                        </li>-->
                        <li class="">
                            <a href="http://skillpromise.lexiconcpl.com/dev/sana-for-school">Aptitude Development Program</a>
                        </li>
                        
                    </ul>

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

