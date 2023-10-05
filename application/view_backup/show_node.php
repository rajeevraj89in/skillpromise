<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<!--content panel start -->
<section class="col-md-9" style="min-height: 395px;">
    <div class="dooble-border">
        <!--<div class="page-header">-->
        <div class="panel">
            <?php
            $page_name = '';
            if (isset($header)) {
                $page_name = $header;
            } else {
                $page_name = $name;
            }
            echo "<h1 class='header_text'>$page_name</h1>
            </div><!-- end page header -->";

            $pages = explode("--|DIV|--", $page_content);
            $no_of_pages = (count($pages));
            if ($no_of_pages > 1) {
                foreach ($pages as $key => $value) {
                    echo '<div class="page" id="page' . ($key + 1) . '" style="display:none">';
                    echo $value;
                    echo '</div>';
                }
                echo '<div class = "row">
                        <div class = "col-md-2">
                        <button class = "btn btn-primary btn-lg" id = "prev"> Previous </button>
                        </div><div class = "col-md-8"></div>
                        <div class = "col-md-2">
                        <button class = "btn btn-primary btn-lg" id = "next"> Next </button>
                        </div>
                        </div>';
            } else {//if single page to be displayed
                echo '<div class="text-justify">' . $page_content . '</div>';
            }



            echo '</div><!--end well -->';

            if (isset($quiz_type)) {
                Switch ($quiz_type) {
                    case "Practice":echo '<div class = "col-md-12">
                        <a href = "' . base_url() . "quiz/practice/$quiz_id/1" . '" class = "btn btn-primary btn-lg"> Practice Quiz </a>
                        </div>';
                        break;
                    case "Subjective":
                        echo '<div class = "col-md-12">
                        <a href = "' . base_url() . "quiz/subjective/$quiz_id/1" . '" class = "btn btn-primary btn-lg"> Subjective Quiz </a>
                        </div>';
                        break;
                    case "Scoring":
                        break;
                    case "Flex":
//                    <a href="' . base_url() . "quiz/flex/$quiz_id" . '" class="btn btn-primary btn-lg"> Flex Quiz </a>
                        break;
                    case "Dashboard":
                        $attempt = $this->custom->is_quiz_attempted($quiz_id, $_SESSION['user_id']);
                        //var_dump($attempt);die;
                        if ($attempt) {

                            $submited = $this->custom->is_quiz_submited($attempt);
                            if ($submited) {
                                echo '<div class = "col-md-12">
                                   <a href = "' . base_url() . "quiz/result/$quiz_id" . '" class = "btn btn-primary btn-lg"> Quiz Result </a>
                                   </div>';
                            } else {
                                echo '<div class = "col-md-12">
                                <a href = "' . base_url() . "add_request/$attempt" . '" class = "btn btn-primary btn-lg"> Send Request </a>
                                </div>';
                            }
                        } else {
                            echo '<div class = "col-md-12">
                                      <a href = "" class = "btn btn-primary btn-lg" id = "board-quiz"> Start Quiz </a>
                                      </div > ';
                        }
                        break;
                }
            }
            ?>
            </section><!-- end col-md-9 -->
            <?php
//            $this->load->view('quick_link_view');
            ?>
            <!--end content panel start -->

            <!-- end bigCallout-->

            <!-- End Content and Sidebar
            ===================================================== -->
            <!-- end main -->

            <?php $this->load->view('footer_view'); ?>


            <script type="text/javascript">
                var no_of_pages = <?php echo $no_of_pages; ?>;
                var current_page = 1;
<?php
if (isset($quiz_type) && ($quiz_type == "Dashboard")) {
    echo 'function open_win() {
                    window.open("' . base_url() . 'quiz/board/' . $quiz_id . '", "_blank", "toolbar = yes, scrollbars = yes, resizable = yes, top = 0, left = 0, width = 1350px, height = 655px");
                }
                $(document).ready(function () {
             $("#board-quiz").click(function () {
                        open_win();
                    });
                        });';
}
?>
                function show_page(page) {
                    page = parseInt(page);
                    if (page) {
                        $(".page").hide();
                        $("#page" + page).show();
                    }
                }

                $(document).ready(function () {

                    if (no_of_pages) {
                        $("#prev").addClass("disabled");
                        show_page(current_page);
                    }

                    $("#next").click(function () {
                        if (no_of_pages > current_page) {
                            current_page++;
                            show_page(current_page);
                        }
                        $("#prev").removeClass("disabled");
                        if (no_of_pages == current_page) {
                            $("#next").addClass("disabled");
                        }
                    });

                    $("#prev").click(function () {
                        if (current_page > 1) {
                            current_page--;
                            show_page(current_page);
                        }
                        $("#next").removeClass("disabled");
                        if (current_page == 1) {
                            $("#prev").addClass("disabled");
                        }
                    });
                });
            </script>
            <?php $this->load->view('html_end_view'); ?>