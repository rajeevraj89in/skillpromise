<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add User</h1>
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

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="address" name="address" placeholder="User Address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="User Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="User Mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label for="age" class="col-sm-3 control-label">Age</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="age" name="age" placeholder="User Age" min="13" max="120" value="20">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="male" value="Male" checked> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="female" value="Female"> Female
                        </label>
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
                    . '<select class="form-control" id="selectRole" name="role" onchange="add_role()" required="true">'
                    . $this->main_model->fill_select('roles', 'name')
                    . " </select>"
                    . "</div>"
                    . "</div>";
                } else {
                    echo '<input type="hidden" name="role" value = "1">';
                }
                ?>
                <!--                <div id="add_newrole" class="form-group hidden">
                                    <label class="col-sm-3 control-label">Add Permission</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio"  id="all_programs" name="programs" checked> By Programs
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="custom" name="programs" > By Sub-programs
                                        </label>
                                    </div>
                                </div>
                                <div id="node_details">


                                </div>
                                <div id="subnode_details">


                                </div>                -->
                <div class="form-group">
                    <label for="selectRole" class="col-sm-3 control-label">Select Package</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="" name="packages">
                            <?php echo $this->main_model->fill_select('packages', 'name'); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Add</button>
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
<script>

    var node_value = '<div class="form-group" id = "progame_div">'
            + '<label class="col-sm-3 control-label">Programe List</label>'
            + '<div class="col-sm-9">'
            + '<input type="hidden" name="child_table" value = "user-node">'
            + '<input type="hidden" name="foreign_id" value = "users">'
            + '  <?php
$filter_fields[0]['id'] = 'parent_id';
$filter_fields[0]['value'] = 0;
$filter_fields[1]['id'] = 'type';
$filter_fields[1]['value'] = 'Module';
$request_fields = array('id', 'name');
$node_details = $this->main_model->get_many_records('node', $filter_fields, $request_fields);
//var_dump($node_details);die;

foreach ($node_details as $key => $row) {

    echo '<label class="radio-inline col-md-3">';
    echo ' <input  type="checkbox" name="children[' . ($key + 1) . '][node]" id="Active" value="' . $row['id'] . '">' . $row['name'];
    echo ' </label>';
}
?> ';
    +'</div>';

    //alert('hii');

    var sub_node = '<div class="row select_nodes" id="sub">'
            + '<input type="hidden" name="child_table" value = "user-node">'
            + '<input type="hidden" name="foreign_id" value = "users">'
            + '<label for="" class="col-sm-6 control-label">Select Sub Programs for permission</label>'
            + '<div class="col-md-12">'
            + '<div id ="select_level_outer">'
            + '<div class="form-group space-bootom level-div" id="leveldiv" style="display:none">'
            + '<label for="" class="col-sm-3 control-label"></label>'
            + '            <div class="col-sm-9">'
            + '                <select class="form-control node-select">'

            + '                </select>'
            + '</div>'
            + '</div>'
            + '<div class="form-group space-bootom level-div1" id="leveldiv1">'
            + '<label for="" class="col-sm-3 control-label">Level-1</label>'
            + '<div class="col-sm-9">'
            + '<select class="form-control node-select" id="level1" name="node">'
            + '<?php echo $this->main_model->fill_node_select(); ?>';
    +'</select>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>';

    function add_role() {
        //$("#add_newrole").empty();
        if ($('#selectRole').val() == '2') {
            $("#add_newrole").removeClass('hidden');
            $('#node_details').html(node_value);
            //alert('h1');
        } else {
            $("#add_newrole").addClass('hidden');
            //alert('h2');
            $('#progame_div').remove();
            $('#sub').remove();
        }
    }

    $(document).ready(function () {
        $('input:radio[name=programs]').change(
                function () {
                    if ($('#custom').is(':checked')) {
                        $('.select_nodes').removeClass('hidden');
                        $('#subnode_details').html(sub_node);
                        //alert('t1');
                        $('#progame_div').remove();
                    } else {
                        $('.select_nodes').addClass('hidden');
                        $('#node_details').append(node_value);
                        // $('#sub').remove();
                        //alert('t2');

                    }
                });
    });

</script>


<script>
    var max_level = 1;
    var parent_id = 0;
    function createselect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + max_level).find(".control-label").text("Level-" + max_level);
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "node");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }

    function updateSelect(parentId) {
        requestAjax('no_of_childs', parentId, createselect);
    }

    function destroy_lower_select(levelId) {
        for (; max_level > levelId; ) {
            $("#leveldiv" + max_level).remove();
            max_level--;
        }
        reset_select_name_field();
    }

    function reset_select_name_field() {
        if (max_level > 1) {
            for (i = 1; i < max_level; i++) {
                //$("#leveldiv" + i).find(".node-select").removeAttr('name');
            }
        }
        $("#level" + max_level).attr('name', "node");
    }

    $(document.body).on("change", ".node-select", function () {
        var selectId = $(this).attr("id");
        var level = parseInt(selectId.substring(5));
//            alert(level);
        destroy_lower_select(level);
        if ($("#" + selectId)[0].selectedIndex != 0) {
            var getValue = parseInt($(this).val());
            parent_id = getValue;
            updateSelect(getValue);
        } else {

        }
    });

</script>
<?php $this->load->view('html_end_view'); ?>