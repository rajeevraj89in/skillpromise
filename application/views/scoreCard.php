<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Select Nodes</h1>
    <!--Add question btn-->
    
    <!--question type search form-->
    <form class="form-inline" role="form">
        <div class="row">
            <div class="col-md-12">
                <div id ="select_level_outer">
                    <div class="form-group space-bootom level-div" id="leveldiv" style="display:none">
                        <label for="" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" required>

                            </select>
                        </div>
                    </div>
                    <div class="form-group space-bootom level-div1" id="leveldiv1">
                        <label for="" class="col-sm-3 control-label">Level-1</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="level1" name="node" required>
                                <?php echo $this->main_model->fill_node_select(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid space-bootom ">
            <div class="span4 offset4 text-center">
                <button type="button" id="show" class="btn btn-success">Show</button>
            </div>
        </div>
    </form>
    <hr />
    <!-- Table content -->
    <?php
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="content" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Node ID</th>
                            <th>Node Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="post">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!--<td class="text-center"><a href=""><span class="glyphicon glyphicon-pencil"></span></a></td> -->
                            <td class="text-center"><a href="">Show</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul class="pagination" id="pagination"></ul>
        </div>
    </div><!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
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
                $("#leveldiv" + i).find(".node-select").removeAttr('name');
            }
        }
        $("#level" + max_level).attr('name', "node");
    }

    function fillGrid(JSONtext, gridID) {
        var table = $('#' + gridID);
        JSONobject = eval("(" + JSONtext + ")");
        table.find("tr:gt(0)").remove(); //remove all previous rows except tr
        $.each(JSONobject, function (i, item) {
        if(item.type == 'Quiz'){  
            var tr = $("<tr></tr>");
            table.append(tr);
            var td = "";
            td = $("<td>" + item.id + "</td>");
            tr.append(td);
            td = $("<td>" + item.name + "</td>");
            tr.append(td);
            td = $("<td>" + item.type + "</td>");
            tr.append(td);
            td = $("<td>" + item.status + "</td>");
            //tr.append(td);
            //td = $('<td class="text-center"><a href="' + base_url + 'edit/node/' + item.id + '"><span class = "glyphicon glyphicon-pencil" ></span></a></td>');
            tr.append(td);
            td = $('<td class="text-center"><a href="' + base_url + 'score/node/' + item.id + '">show</a></td>');
            tr.append(td);
        }
        });
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

    $(document).ready(function () {
        $("#show").click(function () {

            var getValue = $("[name = 'node']").val();
            getValue = parseInt(getValue);
            initiateAjax('node', 'parent_id', getValue, ['id', 'parent_id', 'name', 'type', 'status'], fillGrid, "content");
        });
    });


</script>
<?php $this->load->view('html_end_view'); ?>