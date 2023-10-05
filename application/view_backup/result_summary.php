<?php
//var_dump($category);
//var_dump($quiz_result);

//die;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/'); ?>animated_favicon.gif" type="image/x-icon">
        <link rel="icon" href="<?php echo(base_url() . 'assets/img/'); ?>animated_favicon.gif" type="image/x-icon">

        <title>:: Quiz Summary ::</title>
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'board_quiz.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css'); ?>" />

        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
    </head>
    <body class="question-palet login">

        <div class="container" id="main">
            <header>
                <nav class="navbar navbar-default navbar-fixed-top" id="navBarTop" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.htm"><img src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>" alt="skillpromise"/></a>
                        </div>

                    </div><!--nav Container end-->

                </nav><!-- navBarTop end -->
            </header>
            <div class="row" id="bigCallout">
                <!--quiz-content-main-->
                <section class="col-md-12">

                    <!--quiz-title-->
                    <div class="row text-center">
                        <h4>Summary of Section(s) Answered</h4>
                        <p><?php echo $quiz_name; ?></p>
                    </div>
                    <!--quiz-title end-->
                    <!--quiz-question-main-->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th class="info">Section Name</th>
                                    <th class="info">No. of Question    </th>
                                    <th class="info">Answered</th>
                                    <th class="info">Not Answered</th>
                                    <th class="info">Marked for Review</th>
                                    <th class="info">Not Visited</th>
                                    <th class="info">Correct</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_question = 0 ;
                                $total_answered = 0 ;
                                $total_review = 0;
                                $total_visited = 0;
                                $total_correct = 0;
                                $flag = 0 ; 
                                
                                foreach ($category as $key => $answer) {

                                    $total_question =  $total_question + $answer['no_of_question'] ;
                                    $total_answered =  $total_answered + $answer['answer'];
                                    $total_review =  $total_review + $answer['marked_for_review'];
                                    $total_visited = $total_visited + $answer['visited'];   
                                    $total_correct = $total_correct + $answer['correct'];
                                    if($flag == 1 ){
                                      $tclass ='success';
                                      $flag = 0 ; 
                                     }
                                     else{
                                      $tclass ='';
                                      $flag = 1 ;   
                                         
                                     }
                                    
                                    echo '<tr class="'.$tclass.'">';
                                    echo  '<td class=" ">'.$answer['name'].'</td>';
                                    echo '<td class=" ">'.$answer['no_of_question'].'</td>';
                                    echo '<td class=" ">'.$answer['answer'].'</td>';
                                    echo '<td class=" ">'.($answer['visited'] - $answer['answer']).'</td>';
                                    echo '<td class=" ">'.$answer['marked_for_review'].'</td>';
                                    echo '<td class=" ">'.($answer['no_of_question'] - $answer['visited']).'</td>';
                                    echo '<td class=" ">'.$answer['correct'].'</td>';
                                    echo '</tr>';    
                                }
                                ?>
                                
                            </tbody>
                            <tfoot>
                                <tr class="warning">
                                    <th class="warning">Total</th>
                                    <th class="warning"><?=$total_question ; ?></th>
                                    <th class="warning"><?=$total_answered ;?></th>
                                    <th class="warning"><?=($total_visited - $total_answered) ?></th>
                                    <th class="warning"><?=$total_review ?></th>
                                    <th class="warning"><?=($total_question  - $total_visited)?></th>
                                    <th class="warning"><?=$total_correct ;?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!--quiz-question-main end-->
                    <!--quiz-bottom-->
                    <div class="row text-center">
                        <a href="<?php echo(base_url());?>" class="btn btn-default"title="">Back</a>
                    </div>
                    <!--quiz-bottom end-->
                </section>
                <!--quiz-content-main end-->
            </div><!-- end bigCallout-->

            <!-- End Content and Sidebar
   ===================================================== -->
        </div><!-- end main -->

        <!-- Footer
===================================================== -->
        <footer id="footer">
            <div class="container">
                <div class="col-md-12" id="copy_right">
                    &copy; by Skillcrop Pvt. Ltd. | All Rights Reserved. | Disclaimer<br/>
                    Powered by <a href="http://www.lexiconconsultants.com/" id="myToolTip" data-toggle="tooltip" data-placement="top" title="Lexicon Consultants Pvt. Ltd.">Lexicon Consultants Pvt. Ltd.</a>
                </div>
            </div>
        </footer>

        <!-- End Footer
===================================================== -->
        <!-- JS section
===================================================== -->
        <script type="text/javascript">

        </script>
        <!-- end JS section
===================================================== -->
    </body>
</html>

