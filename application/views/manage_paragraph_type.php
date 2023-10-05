<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<section class="col-md-9">
    <h1 class="header_text">Manage Action Sheet Content:<font color="green"><?php
        echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
        ?></font></h1>
    <div class="row text-center">
        <div class="col-md-12">
            <?php if (!empty($template_instruction_id)) { ?>
                <a class="btn btn-primary" href="<?php echo base_url() . 'create/paragraph_type/' . $template_instruction_id; ?>">Add sheet content</a>
            <?php } else { ?>
                <a class="btn btn-primary" href="<?php echo base_url() . 'create/paragraph_type/'; ?>">Add sheet content</a>
            <?php }
            ?>
        </div>
    </div>
    <hr>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Header Name</th>
                            <th>Content</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        $count = 1;
//                         echo '<pre>';
//                        print_r($data);die;

                        foreach ($data as $rec) {
//                            echo "<pre>";
//                            print_r($rec);
                            $tbl_str .= '<tr class="post">'
                                    . "<td>" . $count++ . "</td>"
                                    . "<td>" . $rec['header_name'] . "</td>"
                                    . '<td>' . $rec['content'] . '</td>'
                                    . '<td class="text-center"><a href="' . base_url() . "edit/paragraph_type/" . $rec['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/paragraph_type/" . $rec['id'] .  '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                        }
//                        die;
                        echo $tbl_str;

//                        echo '<pre>';
//                        print_r($rec);die;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div><!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>