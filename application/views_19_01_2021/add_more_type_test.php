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
                                
                                //-----for prev data
                                    $ch=0;
                                    if(isset($draft_data)){
                                            $prev_content=array();
                                            foreach ($draft_data as $key_d => $val_draft) {
                                                if($val_draft['section_id']==$value['id']){
                                                    $ch=1;
                                                    $prev_content[]=$val_draft['key_values'];
                                                    //break;
                                                }
                                            }
                                    }
                                //-----
                                ?>
                                <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                    <legend class="scheduler-border" id="charges"><?php echo $value['name']; ?></legend>
                                    <div class="table-responsive">
                                        <table class="table table-bordered <?php echo $value['id']; ?>" id="<?php echo "id_" . $value['id']; ?>">
                                        <!--<table class="table table-bordered <?php echo $value['id']; ?>" id="charges_fee">-->


                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.no</th>
                                                    <th class="text-center">Values</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                if($ch){//--dispaly prev values for edit only(after Save as Draft)---
                                                    foreach ($prev_content as $i=> $prev_val){
                                                        echo '<tr data-id="'.($i+1).'" id="charges'.($i+1).'" >';
                                                        echo '<td class="text-center"><input type="hidden" class="charge_hidden_id" id="charge_id'.($i+1).'" value="ok"><span class="first">'.($i+1).'</span></td>';
                                                        echo '<td class="text-center name checkEmpty" contenteditable id="name'.$value['id'].'_'.($i+1).'" value="'.$prev_val.'">'.$prev_val.'</td>';
                                                        echo '<td class="text-center"><span class="btn glyphicon glyphicon-trash remove" id="'.$value['id'].'_'.($i+1).'" onclick="removeearn(this)"></span></td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="btn btn-default add_charges" id="add_charges_<?php echo $value['id']; ?>">Add More</span>
                                    </div>
                                </fieldset>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <hr/>
<!--                    <div class="form-group">
                        <div class="col-md-12">
                            <center><button  class="btn btn-primary button_style" id="save">Submit</button></center>
                           
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" value="1" name="draft" class="btn btn-primary dew">Save as Draft</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" value="0" name="draft" class="btn btn-primary dew" id="save">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="modal fade" id="sucess_message" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Information
                    </h4>
                </div>
                <div class="modal-body"> Data has been saved
                </div>
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
    //====================================Table for add more==========================================================
    $(document.body).on("click", ".add_charges", function () {
        var data = $(this).attr('id');
        var id = parseInt(data.substr(12));
        var table = $('.' + id);
        var count = $('.' + id + ' tr').length;
        var tr = $("<tr data-id=" + count + " id='charges" + count + "'></tr>");
        table.append(tr);
        var td = "";
        td = $("<td class='text-center'><input type='hidden' class='charge_hidden_id' id='charge_id" + count + "' value=''><span class='first'>" + count + "</span></td>");
        tr.append(td);
        td = $("<td class='text-center name checkEmpty' contenteditable id='name"+id+"_" + count + "'></td>");
        tr.append(td);
        td = $("<td class='text-center'><span class='btn glyphicon glyphicon-trash remove'id='" + id + '_' + count + "' onclick='removeearn(this)'></span></td>");
        tr.append(td);
    });

    function removeearn(e) {
        var id = $(e).attr('id');
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
    draft=0;
    $(document.body).on("click", ".dew", function () {
         draft=$(this).val();

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
            url: base_url + 'set_data/save_data_for_add_more_type', //working............
            data: dataObject,
            success: function (data) {
                //alert(data);
                //console.log(data);
//                $('#sucess_message').modal('show');
//                header('Location: ' . base_url() . 'showsheet/');
                //window.open("<?php echo base_url() . 'testing_view/' . $sheet_section_id ?>", "_self");
               // window.open("<?php echo base_url() . 'showsheet/'?>", "_self");
               if(data=="go_to_analytics"){
                   alert("Thank you for submitting your responses. You can access your key data from the “Analytics” section");
                   window.open("<?php echo base_url() . 'showsheet/'?>", "_self");
               }else if(data=="next_section"){
                   alert("Thanks for submitting this section.Click ok to next section");
                   window.open("<?php echo base_url() . 'sheets/sheets/'.$sheet_id?>", "_self");
               }
               else if(data=="draft_saved"){
                   alert("Your prev details are saved.click ok to continue..");
                    window.open("<?php echo base_url() . 'sheets/sheets/'.$sheet_id?>", "_self");
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
//            var id = $('#' + 'charges' + i).find(".charge_hidden_id").val();
            //var val = $('#' + 'charges' + i).find(".name").text();
            var val = $("#name"+id+"_"+i).text();
            item = {}
            item ["section_id"] = id;
            item ["val"] = val;
            values.push(item);
        }
        return values;
    }



    function checkEmpty() {
        var valid = true;
        $(".checkEmpty").each(function () {
            var el = $(this);
            if (el.text() == "") {
                valid = false;
            }
        });
        return valid
    }
</script>

<?php $this->load->view('html_end_view'); ?>

