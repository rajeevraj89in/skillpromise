<?php
//echo "<pre>";
//print_r($baseNodes);die;

$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<section class="col-md-9">
    <h1 class="page-header">Select Users to give permissions for Sub-programs</h1>
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/node-users/' ?>" method="POST">
    <div class="row text-center">
    <div class="col-md-12">
        <div class="form-group">
            <label for="users" class="col-sm-3 control-label">Select Users</label>
            <div class="col-sm-6">
                <select class="form-control" id="user_list" name="users" required="true">
                    <?php echo $this->main_model->fill_select('users', 'name','','role',6); ?>
                </select>
            </div>
            <div class="col-sm-3">
                <a type="save" id="select_user" href="" class="btn btn-primary"> OK </a>
            </div>
        </div>
    </div>
    </div>
    <hr />
    
    <div class="form-group">
        <div class="row">
<!--                    <input type="hidden" name="child_table" value = "user-node">
               <input type="hidden" name="foreign_id" value = "users">-->
            <label for="" class="col-sm-6 control-label">Select Sub Programs for permission</label>
            <div class="col-md-12">
                
                <div id ="select_level_outer">

                    <?php
                    if (!$max_level) {//if quiz at root level, or level not defined
                        echo '<div class="form-group level-div" id="leveldiv1">
                            <label for = "level1" class = "col-sm-3 control-label">Select Connect Node</label>
                            <div class = "col-sm-6">
                            <select class = "form-control node-select" id = "level1" ';
                        echo 'name = "node" required >';
                        echo $this->main_model->fill_node_select(0);
                        echo '</select>
                    </div>
                     </div>';
                    } else {
                        $nodes = array_reverse($baseNodes);
                        foreach ($nodes as $key => $value) {
                            echo '<div class="form-group level-div" id="leveldiv' . ($key + 1) . '">
                            <label for = "level' . ($key + 1) . '" class = "col-sm-3 control-label">Select Connect Node</label>
                            <div class = "col-sm-6">
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
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-8">
            <button type="submit" class="btn btn-primary">Assign</button>
        </div>
    </div>
    </form>
    
</section>    
<?php $this->load->view('footer_view'); ?>

<script>
   // var max_level = 1;
   var max_level = <?php
if ($max_level) {
    echo $max_level;
} else {
    echo 1;
}
?>;
    var parent_id = 0;
    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + (max_level - 1)).find(".node-select").removeAttr('name');
            $("#leveldiv" + max_level).find(".control-label").text("Select Connect Node");
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "node");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }

    function updateSelect(parentId) {
        requestAjax('no_of_childs', parentId, createSelect);
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
    $('#user_list').on('change',function(){
     // alert("I m working ");  
       var user_id = $(this).val();
       var href_val = base_url + 'showcontent/node-users/' + user_id ;
     //  alert(href_val);
       $('#select_user').attr("href", href_val); 
    })

    });
    
</script>

<?php $this->load->view('html_end_view'); ?>    
    