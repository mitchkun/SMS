<?php

/**

 * Created by PhpStorm.

 * User: Leon

 * Date: 06/03/2017

 * Time: 1:02 PM

 */



require "receiptExt_2.php";

require "../Payment/PaymentExt.php";

require "../Payment/Payment.php";

require "../REQUIRE_SETTINGS.php";

$ids = getAllPaymentsId1($_GET['id']);
$totalPaid = 0;
//foreach ($ids as $id){
$id5 = $_GET['id'];
$html = getReceiptHTML3($id5,"../Payment/Payment.php","../Student/Student.php","../Course/Course.php");
echo $html;
foreach ($ids as $id){
//$html1 = getReceiptHTML1($id,"../Payment/Payment.php","../Student/Student.php","../Course/Course.php");
$pay = new Payment();
if($pay->create_from_id($id))
$totalPaid += $pay->amount;
//echo $html1;
}
if ($pay->course_id < 3)
echo "        <tr class=\"item\">

                <td>

                    School Fees

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/560),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Practical Subjects

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (0/560),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Zondle

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/560),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Sports

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (25/560),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Maintenance

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/560),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Wages

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/560),2) . "

                </td>
            </tr>
                            <tr class=\"item\">

                <td>

                    Services

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (60/560),2) . "

                </td>
            </tr>                <tr class=\"item\">

                <td>

                    Bank Charges

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (15/560),2) . "

                </td>
            </tr>
            <tr class=\"total\">
            
                <td></td>
                <td><strong>Total :</strong></td>
                
                <td>

                   <strong>E$totalPaid</strong>

                </td>

            </tr></table>

    </div>
<button id='printPageButton' onClick='window.print()'>Print</button>
</body>

</html>";

else if ($pay->course_id < 5) {
    echo "        <tr class=\"item\">

                <td>

                    School Fees

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Practical Subjects

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (20/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Zondle

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Sports

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (25/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Maintenance

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Wages

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/580),2) . "

                </td>
            </tr>
                            <tr class=\"item\">

                <td>

                    Services

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (60/580),2) . "

                </td>
            </tr>                <tr class=\"item\">

                <td>

                    Bank Charges

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (15/580),2) . "

                </td>
            </tr>
            <tr class=\"total\">
            
                <td></td>
                <td><strong>Total :</strong></td>
                
                <td>

                   <strong>E$totalPaid</strong>

                </td>

            </tr></table>

    </div>
<button id='printPageButton' onClick='window.print()'>Print</button>
</body>

</html>";

}
else if ($pay->course_id < 6) {
    echo "        <tr class=\"item\">

                <td>

                    School Fees

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/640),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Practical Subjects

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/640),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Zondle

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/640),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Sports

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (25/640),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Maintenance

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/640),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Wages

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/640),2) . "

                </td>
            </tr>
                            <tr class=\"item\">

                <td>

                    Services

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (60/640),2) . "

                </td>
            </tr>                <tr class=\"item\">

                <td>

                    Bank Charges

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (15/640),2) . "

                </td>
            </tr>
            <tr class=\"total\">
            
                <td></td>
                <td><strong>Total :</strong></td>
                
                <td>

                   <strong>E$totalPaid</strong>

                </td>

            </tr></table>

    </div>
<button id='printPageButton' onClick='window.print()'>Print</button>
</body>

</html>";

}
else if ($pay->course_id < 8) {
    echo "        <tr class=\"item\">

                <td>

                    School Fees

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/670),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Practical Subjects

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (110/670),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Zondle

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/670),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Sports

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (25/670),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Maintenance

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/670),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Wages

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/670),2) . "

                </td>
            </tr>
                            <tr class=\"item\">

                <td>

                    Services

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (60/670),2) . "

                </td>
            </tr>                <tr class=\"item\">

                <td>

                    Bank Charges

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (15/670),2) . "

                </td>
            </tr>
            <tr class=\"total\">
            
                <td></td>
                <td><strong>Total :</strong></td>
                
                <td>

                   <strong>E$totalPaid</strong>

                </td>

            </tr></table>

    </div>
<button id='printPageButton' onClick='window.print()'>Print</button>
</body>

</html>";
}

else {
    echo "        <tr class=\"item\">

                <td>

                    School Fees

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Practical Subjects

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (20/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Zondle

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Sports

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (25/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Maintenance

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (80/580),2) . "

                </td>
                </tr>
                <tr class=\"item\">

                <td>

                    Wages

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (150/580),2) . "

                </td>
            </tr>
                            <tr class=\"item\">

                <td>

                    Services

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (60/580),2) . "

                </td>
            </tr>                <tr class=\"item\">

                <td>

                    Bank Charges

                </td>
                
                <td>

                    

                </td>

                <td>

                    E". number_format((float)$totalPaid * (15/580),2) . "

                </td>
            </tr>
            <tr class=\"total\">
            
                <td></td>
                <td><strong>Total :</strong></td>
                
                <td>

                   <strong>E$totalPaid</strong>

                </td>

            </tr></table>

    </div>
<button id='printPageButton' onClick='window.print()'>Print</button>
</body>

</html>";
}



