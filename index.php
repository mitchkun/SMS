<?php/** * Created by PhpStorm. * User: Leon * Date: 02/03/2017 * Time: 8:30 AM */require "Utilities/REQUIRE_SETTINGS.php";if ($_SESSION[SESSION_ACCESS] == 1) {    echo "<script>window.location.href='marks_nav.php'</script>";} else if ($_SESSION[SESSION_ACCESS] == 2) {    echo "<script>window.location.href='dash.php'</script>";} else {    echo "<script>window.location.href='dash.php'</script>";}