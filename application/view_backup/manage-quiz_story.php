<?php

$this->load->view('header_view');
$this->load->view('manager_left_view');
//var_dump($expression);
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Quiz Story</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/quiz_story'; ?>">Add Quiz Story</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <input type="text" placeholder="Quiz Story Name" id="searchquizstory">
        </div>
    </div>
    <div class="clearfix"></br></div>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Quiz Name</th>
                            <th>Story Name</th>
                            <th>Status</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $key => $rec) {
                            if ($_SESSION['role_name'] == 'Content Creator'){
                                
                                 $is_permitted = $this->custom->get_access_permit($rec['node']);
                                
                                    if ($is_permitted) {

                                        $tbl_str.= '<tr class="post">'
                                    . '<td>' . $this->main_model->get_name_from_id('quiz', 'name', $rec['quiz_id']) . '</td>'
                                    . "<td class='story_name'>" . $rec['name'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . '<td class="text-center"><a href="' . base_url() . "edit/quiz_story/" . $rec['id'] . '" title="Edit a Quiz Story"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/quiz_story/" . $rec['id'] . '" title="Delete Quiz Story"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>"; 

                                    }

                            }else{
                            $tbl_str.= '<tr class="post">'
                                    . '<td>' . $this->main_model->get_name_from_id('quiz', 'name', $rec['quiz_id']) . '</td>'
                                    . "<td class='story_name'>" . $rec['name'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . '<td class="text-center"><a href="' . base_url() . "edit/quiz_story/" . $rec['id'] . '" title="Edit a Quiz Story"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/quiz_story/" . $rec['id'] . '" title="Delete Quiz Story"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                                 }
                        
                            }

                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div><!--end Table content -->
</section><!--end col-md-9 -->
<!--end content panel start -->

</div><!--end bigCallout-->

<!--End Content and Sidebar
===================================================== -->
</div><!--end main -->
<?php $this->load->view('footer_view');
?>
<script>
    $(document).ready(function () {
        $.expr[":"].contains = $.expr.createPseudo(function (arg) {
            return function (elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });
    });

    $(document.body).on('keyup', '#searchquizstory', function () {
        $("#content td.story_name:contains('" + $(this).val() + "')").parent().show();
        $("#content td.story_name:not(:contains('" + $(this).val() + "'))").parent().hide();
    });
</script>

<?php $this->load->view('html_end_view'); ?>