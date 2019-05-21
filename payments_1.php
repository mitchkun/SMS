﻿<?phprequire "Utilities/REQUIRE_SETTINGS.php";require "Utilities/URL_MANAGER.php";require "Utilities/Payment/PaymentExt_1.php";require "Utilities/Payment/Payment_1.php";require "Utilities/Course/Course.php";require "Utilities/Student/Student.php";//require "Utilities/Payment/PaymentExt_1.php";//require "Utilities/Payment/Payment_1.php";?><!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml"><head>    <meta charset="utf-8" />    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <title><?php  echo "Payments" ?></title>   <!-- BOOTSTRAP STYLES-->    <link href="assets/css/bootstrap.css" rel="stylesheet" />    <!-- FONTAWESOME STYLES-->    <link href="assets/css/font-awesome.css" rel="stylesheet" />    <!-- MORRIS CHART STYLES-->    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />    <!-- CUSTOM STYLES-->    <link href="assets/css/custom.css" rel="stylesheet" /></head><body><div id="wrapper" ><nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background: #3F51B5;">    <div class="navbar-header">        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">            <span class="sr-only">Toggle navigation</span>            <span class="icon-bar"></span>            <span class="icon-bar"></span>            <span class="icon-bar"></span>        </button>        <a class="navbar-brand" style="background: #3F51B5;color: #fff;font-size: 22px" href=""><?php echo SYSTEM_NAME ?></a> <h1 style="float: right;color: #fff">Expenditures</h1>    </div>    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <a href="register_payment_1.php" class="btn btn-danger square-btn-adjust">New Payment</a> </div></nav><!-- NAV SIDE --><?phprequire('nav_side.php');?><!-- END NABV SIDE --><div id="page-wrapper" >    <div id="page-inner">        <!-- /. ROW  -->        <div class="row" style="padding: 2%;">            <?php            $ids = getAllPaymentsId2();            $number_of_ids = 0;            foreach ($ids as $id)                $number_of_ids++;            echo "<div class=\"panel panel-default\">                <div class=\"panel-heading\">            <form action=\"Utilities/receipt_1/receipt_1_1.php\" method=\"post\">                    <input   id=\"date_start\" type=\"text\" name=\"date_start\"  class=\"form-control\" placeholder=\"Start - Date: YYYY-MM-DD\"/>                    <br>                    <input   id=\"date_end\" type=\"text\" name=\"date_end\"  class=\"form-control\" placeholder=\"End - Date: YYYY-MM-DD\"/>                    <br>                    <button type=\"submit\" class=\"btn btn-primary btn-lg\" style=\"width: 20%\">                                Display                            </button>                    </form>                </div>                <div class=\"panel-body\">                    <div class=\"table-responsive\">                        <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">                            <thead>                                        <tr>                                            <th>Payment #</th>                                            <th>Supplier</th>                                             <th>Description</th>                                            <th>Amount Paid</th>                                            <th>Ref Num</th>                                                                                        <th>Date Paid</th>                                                                                        <th>Options</th>                                                                                                                                                                            </tr>                                    </thead>                                    <tbody>                                    ";            $totalPay = 0;            $totalBal = 0;            foreach ($ids as $id)            {                $payment = new Payment_1();                if(!$payment->create_from_id($id)){                    echo "here";                    continue;                }                                                                //$totalBal += $bal;        $totalPay += $payment->amount;                $receipt_number = $id + 100;                echo "                           <tr class=\"odd gradeX\">                                            <td><a href='Utilities/receipt/receipt_1.php?id=$payment->ID'>$receipt_number</a> </td>                                            <td>$payment->supplier</td>                                            <td>$payment->descr</td>                                            <td value='$payment->amount'> R" . number_format((float)$payment->amount,2)."</td>                                            <td>$payment->ref</td>                                                                                            <td>$payment->date</td>                                                    <td> <div class=\"btn-group\">											  <button data-toggle=\"dropdown\" class=\"btn btn-success dropdown-toggle\">Options <span class=\"caret\"></span></button>											  <ul class=\"dropdown-menu\">											  <li><a href='Utilities/receipt/receipt.php?id=$payment->ID'>View</a></li>											  <li class=\"divider\"></li>												<!--<li><a href='#'>Edit</a></li>-->												<li><a href='#' onclick='delete_item($payment->ID)'>Delete</a></li>											  </ul>											</div>											</td>                                                                                    </tr>                                                                         ";            }            ?>                                                                        </tbody>                                  <tr>                                            <td></td>                                            <td></td>                                                                                        <td><strong>Total Payments</strong></td>                                            <td> <?php echo"R" . number_format((float)$totalPay,2) ?></td>                                            <td></td>                                            <td></td>                                                                                            <td></td>                                            </tr>                        </table>                    </div>                </div>            </div>                    <!--End Advanced Tables -->                    </div>    </div><div id="temp"></div></div><script src="assets/js/jquery-1.10.2.js"></script><!-- BOOTSTRAP SCRIPTS --><script src="assets/js/bootstrap.min.js"></script><!-- METISMENU SCRIPTS --><script src="assets/js/jquery.metisMenu.js"></script><!-- DATA TABLE SCRIPTS --><script src="assets/js/dataTables/jquery.dataTables.js"></script><script src="assets/js/dataTables/dataTables.bootstrap.js"></script><script>    $(document).ready(function () {        $('#dataTables-example').dataTable();            });</script><script>  </script><!-- CUSTOM SCRIPTS --><script src="assets/js/custom.js"></script><script type="text/javascript">    function delete_item(id) {        var table = "purchases";				        $.post('Utilities/FileManager/delete2.php',{ t: table, i:id },function (output) {            $('#temp').html(output);        });    }</script></body></html>