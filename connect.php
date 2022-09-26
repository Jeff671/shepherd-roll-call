<?php

   $host        = "host=";
   $port        = "port=";
   $dbname      = "dbname=";
   $credentials = "user=";

   $db = pg_connect( "$host $port $dbname $credentials"  );
?>