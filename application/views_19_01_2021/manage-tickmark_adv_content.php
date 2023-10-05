<?php
//echo " <pre>";
//print_r($data);die;
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Manage Action Sheet Content</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'create/tickmark_adv_content/'. $template_instruction_id; ?>">Add sheet content</a>
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
                            <th>Name</th>
                            <th>Contents</th>
                            <th>Name</th>
                            <th>Contents</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $rec) {
                            $hdr1=$this->main_model->get_name_from_id(' tickmark_adv_content', 'header1', $rec['id'],'id');
                            $hdr2=$this->main_model->get_name_from_id(' tickmark_adv_content', 'header2', $rec['id'],'id');
                            $tbl_str.='<tr class="post">'
                                    . "<td>" . $this->main_model->get_name_from_id(' tickmark_adv_header', 'header_name', $hdr1,'id') . "</td>"
//                                    . "<td>" . $rec['header1'] . "</td>"
                                    . "<td>" . $rec['content1'] . "</td>"
//                                    . "<td>" . $rec['header2'] . "</td>"
                                    . "<td>" . $this->main_model->get_name_from_id(' tickmark_adv_header', 'header_name', $hdr2,'id') . "</td>"
                                    . "<td>" . $rec['content2'] . "</td>"
                                    . '<td class="text-center"><a href="' . base_url() . "edit/tickmark_adv_content/" . $rec['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/tickmark_adv_content/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                        }

                        echo $tbl_str;
                        
//                        echo '<pre>';
//                        print_r($data);die;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div>
</section>

<!--====================================================-->

<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>


