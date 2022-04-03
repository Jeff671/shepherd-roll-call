<?php
	include ("connect.php");
	$n = $_GET["name"];
	$v=$_GET["visitor"];
	$d = $_GET["date"];
	setcookie('visitor',$v);setcookie('date',$d);
	$visitor="0";$date="0"; $nameid="0";$situation="0";$remark="0";
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="style.css" media="screen"/>
<title>探望名單線上記錄系統</title>
<script type="text/javascript">
function alertscreen()
  {
	if(confirm( '確定刪除該筆資料？ '))  location.href='delete-record.php';else return false;
  }
</script>
</head>
<body style="background-color: #ebeeeb;">
<center><h1 style="font-size:40px;">探望名單線上記錄系統</h1>
<div class="content-wrapper clearfix">
<!-- 搜尋欲修改的資料內容 並顯示在各元件內-->
<?php
		$sql =<<<EOF 
		SELECT nameid,visitor,date,situation,remark from visitinfo where name='$n',date='$d',visitor='$v';
EOF;
				$ret = pg_query($db, $sql);
				if(!$ret){
				echo pg_last_error($db);
				echo "查無結果";
				exit;
				} 
				while($row = pg_fetch_row($ret)){
					$nameid="$row[0]";$visitor="$row[1]";$date="$row[2]";$situation="$row[3]";$remark="$row[4]";
					setcookie('nameid',$nameid);
					}
				pg_close($db);
			?> 
	<h1 class="content-title"  style="font-size:30px;">
		<select style="font-size:30px;" onChange="location = this.options[this.selectedIndex].value;">
			<option value="index.html" >出訪紀錄查詢 </option>
			<option value="create-visit-record.php" >出訪紀錄填寫 </option>
			<option value="U&D-visit-record.html" SELECTED>修改&刪除出訪紀錄 </option>
			<option value="CUD-namelist-show.php" >對象資訊編輯 </option>
		</select>
	</h1>
	
	<form action="update-record.php" method="post">
			<h3 style="font-size:22px;">填表者姓名:<input type ="text" value="<?php echo $visitor; ?>" name="visitor" style="margin:0px 0px 0px 30px; height:30px; width:120px;"></h3>
			
			<h3 style="font-size:22px;"><label for="bookdate">填表日期：</label>
			<input type="date" value="<?php echo $date;?>" name="date" style="margin:0px 0px 0px 30px;"></h3>
			
			<h3 style="font-size:22px;">回訪對象姓名:
			<select name="name" style=" margin:0px 0px 0px 25px; height:30px; width:120px;">
			<option style="font-size:22px;" value="0" >請選擇姓名 </option>
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
					if($a==$nameid)
					{
						echo "<option value='$row[0]' SELECTED>$row[1]</option>";
					}
					else echo "<option value='$row[0]'>$row[1]</option>";
					}
				pg_close($db);
			?> 
			</select></h3>
			
			<h3 style="font-size:22px;">回訪情形:
			<textarea value="<?php echo $situation; ?>" name="situation" style="height:80px;width:400px; margin:0px 0px 0px 30px;"></textarea></h3>
			
			<h3 style="font-size:22px;">備註:
			<textarea name="remark" value="<?php echo $remark; ?>" style="height:80px; width:300px; margin:0px 0px 0px 30px;"></textarea></h3>
			<input type ="submit" value="送出">&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" onclick="location.href='U&D-visit-show.php'">&nbsp;&nbsp;&nbsp;
			<input type="button" value="刪除" onclick="alertscreen()">
			</form>
</div><!-- -->
</center>
</body>
</html>