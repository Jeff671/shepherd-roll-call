<?php
	include ("connect.php");
	$nameid = $_POST["name"];
	$visitor = $_POST["visitor"];
	$date = $_POST["date"];
	$situation = $_POST["situation"];
	$remark = $_POST["remark"];
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
			<option value="create-visit-record.php" SELECTED>出訪紀錄填寫 </option>
			<option value="U&D-visit-record.html" >修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" >對象資訊編輯 </option>
		</select>
	</h1>
<?php	
if($nameid==null || $visitor==null || $date==null || $situation==null)
{
	echo "<script>if(confirm('請確實填寫填表者姓名、日期、回訪對象姓名與情形')){document.location.href='create-visit-record.php'};</script>";
}
	$sql =<<<EOF
	SELECT nameid,visitor,date,situation,remark from visitinfo;
EOF;
	$ret = pg_query($db, $sql);
	if(!$ret){
	echo pg_last_error($db);
	echo "查無結果";
	exit;
	} 
	while($row = pg_fetch_row($ret)){
		if($row["nameid"]==$nameid && $row["visitor"]==$visitor && $row["date"]==$date && $row["situation"]==$situation && $row["remark"]==$remark)
		{
			echo "<script>if(confirm('已有相同資料，請確認後再填寫!')){document.location.href='create-visit-record.php'};</script>";
		}
	}
	
	
	 $sql =<<<EOF
      INSERT INTO visitinfo (nameid,visitor,date,situation,remark)
      VALUES ($nameid,'$visitor','$date','$situation','$remark');
EOF;
$ret = pg_query($db, $sql);
pg_close($db);
echo "新增紀錄成功!";
?> 
</div><!--/ .content-wrapper-->
</center>
</body>
</html>