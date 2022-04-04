<?php
	include ("connect.php");
	$id = $_GET["id"];
	$name=$_GET["name"];
	$remark = $_GET["remark"];
	setcookie('id',$id);
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="style.css" media="screen"/>
<title>44會所探望名單線上記錄系統</title>
</head>
<body style="background-color: #ebeeeb;">
<center><h1 style="font-size:40px;">44會所探望名單線上記錄系統</h1>
<div class="content-wrapper clearfix">
<!-- 搜尋欲修改的資料內容 並顯示在各元件內-->

	<h1 class="content-title"  style="font-size:30px;">
		<select style="font-size:30px;" onChange="location = this.options[this.selectedIndex].value;">
			<option value="index.html" >出訪紀錄查詢 </option>
			<option value="create-visit-record.php" >出訪紀錄填寫 </option>
			<option value="U&D-visit-record.html" >修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" SELECTED>被看望者資訊編輯 </option>
		</select>
	</h1>
	
	<form action="update-namelist-run.php" method="post">
			<h3 style="font-size:22px;">被看望者:<input type ="text" value="<?php echo $name;?>" name="name" style="margin:0px 0px 0px 30px; height:30px; width:120px;"></h3><br />
			
			<h3 style="font-size:22px;">備註:<textarea name="remark" style="height:80px;width:300px; margin:0px 0px 0px 30px;"><?php echo "$remark"; ?></textarea></h3>
			
			<input type ="submit" value="送出">&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" onclick="location.href='CUD-namelist-show.php'">
			</form>
</div><!-- -->
</center>
</body>
</html>