<?php
	#Enter ur OWN host,port,datebase name and user name
   $host        = "host=";
   $port        = "port=";
   $dbname      = "dbname=";
   $credentials = "user=";

   $db = pg_connect( "$host $port $dbname $credentials"  );
?>