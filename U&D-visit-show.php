<?php
	include ("connect.php");
	$name = $_POST["name"];
	$date = $_POST["date"];
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
	<form action="visit-search-show.php" method="post">
		<p style="font-size:20px;">訪問者查詢:
		<input type ="text" name="name" style="width:100px;">&nbsp
		<label for="bookdate">日期：</label>
		<input type="month" name="date">&nbsp&nbsp
		<input type ="submit" value="送出">
		</p>
	</form>
	<table width="580" align="left" cellpadding="3" cellspacing="0" border="1">
		<tr align=center><td width="100">對象姓名</td><td width = "200">電話</td><td width="100">探訪者</td><td width = "200">日期</td><td width = "300">情&nbsp形</td><td width = "100">備&nbsp註</td><td width = "100">修改&刪除</td></tr>
		<?php
			if($name!=null && $date==null)
			{
				$sql =<<<EOF
				SELECT name,phone,visitor,date,situation,remark from namelist as a inner join visitinfo as b on a.id=b.nameid where visitor LIKE '$name%' order by date;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<tr align=center><td valign=\"top\" align=\"left\">". $row[0] . "</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><a href='U&D-recode.php?name=$row[0]&visitor=$row[2]&date=$row[3]'>編輯</a></td></tr>";
					}
				pg_close($db);
			}
			else if($name==null && $date!=null)
			{
				$sql =<<<EOF
				SELECT name,phone,visitor,date,situation,remark from namelist as a inner join visitinfo as b on a.id=b.nameid where date LIKE '$date%' order by date;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<tr align=center><td valign=\"top\" align=\"left\">". $row[0] . "</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><a href='U&D-recode.php?name=$row[0]&visitor=$row[2]&date=$row[3]'>編輯</a></td></tr>";
					}
				pg_close($db);
			}
			else if($name!=null && $date!=null)
			{
				$sql =<<<EOF
				SELECT name,phone,visitor,date,situation,remark from namelist as a inner join visitinfo as b on a.id=b.nameid where visitor LIKE '$name%', date LIKE '$date%' order by date;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<tr align=center><td valign=\"top\" align=\"left\">". $row[0] . "</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><a href='U&D-recode.php?name=$row[0]&visitor=$row[2]&date=$row[3]'>編輯</a></td></tr>";
					}
				pg_close($db);
			}
			else
			{
				$sql =<<<EOF
				SELECT name,phone,visitor,date,situation,remark from namelist as a inner join visitinfo as b on a.id=b.nameid order by date;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<tr align=center><td valign=\"top\" align=\"left\">". $row[0] . "</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><input type="button" value="編輯" onclick="location.href='update&delete-recode.php?name=$row[0]?visitor=$row[2]?date=$row[3]'"></td></tr>";
					}
				pg_close($db);
			}
		?>
	</table>
</div><!--/ .content-wrapper-->
</center>
</body>
</html>