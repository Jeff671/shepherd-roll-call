<?php
	include ("connect.php");
	$n=$_COOKIE['nameid'];$v=$_COOKIE['visitor'];$d=$_COOKIE['date'];
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="style.css" media="screen"/>
<title>探望名單線上記錄系統</title>
</head>
<body style="background-color: #ebeeeb;">
<center><h1 style="font-size:40px;">探望名單線上記錄系統</h1>
<div class="content-wrapper clearfix">
	<h1 class="content-title"  style="font-size:30px;">
		<select style="font-size:30px;" onChange="location = this.options[this.selectedIndex].value;">
			<option value="index.html" >出訪紀錄查詢 </option>
			<option value="create-visit-record.php" >出訪紀錄填寫 </option>
			<option value="U&D-visit-record.html" SELECTED>修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" >對象資訊編輯 </option>
		</select>
	</h1>
<?php	
	 $sql =<<<EOF
      delete from visitinfo where nameid=$n and visitor='$v' and date='$d';
EOF;
$ret = pg_query($db, $sql);
pg_close($db);
echo "刪除紀錄成功!";

?> 
</div><!--/ .content-wrapper-->
</center>
</body>
</html>