<?php
	include ("connect.php");
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
	<h1 class="content-title"  style="font-size:30px;">
		<select style="font-size:30px;" onChange="location = this.options[this.selectedIndex].value;">
			<option value="index.html" >出訪紀錄查詢 </option>
			<option value="create-visit-record.php" SELECTED>出訪紀錄填寫 </option>
			<option value="U&D-visit-record.html" >修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" >被看望者資訊編輯 </option>
		</select>
	</h1>
	<form action="create-record.php" method="post">
			<h3 style="font-size:22px;">看望者姓名:<input type ="text" name="visitor" style="margin:0px 0px 0px 30px; height:30px; width:120px;"></h3>
			
			<h3 style="font-size:22px;"><label for="bookdate">填表日期：</label>
			<input type="date" name="date" style="margin:0px 0px 0px 30px;"></h3>
			
			<h3 style="font-size:22px;">被看望者姓名:
			<select name="name" style=" margin:0px 0px 0px 25px; height:30px; width:120px;">
			<option style="font-size:22px;" value="0" SELECTED>請選擇姓名 </option>
			<?php	
			$sql =<<<EOF
				SELECT id,name from namelist;
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					echo "<option value='$row[0]'>$row[1]</option>";
					}
				pg_close($db);
			?> 
			</select></h3>
			
			<h3 style="font-size:22px;">回訪情形:
			<textarea name="situation" style="height:80px;width:400px; margin:0px 0px 0px 30px;"></textarea></h3>
			<input type ="submit" value="送出">
			</form>
</div><!--/ .content-wrapper-->
</center>
</body>
</html>