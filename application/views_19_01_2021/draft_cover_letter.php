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
    
    <p>Submission will give an output like this in Analytics Section:</p>
    <p>To : <a href="mailto:jobs@skillpromise.com" title="">jobs@skillpromise.com</a></p>
    <p>From : <a href="mailto:xyz@gmailcom" title="">xyz@...com</a> </p>
    <br>
    <p>Subject: Application for the post of “Management Trainee – Your Specialization” (Job Code is MT2019)</p>
    <br><br>
    <p>Dear Sir/ Madam</p>
    <br>
    <p style="text-align: justify;">I was thrilled to see your advertisement in Accent TOI dated July 5, 2019 for the post of “Management Trainee - Marketing”. I recently graduated from XYZ Business school and my specialization in marketing has given me a solid base upon which I want to build my marketing career. I would like to present myself as a candidate for the advertised role. Please find my CV attached with this application</p>
    <p style="text-align: justify;">I am a management graduate form IMT, Hyderabad with specialization in marketing. I have a CGPA of 9.4. I did my Internship with Coca Cola in the marketing department where I worked on analyzing the efficacy of Below the Line marketing initiatives of the company in Northern and Western part of India. I hold a certification in Digital Marketing from Upgrad</p>
    <p style="text-align: justify;">My learning’s from my specialization in marketing, my active participation in the marketing club activities during my MBA and my internships have provided me with a strong base in marketing. My knowledge, coupled with my strengths like Integrity, Learning agility, Coach ability, out of the box thinking and analytical skills, will help me hit the road running. I would also like to share that I am open to relocation and I am available to join immediately</p>
    <p style="text-align: justify;">I look forward to meeting you for a personal interview. Please let me know if you need any more information.</p>
    <p>Thank you for your time and consideration</p>
    <p>Best Regards</p>
    <p>First Name Last Name<br>
Full Address with Pin code<br>
Handheld: +91<br>
Personal Email Address:</p>

    <a href="#!" class="btn btn-success">Download as a Word Document</a>

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
        var catser = id.substr(5);
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

