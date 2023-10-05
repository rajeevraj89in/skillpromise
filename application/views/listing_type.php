<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<style>
    .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
     border-top: none !important;
    }
</style>
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
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_listing_type'; ?>" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">
                <input type="hidden" value="<?php echo $sheet_id; ?>" id="" name="sheet_id">
                <?php
                $i = 1;
                foreach ($listing_type_data as $value) {
                    ?>
                    <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                        <legend class="scheduler-border" id="charges" style="font-size: 14px !important;"><?php echo $value['name']; ?></legend>
                        <div class="table-responsive">
                            <table border='0' class="table <?php echo $value['id']; ?>" id="<?php echo "id_" . $value['id']; ?>">
                                <input type="hidden" name="list[<?php echo $i; ?>][listing_type_id]" value="<?php echo $value['id']; ?>" />
                                <!--<thead><?php //echo $value['description']; ?> </thead>-->
                                <tbody id="<?php echo 'table_' . $i; ?>">
                                    <tr>
                                        <td style="width: 10px;">1.</td>
                                        <td class='name checkEmpty' contenteditable="">
                                            <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][1]" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px;">2.</td>
                                        <td class='name checkEmpty' contenteditable="">
                                            <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][2]" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px;">3.</td>
                                        <td class='name checkEmpty' contenteditable="">
                                            <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][3]" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px;">4.</td>
                                        <td class='name checkEmpty' contenteditable="">
                                            <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][4]" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px;">5.</td>
                                        <td class='name checkEmpty' contenteditable="">
                                            <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][5]" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <center>
                  <button type="submit" value="1" name="draft" class="btn btn-success">Save as Draft</button>&nbsp;<a href="<?php echo base_url('myassetsinventory_PDF')."/".$sheet_id."/".$sheet_section_id; ?>" class="btn btn-success">Download as PDF</a>  
                </center>
                
            </div>
            <div class="col-sm-3">
                
                <!--<button type="submit" value="0" name="draft" class="btn btn-primary">Submit</button>-->
            </div>
        </div>
    </form>
</div>
</div>
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
<!--<script>
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
td = $("<td class='text-center name checkEmpty' contenteditable id='name" + count + "'></td>");
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
$(document.body).on("click", "#save", function () {
var vaildate = checkEmpty();
if (vaildate) {
SaveDataInDb();
} else {
$('#error_message').modal('show');
}
});
//========================= document loading===========================================
function SaveDataInDb() {
//        var erows = $('#charges_fee tr').length;
var sheet_section_id = $('#sheet_section_id').val();
alert(sheet_section_id);
sheet_section = sheet_section_id;
var dataObject = {};
dataObject['sheet_section_id'] = sheet_section;

<?php
foreach ($add_more_type_details as $key => $table) {
echo 'dataObject["' . $table['id'] . '"] = getDataFromTable("' . $table['id'] . '");';
}
?>
$.ajax({
type: "POST",
url: base_url + 'set_data/save_data_for_add_more_type', //working............
data: dataObject,
success: function (data) {
alert(data);
//                $('#sucess_message').modal('show');
window.open("<?php echo base_url() . 'testing_view/' . $sheet_section_id ?>", "_self");
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
var val = $('#' + 'charges' + i).find(".name").text();
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
</script>-->
<?php $this->load->view('html_end_view'); ?>

