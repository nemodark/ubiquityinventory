        <?php
        include "../connection/connection.php";
            date_default_timezone_set('Singapore');
            $date = date('Y-m-d H:i:s');
        error_reporting(0);
        if (isset($_POST['editbtn'])) {
          $badgeid = $_POST['row1'];
          $editbadge = mysql_query("SELECT * FROM badgeinv WHERE `badgeinvid` = '$badgeid'") or die("Verification Error: " . mysql_error());
           while($row = mysql_fetch_array($editbadge)){
      extract($row);
      $return_data['badgeid'] = $badgeinvid;
      $return_data['badgeserial'] = $badgeserial;
      $return_data['badgestatus'] = $badgestatus;
      echo json_encode($return_data);
      exit;
        }
      }
  ?>