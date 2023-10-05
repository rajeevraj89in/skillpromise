<?php
$this->load->view('home_header_view');
$this->load->library('cart');
?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">

                <!--cart page-->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Cart Summary</h4>
                    <div class="cart-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Program (s)</td>
                                    <td class="text-right"><?= $this->cart->total_items(); ?></td>
                                </tr>
                                <tr>
                                    <td class="no-border">Cost</td>
                                    <td class="no-border text-right">INR <?= $this->cart->total() + (($this->cart->total() / 100) * 18); ?></td>
                                </tr>
                            </table>
                        </div>
                        <p class="text-center">

                            <a href="<?php echo(base_url() . "checkout"); ?>" class="btn btn-warning">Proceed to Checkout</a></p>

                    </div>
                </div>
                <!--cart page end-->

                <?php $this->load->view('ProgramSideView'); ?>



            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">My Cart</h1>
                </div>


                <div class="text-justify">
                    <div class="table-responsive">
                        <table class="table">
                            <tr style="background: #25897a; color: #fff;">
                                <th>Program Name</th>
                                <th class="text-center_ pull-right">Cost INR</th>
                                <th class="text-center">Cancel Program</th>
                            </tr>
                            <?php
                            $cart_check = $this->cart->contents();
                            foreach ($cart_check as $key => $value) {
//                                print_r(number_format($value['price'], 2));
//                                die;
                                echo '<tr>';
                                echo '<td class="no-border">' . $value['name'] . '</td>';
                                echo '<td class="no-border text-center_ pull-right">' . number_format($value['price'], 2) . '</td>';
                                echo '<td class="no-border text-center">
                                    <a href="' . base_url() . 'remove_cart/' . $value['rowid'] . '" class="btn btn-warning btn-xs" >
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </a>
                                </td>';
                                echo '</tr>';
                            }
                            ?>
<!--                            <tr>
                                <td class="no-border">Self Assessment & Development Need Analysis (SANA) for School Students</td>
                                <td class="no-border text-center">999</td>
                                <td class="no-border text-center">
                                    <button type="button" class="btn btn-warning btn-xs" onclick="deletecart(7);">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </td>
                            </tr>-->

                            <tr>
                                <td class="no-border_ bold">Subtotal</td>
                                <td class="no-border_ text-center_ pull-right"><?= number_format($sub = $this->cart->total(), 2); ?></td>
                                <td class="no-border_"></td>
                            </tr>
                            <tr>
                                <td class="no-border">GST @ 18%</td>
                                <td class="no-border text-center_ pull-right"><?= $gst = ($sub / 100) * 18; ?></td>
                                <td class="no-border"></td>
                            </tr>
                            <tr style="font-size: 16px;">
                                <td class="bold border-bottom">Total</td>
                                <td class="bold text-center_ border-bottom pull-right"><?= $sub + $gst; ?></td>
                                <?php $total_price = $sub + $gst; ?>
                                <td class="bold border-bottom"></td>
                            </tr>
                        </table>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-6 text-left margin-bottom"><a href="<?php echo(base_url() . "sana-for-school"); ?>" class="btn btn-warning">Explore more Programs</a></div>
                        <div class="col-md-6 text-right margin-bottom"><a href="<?php echo(base_url() . "checkout"); ?>" class="btn btn-warning">Proceed to Checkout</a></div>
                    </div>
                </div>
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>