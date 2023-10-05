<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//var_dump($data);
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Subjective Question</h1>
    <!--Add question btn-->
    <div class="row text-center">
        <div class="col-md-12">
            <!--<a id="addLink" href="" class="btn btn-primary">Add Question</a>-->
            <button type = "button" id = "addLink" class = "btn btn-primary">Add Subjective Question</button>
        </div>
    </div>
    <hr />
    <!--question type search form-->

    <div class="row">
        <div class="col-md-12">
            <div id ="select_level_outer">
                <?php
                if ($data) {
                    $nodes = array_reverse($data['basenodes']);
                    foreach ($nodes as $key => $value) {
                        echo '<div class="form-group row level-div space-bootom" id="leveldiv' . ($key + 1) . '">
                            <label for = "level' . ($key + 1) . '" class = "col-sm-3 control-label">Select Quiz Node</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level' . ($key + 1) . '" ';
                        if (($key + 1) == count($nodes)) {
                            echo 'name = "node" required ';
                        }
                        echo ' >';
                        echo $this->main_model->fill_node_select($value['parent_id'], $value['id']);
                        echo '</select>
                    </div>
                     </div>';
                    }
                } else {
                    echo '<div class="form-group row level-div space-bootom" id="leveldiv1">
                            <label for = "level1" class = "col-sm-3 control-label">Select Quiz Node</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level1" ';
                    echo 'name = "node" required >';
                    echo $this->main_model->fill_node_select(0);
                    echo '</select>
                    </div>
                    </div>';
                }
                
                 ?>
            </div>
        </div>
    </div>
<div class = "row-fluid space-bootom ">
        <div class = "span4 offset4 text-center">
            <button type = "button" id = "show" class = "btn btn-success">Show</button>
        </div>
    </div>
    <hr />
    <!--Table content -->
    <div class = "row">
        <div class = "col-md-12">
            <div class = "table-responsive">
                <table id = "content" class = "table table-bordered">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th colspan = "2" class = "text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data) {
                            foreach ($data['grid_data'] as $key => $value) {
                                echo '<tr class="post">'
                                . "<td>" . ($key + 1) . "</td>
                                <td>$value[question_text]</td>"
                                . '<td>' . $this->main_model->get_name_from_id('category', 'name', $value['category']) . '</td>'
                                . '<td class="text-center"><a href="' . base_url() . "edit/subjectivequestions/$value[id]" . '"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                . '<td class = "text-center"><a href = "' . base_url() . "delete/subjectivequestions/$value[id]" . '"><span class = "glyphicon glyphicon-trash"></span></a></td>'
                                . '</tr>';
                            }
                        } else {
                            echo '<tr class = "post">
                                <td>1</td>
                                <td>No Questions to Show.</td>
                                <td></td>
                                <td class = "text-center"><a href = ""><span class = "glyphicon glyphicon-pencil"></span></a></td>
                                <td class = "text-center"><a href = ""><span class = "glyphicon glyphicon-trash"></span></a></td>
                                </tr>';
                        }
                        ?>
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
<?php
if ($data) {
    echo "var max_level = " . $data['max_level'] . ";
var parent_id = " . $data['parent_id'] . ';';
} else {
    echo " var max_level = 1;
var parent_id = 0;";
}
?>

    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + (max_level - 1)).find(".node-select").removeAttr('name');
            $("#leveldiv" + max_level).find(".control-label").text("Select Quiz Node");
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "parent_id");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }


    function updateSelect(parentId) {
        requestAjax('no_of_childs', parentId, createSelect);
//            alert(no_of_childs);
//            no_of_childs = parseInt(no_of_childs);
    }

    function destroy_lower_select(levelId) {
        for (; max_level > levelId; ) {
            $("#leveldiv" + max_level).remove();
            max_level--;
            reset_select_name_field();
        }
    }

    function reset_select_name_field() {
        if (max_level > 1) {
            for (i = 1; i < max_level; i++) {
                $("#leveldiv" + i).find(".node-select").removeAttr('name');
            }
        }
        $("#level" + max_level).attr('name', "parent_id");
    }

    $(document.body).on("change", ".node-select", function () {
        var selectId = $(this).attr("id");
        var level = parseInt(selectId.substring(5));
        destroy_lower_select(level);
        if ($("#" + selectId)[0].selectedIndex != 0) {
            var getValue = parseInt($(this).val());
            parent_id = getValue;
            updateSelect(getValue);
        } else {
            //                $('#subprograms option:eq(0)').attr("selected", true);
            //                $('#quiz option:eq(0)').attr("selected", true);
        }
    });
    $(document).ready(function () {
        $("#show").click(function () {
            window.open(base_url + "manage/subjectivequestions/" + parent_id, "_self");
        });
        $("#addLink").click(function () {
           if(parent_id != 0){
                window.open(base_url + "add/subjectivequestions/" + parent_id, "_self");
             }
        });
    });
</script>
<?php $this->load->view('html_end_view'); ?>