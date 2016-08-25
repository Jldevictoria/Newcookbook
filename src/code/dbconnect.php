<?php
			
    //Variables for connecting to your database.
    //These variable values come from your hosting account.
    $hostname = "ncbusers.db.11396382.hostedresource.com";
    $username = "ncbusers";
    $dbname = "ncbusers";

    //These variable values need to be changed by you before deploying
    $password = "Fire0p@ls";
			
    //Connecting to your database
    mysql_connect($hostname, $username, $password) OR DIE ("Unable to connect to database! Please try again later.");
    mysql_select_db($dbname);
?>