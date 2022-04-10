<?php
   $host        = "host=ec2-3-230-122-20.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=d81n96517uo41f";
   $credentials = "user=weaplbhgghyjga password=b079b0fe54fda44ad55e4d91b9ec251daa62c7d2e6e4632d8df4800412a9e109";

   $db = pg_connect( "$host $port $dbname $credentials"  );
?>