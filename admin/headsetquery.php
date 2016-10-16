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
          $editbadge = mysql_query("UPDATE `badgeinv` SET `badgeserial`='$badgeserialnum', `badgestatus`='$badgestatusedit', `dateupdated`='$date' WHERE badgeinvid = '$badgeid'") or die("Verification Error: " . mysql_error());
      }

      	//addbadge
//Open a new connection to the MySQL server
if(isset($_POST['addheadset'])){
    extract($_POST);
    $N = count($headsetserial);
    for($i=0; $i < $N; $i++)
    {
$insert = mysql_query("INSERT INTO `headsetsinv`(`userid`, `dateadded`, `headsetserial`, `headsetstatusid`, `dateupdated`) VALUES ('$userid', '".addslashes($date)."', '".addslashes($headsetserial[$i])."', '".addslashes($headsetstat[$i])."', '".addslashes($date)."')") or die("Verification Error: " . mysql_error());

}
 if($insert)
          {
?>


<script type='text/javascript'>alert('Headset Added Successfully.'); window.location.href = 'headset.php';</script>
        <?php
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

  ?>