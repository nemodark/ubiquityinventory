        <?php
        include "../connection/connection.php";
            date_default_timezone_set('Singapore');
            $date = date('Y-m-d H:i:s');
        error_reporting(0);
        if (isset($_POST['editbtn'])) {
          $headsetid = $_POST['row1'];
          $editheadset = mysql_query("SELECT * FROM headsetsinv WHERE `headsetinvid` = '$headsetid'") or die("Verification Error: " . mysql_error());
           while($row = mysql_fetch_array($editbadge)){
      extract($row);
      $return_data['headsetid'] = $headsetid;
      $return_data['headsetserial'] = $headsetserial;
      $return_data['headsetstatus'] = $headsetstatus;
      echo json_encode($return_data);
      exit;
        }
      }
  ?>