	<?php 
		$profilename = mysql_query("SELECT * FROM `userprofile` WHERE `userid` = $userid") or die(mysql_error());
                            $resultprof = mysql_num_rows($profilename);
                            $row = mysql_fetch_array($profilename); 
                            extract($row);
	?>