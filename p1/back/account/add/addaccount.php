<html>
<head>
	<title>新增會員</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>新增會員</center></font>
<hr>
<?php

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}
	
	$db_server	=	"localhost";
	$db_name	=	"project";
	$db_user	=	"Ben";
	$db_passwd	=	"99859985";


	if(@$conn=mysqli_connect($db_server,$db_user,$db_passwd)){
		#echo "連接成功<br>";
	}
	else{
		die("連接失敗<br>");
	}
	
	if(@mysqli_select_db($conn,$db_name)){
		#echo "資料庫使用成功<br>";
	}
	else{
		die("無法使用資料庫<br>");
	}

	$member_username	=	$_POST['account'];
	$member_password	=	$_POST['password'];
	

	$sql = "Select * From member";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_row($result)){
		if($row[1] == $member_username){
			echo "帳號已使用<br>";
			echo "<button onclick=history.go(-1);>回上一頁</button>";
			die();
		}
	}

	mysqli_query($conn,"SET NAMES UTF8");

	$adduser = "INSERT INTO `member` (`member_id`, `member_username`, `member_password`,`member_point`,`member_money`, `member_disable`)
				VALUES (NULL,'$member_username','$member_password',0,0,0)";

	if(mysqli_query($conn,$adduser)){
		echo "新增會員成功<br>";
		echo "<button onclick=history.go(-1);>回上一頁</button>";
	}
	else{
		echo "新增會員失敗<br>";
		echo "<button onclick=history.go(-1);>回上一頁</button>";
		die();
	}

	mysqli_close($conn);

?>
</body>
</html>