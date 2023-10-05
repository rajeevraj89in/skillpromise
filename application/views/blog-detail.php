
<?php
$this->load->view('home_header_view');
?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">

                                <?php
//                                echo '<pre>';
//                                print_r($blog_category[0]);
//                                die;
                                foreach ($blog1 as $key => $catdetail) {
//                                    echo '<pre>';
//                                    print_r($catdetail["name"]);
//                                    die;
                                    if ($key == 0) {
                                        $active = 'class = "active"';
                                    } else {
                                        $active = '';
                                    };
                                    echo '<li role="presentation"' . $active . ' ><a href="#" aria-controls="cnt" role="tab" data-toggle="tab">' . $catdetail['name'] . '</a></li>';
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>


            <?php $this->load->view('blog_leftmenu'); ?>

            <section class="col-md-9" style="min-height: 395px;">


                <?php
                foreach ($blog as $new) {
                    ?>


                    <div class="panel">
                        <h1 class="header_text">Five Signs of Internal Communication Breakdown in The Workplace</h1>
                    </div>

                    <div class="text-justify">
                        <div class="blog-author">

                            <span class="name"><?php echo $new["written_by"]; ?></span>
                            <span class="date"><?php echo date("d-F-Y h:i:s", strtotime($new["article_datetime"])); ?></span>
                        </div>
                        <image src="<?php echo base_url() . './assets/img/uploads/' . $new['image_file'] ?>"height=500 width=900 class='img img-responsive' />

                        <?php echo $new["description"]; ?>

                    <?php } ?>

                </div></div>


        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>

