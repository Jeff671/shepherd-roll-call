<?php
	include ("connect.php");
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
			<option value="U&D-visit-record.html" >修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" SELECTED >對象資訊編輯 </option>
		</select>
	</h1>
	<form action="insert-namelist.php" method="post">
		<p style="font-size:25px;">出訪對象:
		<input type ="text" name="name" style="height:25px; width:100px;">&nbsp;
		手機:
		<input type ="text" name="phone" style="height:25px; width:100px;">&nbsp;
		<input type ="submit" value="新增名單">
		</p>
	</form>
	<table width="580" align="center" cellpadding="3" cellspacing="0" border="1">
		<tr align=center><td width="60">編號</td><td width="100">對象姓名</td><td width = "200">電話</td><td width = "60">修改</td><td width = "60">刪除</td></tr>
		<?php
		$sql =<<<EOF
				SELECT * from namelist;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<tr align=center><td valign=\"top\" align=\"left\">". $row[0] . "</td><td>".$row[1]."</td><td>".$row[2]."</td><td><a href='update-namelist.php?id=$row[0]&name=$row[1]&phone=$row[2]'>編輯</a></td><td><a href='delete-namelist.php?id=$row[0]' onclick='return(confirm('確定刪除該筆資料？'))'>刪除</a></td></tr>";
					}
				pg_close($db);


		?>
	</table>
</div><!--/ .content-wrapper-->
</center>
</body>
</html>