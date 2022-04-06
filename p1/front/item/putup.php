<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div align="center"><font size="5" face="DFKai-sb:" color="brown" >

<?php

$member_account  = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];

$db_server = "localhost";
$db_name = "project";
$db_user = "root";
$db_passwd = "";
$db = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if(mysqli_connect_errno())
	echo "無法對資料庫連線！" . mysqli_connect_error();
mysqli_set_charset($db,'utf8');
if(!@mysqli_select_db($db,'project'))
        die("無法使用資料庫");
	
$member_text=$_POST['member_text'] ;
$member_text1=$_POST['member_text1'] ;
$member_text2=$_POST['member_text2'] ;
$member_time=$_POST['member_time'] ;

date_default_timezone_set("Asia/Shanghai");  
$n = date("Y-m-d ").date("H:i:s") ;
	
$time = floor((strtotime($member_time) - strtotime($n))) ;
$overtime = " " ;
if(isset($_POST['go']))//開始
{
 if ( $time > 0)//建立時間已經過了
 {
    $sql = "SELECT * FROM active";			
		   if($stmt = $db->query($sql))
			 {	 
			  while($result = mysqli_fetch_object($stmt))
				   { 
					if ( ($result->member_account) == $member_account)   
					   { 
						$overtime = $result-> member_time ;
					   }
				   }				   
	         }	 
	$S = date("Y-m-d ").date("23:59:59") ; 
	$ttime = floor((strtotime($S) - strtotime($overtime))) ; 
	if  ($ttime > 0)//判斷今天有沒有建立過
	    {
		 $tttime = floor((strtotime($member_time) - strtotime($overtime))) ; 
         if ($tttime > 86400 || $tttime < 86400)//建立不可少於一天	
		    {
             $sql = "INSERT INTO `active` (`member_id`,`member_account`,`member_text`,`member_text1`,`member_text2`,`member_time`,`member_up`) 
 		    		 VALUES (NULL,'$member_account','$member_text','$member_text1','$member_text2','$member_time',0)";				 
			if   (mysqli_query($db,$sql) == TRUE)
			     {
				   $sql = "SELECT * FROM member where member_username='$member_account' ";			
					   if($stmt = $db->query($sql))
					   	 {	 
						  while($result = mysqli_fetch_object($stmt))
						       { 
								if ( ($result->member_username) == $member_account)   
								   { 
					  		        $point = $result-> member_join ;
							       }
						       }				   
						 } 
					   $point = ($point+10) ;	
                       $sql = "UPDATE member
							SET member_join = '$point'
							WHERE member_username='$member_account'  " ;	
                       if (mysqli_query($db,$sql) == TRUE)
					  {
					  }	 
				  echo "新增成功".'<br>';
				  echo "三秒後自動切換畫面,請等待.............";
				  header("Refresh:3;url=http://10.1.12.240/project/front/item/index.php") ;
		         }
		    else {
			      echo "新增失敗";
		         }				
		    }		 
		else{
			 echo "新增時間請多餘24HR，沒人想一直看到你。".'<br>';
		     echo "三秒後自動切換畫面,請等待.............";
		     header("Refresh:3;url=http://10.1.12.240/project/front/item/index.php") ;
	     	}			
	    }		
  	else{
		 echo "今日已新增過,明日請早。".'<br>';
		 echo "三秒後自動切換畫面,請等待.............";
		 header("Refresh:3;url=http://10.1.12.240/project/front/item/index.php") ;
	    }		
 }
 else
 {
  echo '盛年不重來，一日難再晨。'.'<br>' ;
  echo "三秒後自動切換畫面,請等待.............";
  header("Refresh:3;url=http://10.1.12.240/project/front/item/index.php") ;  
 }
}
?>






