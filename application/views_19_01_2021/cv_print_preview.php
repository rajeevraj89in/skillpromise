<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<style type="text/css">
    table.main td{ font-size: 14px; }
    table.main ul li{ font-size: 14px; }
    table.main p{ font-size: 14px; }
</style>

<div style="width: 1024px; margin:0 auto; font-family: arial; font-size: 14px;">
    <center>
        <?php
          if(!empty($photo_path)){
            ?>
            <img style="height: auto; width: 15%;" src="<?php echo base_url($photo_path); ?>">
            <?php
          }else{
            ?>
            <img style="height: auto; width: 15%;" src="<?php echo base_url('assets/cv_photo/no_image.png'); ?>">
            <?php
          }
        ?>
    </center>
    <table class="main" style="font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <table class="headig" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <!--<h2>Curriculum Vitae</h2><hr><br>-->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td valign="top">
                <table class="headig" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td align="left">
                            
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width='100%'>
                            <h2><?php echo $name; ?></h2>
                            <p><strong>Mobile :</strong>&nbsp;<?php echo $mobile; ?><br>
                               <strong>Email :</strong>&nbsp;<?php echo $email; ?>
                            </p>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--Row -->
        <?php if (isset($candidate_type) && ($candidate_type != '')) { ?>

            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;"><?php echo ((isset($candidate_type) && ($candidate_type == 'Experienced')) ? "Professional Snapshot" : "Career Objective") ?></h3>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <?php
                                if ((isset($candidate_data_type) && ($candidate_data_type == 'paragraph'))) {
                                    echo '<p>' . ((isset($paragraph_data)) ? $paragraph_data : "") . '</p>';
                                } else {
                                    echo '<ul style="margin: 12px 0 0; padding: 0 17px;">';
                                    if (!empty($obj_data)) {
                                        foreach ($obj_data as $v) {
                                            echo '<li>' . $v['data'] . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                                ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>
        <!--Row ends-->
        <!--Row -->
        <?php if (isset($work_exp) && ($work_exp == '1')) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Work Experience</h3>
                            </td>
                        </tr>
                        <?php
                        if (!empty($workexp)) {
                            foreach ($workexp as $k => $v) {
                                echo '<tr>
                            <td>
                                <table width="100%" cellpadding="4" cellspacing="0" border="0">
                                    <tr>
                                        <td><strong>Name of the Organization:</strong> ' . $v['org'] . '</td>
                                        <td><strong>Duration: </strong>' . $v['duration'] . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Designation:</strong> ' . $v['designation'] . '</td>
                                        <td><strong>Location:</strong> ' . $v['loc'] . '</td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>';



                                if (!empty($v['Responsibility'])) {
                                    echo '<tr>
                            <td>
                                <h6 style="margin: 15px 0; font-size:15px"><strong>Key Responsibilities</strong></h6>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">';
                                    foreach ($v['Responsibility'] as $val) {
                                        echo '<li>' . $val['data'] . '</li>';
                                    }
                                    echo '</ul>
                </td>
            </tr>';
                                }
                                if (!empty($v['Achievement'])) {
                                    echo '<tr>
                            <td>
                                <h6 style="margin: 15px 0; font-size:15px"><strong>Achievements</strong></h6>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">';
                                    foreach ($v['Achievement'] as $val) {
                                        echo '<li>' . $val['data'] . '</li>';
                                    }
                                    echo '</ul><br><br>
                </td>
            </tr>';
                                }
                            }
                        }
                        ?>


                    </table>
                </td>
            </tr>
        <?php } ?>
        <!--Row ends-->
        <!--Row -->
        <?php if (isset($internship) && ($internship == '1')) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Internships</h3>
                            </td>
                        </tr>
                        <?php
                        if (!empty($int)) {
                            foreach ($int as $keys => $values) {
                                echo '<tr>
                            <td>
                                <table width="100%" cellpadding="4" cellspacing="0" border="0">
                                    <tr>
                                        <td><strong>Name of the Organization:</strong> ' . $values['org'] . '</td>
                                        <td><strong>Duration: </strong>' . $values['duration'] . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Designation:</strong> ' . $values['designation'] . '</td>
                                        <td><strong>Location:</strong> ' . $values['loc'] . '</td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>';



                                if (!empty($values['Responsibility'])) {
                                    echo '<tr>
                            <td>
                                <h6 style="margin: 15px 0; font-size:15px"><strong>Key Responsibilities</strong></h6>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">';
                                    foreach ($values['Responsibility'] as $vals) {
                                        echo '<li>' . $vals['data'] . '</li>';
                                    }
                                    echo '</ul>
                </td>
            </tr>';
                                }
                                if (!empty($values['Achievement'])) {
                                    echo '<tr>
                            <td>
                                <h6 style="margin: 15px 0; font-size:15px"><strong>Achievements</strong></h6>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">';
                                    foreach ($values['Achievement'] as $vals) {
                                        echo '<li>' . $vals['data'] . '</li>';
                                    }
                                    echo '</ul><br><br>
                </td>
            </tr>';
                                }
                            }
                        }
                        ?>


                    </table>
                </td>
            </tr>
        <?php } ?>

        <?php if (!empty($edu)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Education</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">
                                    <?php echo ((!empty($edu) && $edu['doc'] != "") ? "<li>" . $edu['doc'] . "</li>" : ""); ?>
                                    <?php echo ((!empty($edu) && $edu['pg'] != "") ? "<li>" . $edu['pg'] . "</li>" : ""); ?>
                                    <?php echo ((!empty($edu) && $edu['graduation'] != "") ? "<li>" . $edu['graduation'] . "</li>" : ""); ?>
                                    <?php echo ((!empty($edu) && $edu['xiith'] != "") ? "<li>" . $edu['xiith'] . "</li>" : ""); ?>
                                    <?php echo ((!empty($edu) && $edu['xth'] != "") ? "<li>" . $edu['xth'] . "</li>" : ""); ?>

                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>



        <?php if (!empty($proenc)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Professional Enhancements</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">
                                    <?php
                                    foreach ($proenc as $v) {
                                        echo '<li>' . $v['data'] . '</li>';
                                    }
                                    ?>

                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>


        <?php if (!empty($lang)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Languages Known</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">
                                    <?php
                                    foreach ($lang as $v) {
                                        echo '<li>' . $v['data'] . '</li>';
                                    }
                                    ?>

                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>


        <?php if (!empty($compskill)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Computer Skills</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">
                                    <?php
                                    foreach ($compskill as $v) {
                                        echo '<li>' . $v['data'] . '</li>';
                                    }
                                    ?>

                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>



        <?php if (!empty($hobby)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Hobbies</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="margin: 12px 0 0; padding: 0 17px;">
                                    <?php
                                    foreach ($hobby as $v) {
                                        echo '<li>' . $v['data'] . '</li>';
                                    }
                                    ?>

                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>


        <?php if (!empty($ach)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Achievements and Awards</h3>
                            </td>
                        </tr>
                        <tr>
                          <td>
                              <ul style="margin: 12px 0 0; padding: 0 17px;">
                        <?php
                        if (!empty($ach['Academics'])) {
                            foreach ($ach['Academics'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                        }



                        if (!empty($ach['Sports'])) {
                            foreach ($ach['Sports'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                        }

                        if (!empty($ach['pos_res'])) {
                            
                            foreach ($ach['pos_res'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                        }


                        if (!empty($ach['ex_act'])) {

                            foreach ($ach['ex_act'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                        }

                        if (!empty($ach['Social'])) {

                            
                            foreach ($ach['Social'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                            
                        }

                        if (!empty($ach['Spiritual'])) {

                            foreach ($ach['Spiritual'] as $v) {
                                echo '<li>' . $v['data'] . '</li>';
                            }
                        }
                        ?>
                        </ul>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>



        <?php if (!empty($per_detail)) { ?>
            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="1" cellspacing="1" border="0">
                        <tr>
                            <td colspan="3">
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">Personal Dossier</h3>
                            </td>
                        </tr>
                        <?php
                        if ($per_detail['dob'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Date of Birth</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['dob'] . '</td>
                        </tr>';


                        if ($per_detail['fname'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Father' . "'" . ' Name</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['fname'] . '</td>
                        </tr>';

                        if ($per_detail['address'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Address</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['address'] . '</td>
                        </tr>';

                        if ($per_detail['nationality'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Nationality</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['nationality'] . '</td>
                        </tr>';


                        if ($per_detail['sex'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Sex</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['sex'] . '</td>
                        </tr>';

                        if ($per_detail['maritial_status'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Marital Status</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['maritial_status'] . '</td>
                        </tr>';

                        if ($per_detail['linkedin'] != "")
                            echo '<tr>
                            <td width="20%"><strong>Linkedin Address</strong></td>
                            <td>:</td>
                            <td>' . $per_detail['linkedin'] . '</td>
                        </tr>';
                        ?>


                    </table>
                </td>
            </tr>
        <?php } ?>



        <?php
        if (isset($reference) && $reference != "") {
            ?>

            <tr>
                <td>
                    <table class="content" width="100%" cellpadding="1" cellspacing="1" border="0">
                        <tr>
                            <td colspan="3">
                                <h3 style="width: 100%; font-size: 18px; font-weight: 700; border-bottom: 1px solid #000; margin: 36px 0 10px; padding: 0 0 14px;">References</h3>
                            </td>
                        </tr>

                        <?php
                        if ((isset($reference) && ($reference == 'Not Asked'))) {
                            echo '<tr>

                            <td colspan="3">';
                            echo '<p>' . ((isset($req_detail) && $req_detail != "") ? $req_detail : "Available On Request") . '</p>';

                            echo '</td>
                        </tr>';
                        } else {

                            if (isset($reff) && $reff['name'] != "")
                                echo '<tr>
                            <td width="20%"><strong>Name</strong></td>
                            <td>:</td>
                            <td>' . $reff['name'] . '</td>
                            </tr>';

                            if (isset($reff) && $reff['org'] != "")
                                echo '<tr>
                            <td width="20%"><strong>Organisation</strong></td>
                            <td>:</td>
                            <td>' . $reff['org'] . '</td>
                            </tr>';
                            if (isset($reff) && $reff['designation'] != "")
                                echo '<tr>
                            <td width="20%"><strong>Designation</strong></td>
                            <td>:</td>
                            <td>' . $reff['designation'] . '</td>
                            </tr>';

                            if (isset($reff) && $reff['mobile'] != "")
                                echo '<tr>
                            <td width="20%"><strong>Mobile</strong></td>
                            <td>:</td>
                            <td>' . $reff['mobile'] . '</td>
                            </tr>';

                            if (isset($reff) && $reff['email'] != "")
                                echo '<tr>
                            <td width="20%"><strong>Email</strong></td>
                            <td>:</td>
                            <td>' . $reff['email'] . '</td>
                            </tr>';
                        }
                        ?>


                    </table>
                </td>
            </tr>
        <?php } ?>

    </table>
    <center>
        <br>
        <a href="<?php echo base_url('printPdf'); ?>" id="downloadpdf" class="btn btn-success">Download as PDF</a>&nbsp;
        <a href="<?php echo base_url('cv_edit'); ?>" id="" class="btn btn-success">Edit CV</a>&nbsp;
        <!--<button class="btn btn-success" id="printing_button" onclick="printl()">Print</button>&nbsp;--><a class=" btn btn-danger" id="print_cancel" href="<?php echo base_url() ?>">Back</a>
        <br>
    </center><br><br>
</div>

<script>
    function printl()
	{
		var printButton = document.getElementById("printing_button");
		var print_cancel = document.getElementById('print_cancel');
		var downloadpdf = document.getElementById('downloadpdf');

		print_cancel.style.visibility = 'hidden';
		printButton.style.visibility = 'hidden';
		downloadpdf.style.visibility = 'hidden';
  		window.print();
  		printButton.style.visibility = 'visible';
  		print_cancel.style.visibility = 'visible';
  		downloadpdf.style.visibility = 'visible';

	}
</script>