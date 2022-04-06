<div align="center"><font size="5" face="DFKai-sb:" color="brown" >
<?php
$db_server = "localhost";
$db_name = "project";
$db_user = "root";
$db_passwd = "";
$db = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if(mysqli_connect_errno($db))
	echo "無法對資料庫連線！" . mysqli_connect_error();
mysqli_set_charset($db,'utf8');
if(!@mysqli_select_db($db,'project'))
        die("無法使用資料庫");

$member_username  = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];	
$account=$_POST['account'] ;	



if(isset($_POST['go'])) 
{
 $sql = "SELECT * FROM message2  ";
 $result=mysqli_query($db,$sql);
 $sql = "INSERT INTO `message2` (`ID`,`username`,`time`,`context`) 
 				 VALUES (NULL,'$member_username','0','$account')";
				 
		if   (mysqli_query($db,$sql) === TRUE)
		     {
		       echo "成功留言!";
			   echo "三秒後自動切換畫面,請等待.............";
			   header("Refresh:3;url=http://120.105.129.17/project/message2/index3.php") ;
		     }
		  	   
}





















