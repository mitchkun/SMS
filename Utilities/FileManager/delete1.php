<?php
/**
 * Created by PhpStorm.
 * User: Leon
 * Date: 26/02/2017
 * Time: 10:45 AM
 */

if(!isset($_POST))
{
    error();
    return;
}
if(!isset($_POST['t']) || !isset($_POST['i']))
{
    error();
    return;
}
$table = $_POST['t'];
$id = $_POST['i'];$amt = $_POST['a'];$stud = $_POST['s'];

echo "  
     <!--  Modals-->                     
                            <div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\">
                                <div id='#tempp'></div>
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                                            <h4 class=\"modal-title\" id=\"myModalLabel\">Delete</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                            <button onclick='delete_final()' type=\"button\" class=\"btn btn-primary\">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     <!-- End Modals-->
                     
                          <script type='text/javascript'>
     
     $('#myModal').modal().show();
     
      function delete_final() {
          
          var table = '$table';
          var id = '$id';		  		  var amt = '$amt';		  		  var stud = '$stud';
        $.post('Utilities/FileManager/delete_final1.php',{ t: table, i:id, amt: amt, stud: stud},function (output) {
            $('#temp').html(output);
        });
     };
</script>
                     
                     "

;


function error()
{
    echo "Hesi";
}