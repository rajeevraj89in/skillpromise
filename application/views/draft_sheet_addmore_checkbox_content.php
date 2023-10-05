<?php
//var_dump($data); die;
$this->load->view('header_view');
$this->load->view('user_left_view');
//echo "<pre>";
//print_r($add_more_type_details);
//die;
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>.</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row row_style">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-12">
                            <div> <?php echo $instruction; ?></div>
                            <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                            <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">


                            <?php
                            foreach ($add_more_type_details as $value) {
                                //-----for prev data
                                $ch = 0;
                                if (isset($draft_data)) {
                                    $prev_content = array();
                                    $prev_desc=array();
                                    foreach ($draft_data as $key_d => $val_draft) {
                                        if ($val_draft['section_id'] == $value['id']) {
                                            $ch = 1;
                                            $prev_content[] = $val_draft['skill_value'];
                                            $prev_desc[] = $val_draft['skill_description'];
                                            //break;
                                        }
                                    }
                                }
                                //-----
                                ?>
                                <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                    <legend class="scheduler-border" id="charges"><?php echo $value['category']; ?></legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered <?php echo $value['id']; ?>" id="<?php echo "id_" . $value['id']; ?>">
                                        <!--<table class="table table-bordered <?php // echo $value['id']; ?>" id="charges_fee">-->


                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.no</th>
                                                    <th class="text-center">Add Skill</th>
                                                    <th class="text-center">Values</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>

                                            <?php
//                                            echo '<pre>';
//                                            print_r($prev_desc);die;
                                            if ($ch) {//--dispaly prev values for edit only(after Save as Draft)---
                                                foreach ($prev_content as $i => $prev_val) {
                                                    echo '<tr data-id="' . ($i + 1) . '" id="charges' . ($i + 1) . '" >';
                                                    echo '<td class="text-center"><input type="hidden" class="charge_hidden_id" id="charge_id' . ($i + 1) . '" value="ok"><span class="first">' . ($i + 1) . '</span></td>';
                                                    echo '<td class="text-center"><label id="skill' . $value['id'] . '_' . ($i + 1) . '">' . 'Add Skill' . '</label></td>';
                                                    echo '<td class="text-center" style="display:none"><input type"hidden"  class="chk" id="chk' . $value['id'] . '_' . ($i + 1) . '" name="skill_description" value="' . $prev_desc[$i] . '"></td>';
                                                    echo '<td class="text-center"><input class="form-control value" type="text" id="label' . $value['id'] . '_' . ($i + 1) . '" value="' . $prev_val . '" name="skill_value[]"></td>';
                                                    echo '<td class="text-center"><span class="btn glyphicon glyphicon-trash remove" id="' . $value['id'] . '_' . ($i + 1) . '" onclick="removeearn(this)"></span></td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            ?>

                                        </table>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="btn btn-sm btn-default add_charges" id="add_charges_<?php echo $value['id']; ?>">Add More Skill</span>
                                    </div>
                                </fieldset>
                            <?php }
                            ?>
                        </div>

                    </div>

                    <hr/>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="content">
                                <thead>
                                    <tr style="background-color:#dff0d8; color:#3c763d;">
                                        <?php
                                        foreach ($add_more_type_details as $key => $value) {
                                            //echo '<th>' . '</th>';
                                            echo'<th class="text-center">' . $value['category'] . '</th>';
                                        }
                                        ?> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $content = '';
                                        foreach ($cat_group as $key => $value_cat) {
                                            echo '<td><div id="div' . $key . '">';
                                            foreach ($value_cat as $key_d => $val_d) {
                                                if (isset($val_d['skill_description'])) {
                                                    if (!empty($val_d['skill_description'])) {
                                                        echo '<input class="check" type="checkbox" checked style="margin-right:5px" name="' . $val_d['skill_description'] . '"  value="' . $val_d['skill_description'] . '" id="check' . $key . '_' . ($key_d + 1) . '">' . '<label class="" id="name' . $key . '_' . ($key_d + 1) . '" value="' . $val_d['skill_value'] . '">' . $val_d['skill_value'] . '</label><br>';
                                                    } else {
                                                        echo '<input class="check" type="checkbox" style="margin-right:5px" name="' . $val_d['skill_description'] . '"  value="' . $val_d['skill_description'] . '" id="check' . $key . '_' . ($key_d + 1) . '">' . '<label class="" id="name' . $key . '_' . ($key_d + 1) . '" value="' . $val_d['skill_value'] . '">' . $val_d['skill_value'] . '</label><br>';
                                                    }
                                                }
                                            }
                                            echo '</div></td>';
                                        }


//                                        echo '<pre>';
//                                        print_r($val_d);
//                                        die;
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr/>

    <div class="form-group">
        <div class="col-sm-3">
            <button type="submit" value="1" name="draft" class="btn btn-primary dew">Save as Draft</button>
        </div>
        <div class="col-sm-3">
            <button type="submit" value="0" name="draft" class="btn btn-primary dew" id="save">Submit</button>
        </div>
    </div>

    <div class="modal fade" id="sucess_message" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Information
                    </h4>
                </div>
                <!--<div class="modal-body">Data has been saved</div>-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section><!-- end col-md-9 -->
<!--end content panel start -->
</div><!-- end bigCallout-->
<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
    var i = 1;
    //====================================Table for add more==========================================================
    $(document.body).on("click", ".add_charges", function () {

        var data = $(this).attr('id');
        var id = parseInt(data.substr(12));
        var table = $('.' + id);
        var count = $('.' + id + ' tr').length;
//        var count=i;
        var tr = $("<tr data-id=" + count + " id='charges" + count + "'></tr>");
        table.append(tr);

        var td = "";
        td = $("<td class='text-center'><input type='hidden' class='charge_hidden_id' id='charge_id" + count + "' value=''><span class='first'>" + count + "</span></td>");
        tr.append(td);

        td = $("<td class='text-center'><label class='l_addskill' id='l_addskill" + count + "'>Add Skill:</label></td>");
        tr.append(td);

        td = $("<td class='text-center' style='display: none;'><input type='hidden' name='skill_description' class='chk' id='chk" + id + "_" + count + "' value=''></td>");
        tr.append(td);

        td = $("<td class='text-center'><input class='form-control value' name='skill_value[]' type='text' id='label" + id + "_" + count + "' value=''/></td>");
        tr.append(td);


        td = $("<td class='text-center'><span class='btn glyphicon glyphicon-trash remove'id='" + id + '_' + count + "' onclick='removeearn(this)'></span></td>");
//        td = $("<td class='text-center'><span class='btn glyphicon glyphicon-trash remove'id='" + count + "' onclick='removeearn(this)'></span></td>");
        tr.append(td);


        add_blank_data_in_table(id, count);
        i++;
    });


    function add_blank_data_in_table(id, i)
    {
        $("#div" + id).append("<input type='checkbox' id='check" + id + "_" + i + "' class='check' style='margin-right:5px'></input><label  id='name" + id + "_" + i + "'></label><br/>");
    }

//  ====================insert data in table one time   

    $(document.body).on("keyup", ".value", function () {
        //   alert("hiii");
        var id = $(this).attr('id');
//        var cat_id = parseInt(id.substr(5));
//        var ser_id = parseInt(id.substr(7));
        var val = $(this).val();
var catser= id.substr(5);
var cat_id = catser.split("_")[0];
var ser_id = catser.split("_")[1];
        $("#name" + cat_id + "_" + ser_id).text(val);

    });

//===========================================================

    $(document.body).on("click", ".check", function () {
        if ($(this).is(':checked')) {
            var check_id = $(this).attr("id");
            var cat_id = parseInt(check_id.substr(5));
            var ser_id = parseInt(check_id.substr(7));
//          alert(check_id);
//var catser= id.substr(5);
//var cat_id = catser.split("_")[0];
//var ser_id = catser.split("_")[1];

            displayImport1("Enter Title Description", "Placeholder", cat_id, ser_id);
        }
    });

//   
    //------------for custom tooltip-----popup
    function displayImport1(popup_title, popup_placeholder, target_ext, target_int) {
        var modelHtmlStr = '<div class="modal" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importTextModel">'
                + '<div class="modal-dialog" role="document">'
                + '<div class="modal-content">'
                + '<div class="modal-header" style="background-color:#f4b184">'
                + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                + '<h5 class="modal-title">' + popup_title + '</h5>'
                + '</div>'
                + '<div class="modal-body">'
                + '<div class="form-group">'
                + '<label for="message-text" id="" class="control-label"></label>'
                + '<textarea class="form-control legacy" rows="12" id="legacy_text" placeholder="' + popup_placeholder + '"></textarea>'
                + '</div>'
                + '</div>'
                + '<div class="modal-footer">'
                + '<button type="button" id="importBtn" class="btn btn-success"  data-dismiss="modal">save</button>'
                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>';

        $('body').prepend(modelHtmlStr);
        $('#importModal').modal('show');
        $('#importBtn').click(function () {
            var input_text = $("#legacy_text").val();
            //alert(input_text);
            $('#chk' + target_ext + "_" + target_int).attr("value", input_text);

//        alert(input_text);
        });
    }
//------------end for custom tooltip-----

    function removeearn(e) {
        var id = $(e).attr('id');


        $("#check" + id).remove();
        $("#name" + id).remove();


        $(e).closest('tr').remove();
        resetearntable(id);
    }

    function resetearntable(id) {
        var rows = $('.' + id + ' tr').length;
        for (i = id; i <= rows; i++) {
            var targetid = parseInt(i) + 1;
            var newId = "charges" + i;
            $('#' + 'charges' + targetid).find(".first").html(i);
            $('#' + 'charges' + targetid).find(".remove").attr("id", i);
            $('#' + 'charges' + targetid).attr("id", newId);

        }
    }
    //==================================save button click===========================================================
    draft = 0;
    $(document.body).on("click", ".dew", function () {
        draft = $(this).val();

        var vaildate = checkEmpty();
        if (vaildate) {
            SaveDataInDb();
        } else {
            $('#error_message').modal('show');
        }
    });
    //========================= document loading===========================================
    function SaveDataInDb() {
        var sheet_section_id = $('#sheet_section_id').val();
        sheet_section = sheet_section_id;
        var dataObject = {};
        dataObject['draft'] = draft;
        dataObject['sheet_section_id'] = sheet_section;
        dataObject['sheet_id'] = "<?php echo $sheet_id; ?>";

<?php
foreach ($add_more_type_details as $key => $table) {
    echo 'dataObject["' . $table['id'] . '"] = getDataFromTable("' . $table['id'] . '");';
}
?>
//        alert(dataObject);
//        console.log(dataObject);
        $.ajax({
            type: "POST",
            url: base_url + 'set_data/add_more_checkbox_contents', //working............
            data: dataObject,
            success: function (data) {
//console.log(data);
//                alert(data);
                console.log(data);
                if (data == "go_to_analytics") {
                    alert("Thank you for submitting your responses. You can access your key data from the “Analytics” section");
                    window.open("<?php echo base_url() . 'showsheet/' ?>", "_self");
                } else if (data == "next_section") {
                    alert("Thanks for submitting this section.Click ok to next section");
                    window.open("<?php echo base_url() . 'sheets/sheets/' . $sheet_id ?>", "_self");
                } else if (data == "draft_saved") {
                    alert("Your prev details are saved.click ok to continue..");
                    window.open("<?php echo base_url() . 'sheets/sheets/' . $sheet_id ?>", "_self");
                }
            },
            failure: function (errMsg) {
                alert('Unable to get data !\nCheck Internet connectivity, refresh page and try again.');
            }
        });
    }
    function getDataFromTable(id) { //===================== gete data from table by table id

        var row_id = 'id_' + id;
//        alert(row_id);
        var rows_no = $('#' + row_id + ' tr').length;
//          alert(rows_no);
        var values = [];
        for (i = 1; i < rows_no; i++) {

            var val = $("#label" + id + "_" + i).val();
//          alert(val);
            var desc_val = $("#chk" + id + "_" + i).val();
//            alert(desc_val);
            item = {}
            item ["section_id"] = id;  //means= addmore_checkbox_category_id
            item ["skill_value"] = val;
            item ["skill_description"] = desc_val;
            values.push(item);
        }
        return values;
    }



    function checkEmpty() {
        var valid = true;
        $(".checkEmpty").each(function () {
            var val = $(this).val();
            if (val == "") {
                valid = false;
            }
        });
        return valid
    }
</script>

<?php $this->load->view('html_end_view'); ?>

