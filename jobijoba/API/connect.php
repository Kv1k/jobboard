<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "root";
 $db = "jobboard";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
?>