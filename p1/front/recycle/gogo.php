<?php

$member_account  = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];

$go_account = @$_POST['member_account'];
$go_time = @$_POST['member_time'];


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


$sql = "SELECT * FROM active where member_account='$go_account' AND member_time='$go_time'";			
if($stmt = $db->query($sql))
  {	 
   while($result = mysqli_fetch_object($stmt))
		{ 
		 if ( ($result->member_account) == $go_account)   
			{ 
		     $go_text = $result-> member_text ;
			 $go_number = $result-> member_number ;
			 $place = $result-> member_place ;
			}
		}				   
  }

  
$overpeople = "" ;
$people = "" ;	
$thetime = "" ;
//人數滿了沒

$sql = "SELECT * FROM active where member_account='$go_account' AND member_time='$go_time'";			
if($stmt = $db->query($sql))
  {	 
   while($result = mysqli_fetch_object($stmt))
		{ 
		 if ( ($result->member_account) == $go_account)   
			{ 
		     $people = $result-> member_number ;
			 $overpeople = $result-> member_up ;
			}
		}				   
  }
$TT = 0 ;
if   ( (int)$people-((int)$overpeople+1) >=0 )
     {
      //當天是否有活動		 
	  $sql = "SELECT * FROM joinin ";		 
	  if($stmt = $db->query($sql))
        {	 
         while($result = mysqli_fetch_object($stmt))
		      { 
		       if ( ($result->member_account) == $member_account)   
			      { 
		           $thetime = $result-> member_time ;
                   $today1 = strtotime($thetime ); 
                   $a_date = date('Y-m-d',$today1); 
				   
				   $today2 = strtotime($go_time ); 
                   $b_date = date('Y-m-d',$today2); 
				   if ( $a_date == $b_date)
				      {
					   $TT = 1 ;		   
				      }
				   
			      }
		      }	      			   
      
		
		if  ( $TT == 0)
			{
		     if    ( $place == 'one')	
			       {
				    $place = "苗栗縣政府" ; 
				   }
			else if( $place == 'two')
				   {
					$place = "南苗三角公園" ;	
				   }
			else if( $place == 'three')
				   {
					$place = "聯合八甲校區" ;	
				   }
			else if( $place == 'four')
				   {
					$place = "聯合二坪校區" ;	
				   }
			else if( $place == 'five')
				   {
					$place = "河濱公園" ;	
				   }
			else if( $place == 'six')
				   {
					$place = "貓貍山公園" ;	
				   }
			else if( $place == 'seven')
				   {
					$place = "苗栗地方法院" ;	
				   }
			else if( $place == 'eight')
				   {
					$place = "苗栗火車站" ;	
				   }
			else if( $place == 'nine')
				   {
					$place = "巨蛋體育館" ;	
				   }
			else if( $place == 'ten')
				   {
					$place = "苗栗家樂福" ;	
				   }		
				   
             $sql = "INSERT INTO `joinin` (`member_id`,`member_account`,`member_who`,`member_text`,`member_time`,`member_place`) 
 		    		 VALUES (NULL,'$member_account','$go_account','$go_text','$go_time','$place')";	
			 if   (mysqli_query($db,$sql) === TRUE)
				  {
				   $overpeople = $overpeople+1 ;
                   
		           $sql = "UPDATE active
							SET member_up = '$overpeople'
							WHERE member_account='$go_account' AND member_time='$go_time' " ;
				   if (mysqli_query($db,$sql) === TRUE)
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
					   $point = ($point+5) ;	
                       $sql = "UPDATE member
							SET member_join = '$point'
							WHERE member_username='$member_account'  " ;	
                       if (mysqli_query($db,$sql) === TRUE)
					  {
					  }
					   echo "參加成功，請準時出席".'<br>' ;  
		               echo "三秒後自動切換畫面,請等待.............";
		               header("Refresh:3;url=http://120.105.129.17/project/front/modify/membercenter.php") ; 
		              }
				  }
			}		   
		else{
			 echo "今日已經有活動，注意參加!!" ;
			 echo "三秒後自動切換畫面,請等待.............";
		     header("Refresh:3;url=http://120.105.129.17/project/joinin/index.php") ; 
			}
	    }   
     }
	 
else {
	  echo "人數已滿，下次請早" ;
	  echo "三秒後自動切換畫面,請等待.............";
	  header("Refresh:3;url=http://120.105.129.17/project/joinin/index.php") ; 
     }    
?>	