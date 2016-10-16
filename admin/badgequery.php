        <?php
        include "../connection/connection.php";
            date_default_timezone_set('Singapore');
            $date = date('Y-m-d H:i:s');
        error_reporting(0);

        //editbadge
        if (isset($_POST['editsubbtn'])) {
          $badgeid = $_POST['badgeid'];
          $badgeserialnum = $_POST['badgeserialnum'];
          $badgestatusedit = $_POST['badgestatusedit'];
          $editbadge = mysql_query("UPDATE `badgeinv` SET `badgeserial`='$badgeserialnum', `badgestatusid`='$badgestatusedit', `dateupdated`='$date' WHERE badgeinvid = '$badgeid'") or die("Verification Error: " . mysql_error());
      }

      	//addbadge
//Open a new connection to the MySQL server
if(isset($_POST['addbadgenow'])){
    extract($_POST);
    $N = count($badgeserial);
    for($i=0; $i < $N; $i++)
    {
$insert = mysql_query("INSERT INTO `badgeinv`(`userid`, `dateadded`, `badgeserial`, `badgestatusid`, `dateupdated`) VALUES ('$userid', '".addslashes($date)."', '".addslashes($badgeserial[$i])."', '".addslashes($badgestat[$i])."', '".addslashes($date)."')") or die("Verification Error: " . mysql_error());

}
 if($insert)
          {
?>


<script type='text/javascript'>alert('Badge Added Successfully.'); window.location.href = 'badge.php';</script>
        <?php
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

  ?>