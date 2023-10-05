<?php
// $this->load->view('home_header_view');
 $this->load->view('home_front_view');
$this->load->library('cart');
?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row mt-5">


            <aside class="col-md-3">

                <!--cart page-->
                <div class="panel panel-primary border cart-summary">
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

                            <a href="<?php echo(base_url() . "checkout"); ?>" class="btn btn-orange btn-block">Proceed to Checkout</a></p>

                    </div>
                </div>
                <!--cart page end-->

                <?php //$this->load->view('ProgramSideView'); ?>



            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h3 class="header_text">My Cart</h3>
                </div>


                <div class="text-justify">
                    <div class="table-responsive">
                        <table class="table">
                            <tr style="background: #25897a; color: #fff;">
                                <th>Program Name</th>
                                <th class="text-center">Cost INR</th>
                                <th class="text-center">Cancel Program</th>
                            </tr>
                            <?php
                            $cart_check = $this->cart->contents();
                            foreach ($cart_check as $key => $value) {
								  $program_type = "";
								  if(array_key_exists('options', $value)){
								      $item_options = $value['options'];
									  if(array_key_exists('program_type', $item_options)){
										  if($item_options['program_type']=='plus')
										    $program_type = ' '.ucfirst( $item_options['program_type']);
									  }
								  }
//                                print_r(number_format($value['price'], 2));
//                                die;
                                echo '<tr>';
                                echo '<td class="no-border">' . $value['name'].$program_type . '</td>';
                                echo '<td class="no-border text-center">' . number_format($value['price'], 2) . '</td>';
                                echo '<td class="no-border text-center">
                                    <a urls="' . base_url() . 'remove_cart/' . $value['rowid'] . '" href="javascript:void(0)" class="btn btn-warning btn-xs remove-item"  >
                                        <span class="glyphicon glyphicon-trash"> </span>Remove
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
                                <td class="no-border_ text-center"><?= number_format($sub = $this->cart->total(), 2); ?></td>
                                <td class="no-border_"></td>
                            </tr>
                            <tr>
                                <td class="no-border">GST @ 18%</td>
                                <td class="no-border text-center"><?= $gst = ($sub / 100) * 18; ?></td>
                                <td class="no-border"></td>
                            </tr>
                            <tr style="font-size: 16px;">
                                <td class="bold border-bottom">Total</td>
                                <td class="bold text-center border-bottom "><?= $sub + $gst; ?></td>
                                <?php $total_price = $sub + $gst; ?>
                                <td class="bold border-bottom"></td>
                            </tr>
                        </table>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-6 text-left"><a href="<?php echo base_url(); ?>" class="btn btn-green">Explore more Programs</a></div>
                        <div class="col-md-6 text-right"><a href="<?php echo base_url() . "checkout"; ?>" class="btn btn-orange">Proceed to Checkout</a></div>
                    </div>
                </div>
            </section><!-- end col-md-9 -->
             <script>
			   $(document).ready(function(){
				   $('.remove-item').click(function(){
					   var url = $(this).attr('urls');
					   //alert(url);
					   var cnf = confirm("Are you sure to remove this item?");
					   if (cnf == true) {
					        window.location=url;
						} 
				   });
			   });
			 </script>

        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>