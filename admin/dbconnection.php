<?php
   $dbconn=mysql_connect("localhost","root","");
   if($dbconn)
   {
   	mysql_select_db('stem');
   }
   else
   {
   	echo "Database not connected";
   }
?>