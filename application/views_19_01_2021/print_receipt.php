<?php
$this->load->view('header_view');
$filter[0]["id"] = "users";
$filter[0]["value"] = $user_id;
$req = array("package");
$packages = $this->main_model->get_many_records("users-package", $filter, $req, "id");
$package_name = "";
$i = 1;


list($year, $month, $day) = explode('-', date("Y-m-d"));
//list($year, $month, $day) = explode('-', date("2020-04-01"));

$current_year = substr($year, -2);

$current_month = $month;

if ($current_month >= 01) {
    $created_year = substr(($current_year + 1), -2);
    $year_diff = ($current_year . "-" . $created_year);
} else {
    $created_year = substr(($current_year - 1), -2);
    $year_diff = $created_year . "-" . $current_year;
}
$prefix = "INV" . "-" . $year_diff . "-";
$row = $this->db->query('SELECT MAX(invoice) AS `invoice`,id FROM `payment_details`')->row();
$invoice_string = $row->invoice;
$invoice_id = $row->id;
list($str, $currentyear, $nextyear, $num) = explode('-', $invoice_string);
$year_diff_old = $currentyear . '-' . $nextyear;

if ($invoice_id != $payment_id) {
    $last_num_increase = $num + 1;
} else {
    $last_num_increase = $num;
}
$inv_id = $prefix . sprintf("%04s", $last_num_increase);
$pdata['invoice'] = $inv_id;
$pdata['id'] = $payment_id;
$this->main_model->add_update_record('payment_details', $pdata, 'id');
$user_details = $this->main_model->get_records_from_id("users", $user_id, "id");
$payment_details = $this->main_model->get_records_from_id("payment_details", $payment_id, "id");
?>
<style type="text/css">
    /* Styles go here */
    .page-header-print, .page-footer-print, .page-header-space, .page-footer-space{ display: none; visibility: hidden; }
    .page-header-new{
        height: 259px;
        font-size: 12px;
        line-height: normal;
        color: #000;
        margin-top: 52px;
        border-bottom: none;

    }
    .page-header-new table td, .page-header-print table td{padding: 2px 5px;}

    .page-footer{
        height: 50px;
        border-top: 1px solid #dcdcdc;
        padding: 5px 0 0;

    }
    .page-header-new p{
        margin: 0 0 5px;
    }

    .page {
        page-break-after: always;
        margin: 12px 0;
        position: relative;
        top: 0;
    }
    .billing-table{
        border: 1px solid #d2d0d0;
    }
    .billing-table tbody td{padding: 29px 5px;}
    .billing-table td, .billing-table th{
        padding: 1px 5px;
    }
    .bank-dtail{
        margin: 20px 0 0;
    }
    .bank-dtail td p, .billing-table th p{ margin: 0; }
    @page {
        font-size: 15px;
    }

    @media print {
        body {
            font-size: 0.85rem;
            background: #fff;
        }
        .page{
            position: relative;
            top:250px;
            margin: 150px 0 0;
        }
        .page-header-new, .page-footer{display: none; visibility: hidden;}
        .page-header-space{ height: 5px;}
        .page-header-print{
            height: 259px;
            display: block;
            visibility: visible;
            position: fixed;
            top: 14mm;
            background: #fff;
            font-size: 12px;
            line-height: normal;
            border-bottom: none;
            color: #000;
            width: 90%;
            left: 22%;
            margin-left: -17%;
        }
        .page-footer-print, .page-footer-space{height: 50px; }
        .page-footer-print{
            display: block;
            visibility: visible;
            position: fixed;
            bottom: 0;
            border-top: 1px solid #dcdcdc;
            width: 100%;
            width: 90%;
            left: 22%;
            margin-left: -17%;
        }
        .page-footer-print a{ text-decoration: none; }

        thead {display: table-header-group;}
        tfoot {display: table-footer-group;}

        button#print {display: none !important; visibility: hidden;}

        body {margin: 0;}
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--fixed header and footer-->
            <div class="page-header-print" >
                <table width="100%" style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0">
                    <thead>
                        <tr>
                            <td style="padding: 6px 0; color: #ffffff; border-bottom: none; background: #88b84d;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td valign="middle" style="text-align: center; font-size: 26px; font-weight: bold;">Program Purchase Receipt</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 9px 0 0;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td width="70%" valign="top">
                                                <h6 style="color: #909090; font-weight: 600; font-size: 22px;">Sana Skillpromise Education Private Limited</h6>
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td width="30%" colspan="2" valign="top" align="left">
                                                            F 1, Malik Buildcon Plaza,
                                                            Plot Number 2, Pocket 6,
                                                            Sector 12, Dwarka,
                                                            Delhi - 110078
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6 style="color: #000000; font-weight: 600;">Bill To</h6></td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left"><strong>Customer Name</strong></td>
                                                        <td valign="top"> :</td>
                                                        <td valign="top" ><?php echo $user_details["name"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left"><strong>Billing Address</strong></td>
                                                        <td valign="top"> :</td>
                                                        <td valign="top" ><?php echo $user_details["address"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left"><strong>Phone No</strong></td>
                                                        <td valign="top"> :</td>
                                                        <td valign="top" ><?php echo $user_details["mobile"]; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td  valign="top">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td valign="middle" width="40%"><img style="margin-bottom: 37px; height:56px;" src="http://preetek.com:5091/skillPromise_testing/dev/assets/img/logo.png" alt=""></td>
                                                    </tr>
                                                </table>
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td width="40%" valign="top" align="left"><strong>Receipt Number</strong></td>
                                                        <td valign="top"> :</td>
                                                        <td valign="top" ><?php echo $payment_details['invoice']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left"><strong>Receipt Date</strong></td>
                                                        <td valign="top"> :</td>
                                                        <td valign="top" ><?php echo $payment_details['date']; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <div class="page-footer-print text-center">
                ©| All Rights Reserved. | Disclaimer<br>
                Powered by <a href="http://www.lexiconconsultants.com/" id="myToolTip" data-toggle="tooltip" data-placement="top" title="Lexicon Consultants Pvt. Ltd.">Lexicon Consultants Pvt. Ltd.</a>
            </div>
            <!--fixed header and footer end-->


            <!--print invoice page-->
            <table width="100%" style="margin: 0 auto;">
                <thead>
                    <tr>
                        <td>
                            <!--place holder for the fixed-position header-->
                            <div class="page-header-space"></div>
                            <div class="page-header-new" >
                                <table width="100%" style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0">
                                    <thead>
                                        <tr>
                                            <td style="padding: 6px 0; color: #ffffff; border-bottom: none; background: #88b84d;">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td valign="middle" style="text-align: center; font-size: 26px; font-weight: bold;">Program Purchase Receipt</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 9px 0 0;">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="70%" valign="top">
                                                                <h6 style="color: #909090; font-weight: 600; font-size: 22px;">Sana Skillpromise Education Private Limited</h6>
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td width="30%" colspan="2" valign="top" align="left">
                                                                            F 1, Malik Buildcon Plaza,
                                                                            Plot Number 2, Pocket 6,
                                                                            Sector 12, Dwarka,
                                                                            Delhi - 110078
                                                                        </td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><h6 style="color: #000000; font-weight: 600;">Bill To</h6></td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top" align="left"><strong>Customer Name</strong></td>
                                                                        <td valign="top"> :</td>
                                                                        <td valign="top" ><?php echo $user_details["name"]; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top" align="left"><strong>Billing Address</strong></td>
                                                                        <td valign="top"> :</td>
                                                                        <td valign="top" ><?php echo $user_details["address"]; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top" align="left"><strong>Phone No</strong></td>
                                                                        <td valign="top"> :</td>
                                                                        <td valign="top" ><?php echo $user_details["mobile"]; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td  valign="top">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td valign="middle" width="40%"><img style="margin-bottom: 37px; height:56px;" src="http://preetek.com:5091/skillPromise_testing/dev/assets/img/logo.png" alt=""></td>
                                                                    </tr>
                                                                </table>
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td width="40%" valign="top" align="left"><strong>Receipt Number</strong></td>
                                                                        <td valign="top"> :</td>
                                                                        <td valign="top" ><?php echo $payment_details['invoice']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top" align="left"><strong>Receipt Date</strong></td>
                                                                        <td valign="top"> :</td>
                                                                        <td valign="top" ><?php echo $payment_details['date']; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <!--*** CONTENT GOES HERE ***-->
                            <!--div class="page">page1</div>
                            <div class="page">page2</div-->
                            <div class="page">
                                <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <thead style="background: #f5f5f5;">
                                        <tr>
                                            <th valign="middle" class="text-center text-uppercase">Description</th>
                                            <th valign="middle" class="text-center text-uppercase">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($packages as $key => $value) {
                                            $amount += $this->main_model->get_name_from_id("packages", "price", $value["package"], "id");
                                            echo '<tr>';
                                            echo '<td class="border text-left">' . $this->main_model->get_name_from_id("packages", "name", $value["package"], "id") . '</td>';
                                            echo '<td class="border text-right">' . number_format($this->main_model->get_name_from_id("packages", "price", $value["package"], "id"), 2) . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>


<!--                                        <tr>
    <th valign="middle" class="text-left">Self-Assessment & Development Need Analysis Program</th>
    <td valign="middle" class="text-left">999.0</td>
</tr>
<tr>
    <th valign="middle" class="text-left">Aptitude Development Program</th>
    <td valign="middle" class="text-left">249.0</td>
</tr>
                                        --><tr>
                                            <th valign="middle" class="text-right" style="border-top: 1px solid transparent;border-left: 1px solid transparent; border-bottom: 1px solid transparent;">Subtotal</th>
                                            <td valign="middle" class="text-right"><?php echo round($amount, 2) ?></td>
                                        </tr>
                                        <tr>
                                            <th valign="middle" class="text-right" style="border-top: 1px solid transparent;border-left: 1px solid transparent; border-bottom: 1px solid transparent;">GST 18.0%</th>
                                            <td valign="middle" class="text-right"><?php echo $gst = round((18 * $amount) / 100, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <th valign="middle" class="text-right" style="font-size: 18px; border-top: 1px solid transparent;border-left: 1px solid transparent; border-bottom: 1px solid transparent;">Total</th>
                                            <td style="font-size: 18px;" valign="middle" class="text-right"><?php echo round(($amount + $gst), 2) ?></td><!--
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <div class="page-header-space"></div>
                            <!--place holder for the fixed-position footer-->
                            <div class="page-footer text-center">
                                ©| All Rights Reserved. | Disclaimer<br>
                                Powered by <a href="http://www.lexiconconsultants.com/" id="myToolTip" data-toggle="tooltip" data-placement="top" title="Lexicon Consultants Pvt. Ltd.">Lexicon Consultants Pvt. Ltd.</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div style="text-align: center;">
                <button id="print" onClick="window.print()" class="btn btn-primary">Print</button>
            </div>
            <!--print invoice page end-->
            <!------------------Modal-Start------------------>

            <div class="modal fade" id="sucess_modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Thank you for your Order and Registration on Skillpromise.com. Please follow the following steps to complete your registration process:</h4>
                                    <ul class="custom">
                                        <li>Check for our Email in your Inbox.</li>
                                        <li>Click the link “Confirm” in the Email that you will receive from us</li>
                                        <li>Download your Art of Building e-Book</li>
                                        <li>If you do not receive our Email, please contact </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" ><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------Modal-End---------------->
        </div>
    </div>
</div>
<!--?php $this->load->view('footer_view'); ?-->
</div>
<?php $this->load->view('html_end_view'); ?>
<script>

    $(document).on('ready', function () {
        if (<?php echo $_SESSION['modal_flag']; ?> == 2) {
<?php // $_SESSION['modal_flag'] = 0;                                                                                                ?>
            $('#sucess_modal2').modal('show');
        }
    });
</script>
