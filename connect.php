<?php
   $host        = "host=ec2-3-218-171-44.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=d7fj66inqi0dpm";
   $credentials = "user=rzsczkwppbtphe password=c8a0aa6b0ed6e793bcaee8291396c596bce8b7fde75e8e0235001b14702528f7";

   $db = pg_connect( "$host $port $dbname $credentials"  );
?>