<?php/** * Created by PhpStorm. * User: Leon * Date: 06/03/2017 * Time: 1:17 PM */function getReceiptHTML5($id,$require_payment,$require_student,$require_course){    require_once $require_payment;    require_once $require_student;    require_once $require_course;    $student = new Student();    $student->create_from_id($_GET['id']);        $course = new Course();    $course->create_from_id($student->course_id);        $ids = getAllPaymentsId($_GET['id']);$html = "<!doctype html><html><head>    <meta charset=\"utf-8\">    <title>General Ledger</title>        <style>    .invoice-box{        max-width:800px;        margin:auto;        padding:30px;        border:1px solid #eee;        box-shadow:0 0 10px rgba(0, 0, 0, .15);        font-size:16px;        line-height:24px;        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;        color:#555;    }    @page { size: auto;  margin: 0mm; }    @media print {        #printPageButton {        display: none;        }    }    .invoice-box table{        width:100%;        line-height:inherit;        text-align:left;    }        .invoice-box table td{        padding:5px;        vertical-align:top;    }        .invoice-box table tr td:nth-child(2){        text-align:right;    }        .invoice-box table tr.top table td{        padding-bottom:20px;    }        .invoice-box table tr.top table td.title{        font-size:45px;        line-height:45px;        color:#333;    }        .invoice-box table tr.information table td{        padding-bottom:40px;    }        .invoice-box table tr.heading td{        background:#eee;        border-bottom:1px solid #ddd;        font-weight:bold;    }        .invoice-box table tr.details td{        padding-bottom:20px;    }        .invoice-box table tr.item td{        border-bottom:1px solid #eee;    }        .invoice-box table tr.item.last td{        border-bottom:none;    }        .invoice-box table tr.total td:nth-child(2){        border-top:2px solid #eee;        font-weight:bold;    }        @media only screen and (max-width: 600px) {        .invoice-box table tr.top table td{            width:100%;            display:block;            text-align:center;        }                .invoice-box table tr.information table td{            width:100%;            display:block;            text-align:center;        }    }    </style></head><body>    <div class=\"invoice-box\">        <table cellpadding=\"0\" cellspacing=\"0\">            <tr class=\"top\">                <td colspan=\"2\">                    <table>                        <tr>                            <td class=\"title\">                                <img src=\"../../assets/img/Annadale_logo - Copy.png\" style=\"width:100%; max-width:300px;\">                            </td>                                                        <td>                                <br>                            </td>                        </tr>                    </table>                </td>            </tr>                        <tr class=\"information\">                <td colspan=\"3\">                    <table>                    <tr><H1>Class Ledger</H1></tr>                        <tr>                               <td>" .                                 SYSTEM_NAME . "<br>                                Box A14<br>                                MAYIWANE<br>                                +268 2435 1516                            </td>                                                        <td>                                $course->name<br>                                Course ID: $course->ID<br>".                                $_GET['num'] . " students <br>                                                            </td>                        </tr>                    </table>                </td>            </tr>                                    <tr class=\"heading\">                <td>                    Account                </td>                <td>                    Note                </td>                <td>                    Amount                </td>            </tr>            ";return $html;} function getReceiptHTML2($id,$require_payment,$require_student,$require_course){      require_once $require_payment;    require_once $require_student;    require_once $require_course;        $student = new Student();    $student->create_from_id($_GET['id']);           $ids = getAllPaymentsId($_GET['id']);    $payment_id = $id;    $payment = new Payment();    $payment->create_from_id($payment_id);                 require (REQUIRE_CONNECTION);                            $query2 = "             SELECT                  balance            FROM payments             WHERE ID = '" . $payment_id . "'        ";                try {            //$stmt   = $db->prepare($query);            $stmt2 = $db->prepare($query2);            //$result = $stmt->execute();            $result2 = $stmt2->execute();        }        catch (PDOException $ex) {            die ($ex);            return false;        }                        $data2 = $stmt2->fetch();        $bal = $data2['balance'];    $receipt_number = $payment->ID + 100;    $student = new Student();    $student->create_from_id($payment->student_id);    $course = new Course();    $course->create_from_id($payment->course_id);              $html = "            <tr class=\"item\">                <td>                    $course->name                </td>                                <td>                    $payment->date                </td>                <td>                    E$payment->amount                </td>                            </tr>                <tr class=\"total\">                            <td></td>                <td></td>                                <td>                   <strong>Balance : E$bal</strong>                </td>            </tr>";    return $html;}