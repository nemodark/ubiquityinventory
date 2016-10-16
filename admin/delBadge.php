        <?php
        include "../connection/connection.php";
            date_default_timezone_set('Singapore');
            $date = date('Y-m-d H:i:s');
        error_reporting(0);
        if (isset($_POST['removebtn'])) {
          $badgeid = $_POST['row1'];
          $deletebadge = mysql_query("UPDATE badgeinv SET `badgestatusid`='4', `dateupdated`='$date' WHERE `badgeinvid` = '$badgeid' ") or die("Verification Error: " . mysql_error());
        }
  ?>