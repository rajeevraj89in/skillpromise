<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <div class="well">
        <div class="page-header">
            <?php
            echo "<h1>$name</h1>
            </div><!-- end page header -->
            $page_content
        </div><!-- end well -->";
            if ($table == "quiz") {
                echo '<div class="col-md-6">
                    <a href="' . base_url() . "quiz/practice/$id" . '" class="btn btn-primary btn-lg"> Practice Quiz </a>
                    </div>';
                $attempt = $this->custom->is_quiz_attempted($id, $_SESSION['user_id']);
                if ($attempt) {
                    echo '<div class="col-md-6">
                    <a href="' . base_url() . "quiz/result/$id" . '" class="btn btn-primary btn-lg"> Quiz Result </a>
                    </div>';
                } else {
                    echo '<div class="col-md-3">
                    <a href="" class="btn btn-primary btn-lg" id="board-quiz"> Score Quiz </a>
                    </div>
                    <div class="col-md-3">
                    <a href="' . base_url() . "quiz/flex/$id" . '" class="btn btn-primary btn-lg"> Flex Quiz </a>
                    </div>';
                }
            }
            ?>
            </section><!-- end col-md-9 -->
            <!--end content panel start -->

        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
        ===================================================== -->
    </div><!-- end main -->

    <?php $this->load->view('footer_view'); ?>
    <script type="text/javascript">
        function open_win() {
            window.open('<?php echo base_url() . "quiz/board/$id"; ?>', "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=0, left=0, width=1350px, height=655px")
        }
        $('document').ready(function () {
            $("#board-quiz").click(function () {
                open_win();
            });
        });
    </script>
    <?php $this->load->view('html_end_view'); ?>