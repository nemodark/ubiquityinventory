        <?php
        include "../connection/connection.php";
            date_default_timezone_set('Singapore');
            $date = date('Y-m-d H:i:s');
        error_reporting(0);
        if (isset($_POST['removebtn'])) {
          $headsetid = $_POST['row1'];
          $deletebadge = mysql_query("UPDATE headsetinv SET `headsetstatusid`='4', `dateupdated`='$date' WHERE `headsetinvid` = '$headsetid' ") or die("Verification Error: " . mysql_error());
        }
  ?>