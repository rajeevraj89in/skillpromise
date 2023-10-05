<?php
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
        ?>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row row_style">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-12">
                            <div>
                                <?php echo $instruction; ?>
                            </div>
                            <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">

                            <?php foreach ($add_more_type_details as $value) {
                                ?>
                                <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                    <legend class="scheduler-border" id="charges"><?php echo $value['category']; ?></legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered <?php echo $value['id']; ?>" id="<?php echo "id_" . $value['id']; ?>">
                                        <!--<table class="table table-bordered <?php // echo $value['id'];  ?>" id="charges_fee">-->


                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.no</th>
                                                    <th class="text-center">Add Skill</th>
                                                    <th class="text-center">Values</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>

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
                                        foreach ($add_more_type_details as $key => $value) {
                                            echo '<td><div style="border:2px;" id="div' . $value['id'] . '"></div></td>';
                                        }
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
        default_colone(data);
    });
    
$('.add_charges').each(function() {
    default_colone( this.id );
});

function default_colone(data){
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

        td = $("<td class='text-center' style='display: none;'><input type='hidden' name='skill_description' class='chk' id='chk" + id + "_" + count + "'></td>");
        tr.append(td);

        td = $("<td class='text-center '><input class='form-control value checkEmpty' name='skill_value[]' type='text' id='name" + id + "_" + count + "' required='' value=''/></td>");
        tr.append(td);

        td = $("<td class='text-center'><span class='btn glyphicon glyphicon-trash remove'id='" + id + '_' + count + "' onclick='removeearn(this)'></span></td>");
        tr.append(td);

        add_blank_data_in_table(id, count);
        i++;
}

    function add_blank_data_in_table(id, i)
    {
        $("#div" + id).append("<input type='checkbox' id='check" + id + "_" + i + "' class='check' style='margin-right:5px'></input><label  id='label" + id + "_" + i + "'></label><br/>");
    }

//  ====================insert data in table one time   

    $(document.body).on("keyup", ".value", function () {
//        alert("hiii");
        var id = $(this).attr('id');
//        var cat_id = parseInt(id.substr(4));
//        var ser_id = parseInt(id.substr(6));
var catser= id.substr(4);
var cat_id = catser.split("_")[0];
var ser_id = catser.split("_")[1];

        var val = $(this).val();
        $("#label" + cat_id + "_" + ser_id).text(val);

    });

//===========================================================

    $(document.body).on("click", ".check", function () {
        if ($(this).is(':checked')) {
            var check_id = $(this).attr("id");
            var cat_id = parseInt(check_id.substr(5));
            var ser_id = parseInt(check_id.substr(7));

            displayImport1("Enter Title Description", "Placeholder", cat_id, ser_id);
        }
    });

   
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
        $("#label" + id).remove();


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
    $(document.body).on("click", ".dew", function (event) {
        draft = $(this).val();
//        alert('Please complete the field');
//        event.preventDefault();
        var vaildate = checkEmpty();
        //alert(vaildate);
        if (vaildate) {
            SaveDataInDb();
        } else {
            alert("Please complete the value field");
            event.preventDefault();
            //$('#error_message').modal('show');
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
               if(data=="go_to_analytics"){
                   alert("Thank you for submitting your responses. You can access your key data from the “Analytics” section");
                   window.open("<?php echo base_url() . 'showsheet/' ?>", "_self");
               }else if(data=="next_section"){
                   alert("Thanks for submitting this section.Click ok to next section");
                   window.open("<?php echo base_url() . 'sheets/sheets/' . $sheet_id ?>", "_self");
               }
               else if(data=="draft_saved"){
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
        var rows_no = $('#' + row_id + ' tr').length;
        var values = [];
        for (i = 1; i < rows_no; i++) {
//            alert("ddd");
//            var id = $('#' + 'charges' + i).find(".charge_hidden_id").val();
//            var val = $('#' + 'charges' + i).find(".name").text();
            var val = $("#name" + id + "_" + i).val();
            var desc_val = $("#chk" + id + "_" + i).val();

//            alert(val);
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

