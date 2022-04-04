<?php
   $host        = "host=ec2-54-173-77-184.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=dfl03sou1d8gk9";
   $credentials = "user=lgzvimsouelcqj password=c3508f62d574dec30263e723ea42311f77af9c6823db7be85c0c874ac041735d";

   $db = pg_connect( "$host $port $dbname $credentials"  );
?>