<?php
   $host        = "host=ec2-3-218-171-44.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=dd08i8036k6pnj";
   $credentials = "user=tltebfnbeunpip password=b1e3da8a5b02a7da22ed30077cf07c50c8f43d5184f85bb8bf9147685b97132a";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database";
   } else {
      echo "Opened database successfully";
   }
?>