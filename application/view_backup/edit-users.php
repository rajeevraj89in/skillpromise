<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit User</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/users'; ?>" method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?> ">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $name; ?>" placeholder="User Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="address" name="address" placeholder="User Address"><?php echo $address; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" value = "<?php echo $email; ?>" placeholder="User Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="mobile" name="mobile" value = "<?php echo $mobile; ?>" placeholder="User Mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label for="age" class="col-sm-3 control-label">Age</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="age" name="age" value = "<?php echo $age; ?>" placeholder="User Age" min="13" max="120" value="20">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="Male" value="Male"  <?php
                            if (($gender) == 'Male') {
                                echo 'checked';
                            }
                            ?>> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="Female" value="Female" <?php
                            if (($gender) == 'Female') {
                                echo 'checked';
                            }
                            ?>> Female
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Photograph</label>
                    <div class="col-sm-9">
                        <img height="75px" width="75px" src="<?php
                        echo (base_url() . 'assets/img/' . 'uploads/users/');
                        if (empty($image_file)) {
                            echo 'no-image.jpg';
                        } else {
                            echo $image_file;
                        }
                        ?>"/>

                    </div>
                </div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>

                <?php
                if ($_SESSION['role_name'] == "Super Admin") {
                    echo '<div class="form-group">'
                    . '<label for="selectRole" class="col-sm-3 control-label">Select Role</label>'
                    . '<div class="col-sm-9">'
                    . '<select class="form-control" id="selectRole" name="role" required="true">'
                    . $this->main_model->fill_select('roles', 'name', $role)
                    . " </select>"
                    . "</div>"
                    . "</div>";
                } else {
                    echo '<input type="hidden" name="role" value = "' . $role . '">';
                }
                ?>

                <div class="form-group">
                    <label for="selectRole" class="col-sm-3 control-label">Select Package</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="" name="packages">
                            <?php echo $this->main_model->fill_select('packages', 'name', $packages); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active"  <?php
                            if (($status) == 'Active') {
                                echo 'checked';
                            }
                            ?>> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive" <?php
                            if (($status) == 'Inactive') {
                                echo 'checked';
                            }
                            ?>> Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->


<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>