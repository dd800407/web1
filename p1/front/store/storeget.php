<html>
    <head>
    <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">		
		<link rel="stylesheet" href="../../css/fishstyle.css">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="//cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<title>商家合作</title>

		<!-- Bootstrap core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="pricing.css" rel="stylesheet">


    </head>

    <body >

    <?php 

if(@$_POST['member_username']){//防止重複
$member_username  = @$_POST['member_username'];
$member_password = @$_POST['member_password'];
setcookie("member_username",$member_username,time()+3600);
setcookie("member_password",$member_password,time()+3600);
header('Location: index.php');
}
else{
$member_username = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];
}


$member_username = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];

$db_server = "localhost";
$db_name   = "project";
$db_user   = "root";
$db_passwd = "";

if(@$conn=mysqli_connect($db_server,$db_user,$db_passwd)){
#echo "資料庫連線成功<br>";
}
else{
die("資料庫連線失敗<br>");
}

if(@mysqli_select_db($conn,$db_name)){
#echo "資料庫使用成功<br>";
}
else{
die("無法使用資料庫<br>");
}

mysqli_query($conn,"SET NAMES UTF8");

$sql  = "Select * From member";
$result = mysqli_query($conn,$sql);
$id   = NULL;
$name = NULL;

while($row = mysqli_fetch_row($result)){

if($member_username==$row[1] && $member_password==$row[2]){
    $id   = $row[0];
    $name = $row[1];
    break;
}
}
?>
            
            <header>
                <div class='container'>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">
                            <img src="../../pictures/tree.png">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            
                          <li class="nav-item">
                                <a class="nav-link" href='../../index.php' style='font-size:20px'>主頁</a>
                            </li>
                            <li class="nav-item">
                                
                            
                              <a class="nav-link" style='font-size:20px' href='<?php
                              if($id)
                                echo "../modify/membercenter.php?id=".$id;
                              else
                                echo "../../check.php";
                              ?>'>會員中心</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='front/item/index.php' style='font-size:20px'>新增書籍</a>
                            </li>
                            <li>
                                <a class="nav-link" href="joinin/index.php" style='font-size:20px'>閱覽書籍</a>
                            </li>
                            <li>
						        <a class="nav-link" href="message2/index.php" style='font-size:20px'>留言板</a>
                            </li>						
                          </ul>
                          <!--
                          <form class="form-inline">
                            <button class="btn btn-outline-success" type="button" onclick="self.location.href='check.php'" style="text-align:right">登錄</button>					  
                          </form> -->
    
                          <?php 
                            if($id){
                                
                                echo "<font size=5 color=#00A600 style='text-align:right'>歡迎! </font>&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo "<font size=5>$name</font>";
                                echo "<form name=MyForm5 method=post action=../../logout.php>";
                                echo "<input type=hidden name=id value=$id>";
                                echo "<button class='btn btn-outline-success' type=submit href='../logout.php' style='font-size:20px'>登出</button>";
                                echo "</form>";
                            }
                            else{
                                echo "<form name=form method=post action=../../check.php>";
                                echo "<input type=hidden name=id value=$id>";
                                echo "<button class='btn btn-outline-success' type=submit onclick=Check(event) style='float:right' style='font-size:20px'>登錄</button>";
                                echo "</form>";
                            }
                        ?>	
                          
    
                        </div>
                        
                    </nav>				 
                </div>

            </header>
<script>
						function F()
						{
						 alert('點數不足!!!')	
						}
						</script>
            <div id="myCarousel" class="carousel slide">
                <!-- 輪播指示 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                <!-- 輪播內容 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="d-block w-100" src="../../pictures/p1.jpg" alt="First slide">
                    </div>
                    <div class="item">
                        <img class="d-block w-100" src="../../pictures/p2.jpg" alt="Second slide">
                    </div>
                    <div class="item">
                        <img class="d-block w-100" src="../../pictures/p3.jpg" alt="Third slide">
                    </div>
                </div>
                <!-- 輪播控制 -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> 

            <!-- 警報效果 -->
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <a href="#" class="alert-link" style='font-size:20px'>
                    <strong style='font-size:25px'>連假優惠！</strong>快來苗栗遊玩喔！
                </a>
            </div>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <a href="#" class="alert-link" style='font-size:20px'>
                    <strong style='font-size:25px'>下午茶好康！</strong>甜點斯康，買四送一！
                </a>
				
            </div>

			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<strong style='font-size:25px'>
							您目前擁有的點數：
							<?php
							$point = 0 ;
							$sql = "SELECT * FROM member where member_username = '$member_username' ";	
							if($stmt = $conn->query($sql))
							{	 
							while($result = mysqli_fetch_object($stmt))
									{
									if ( ($result->member_username) == $member_username)   
										{ 
										$point = $result-> member_join ;	
										}
									}
								echo $point ;	
							}								
							?>
						</strong>
					</div>
				</div>
			</div>
			<br><br>
            
            <section>
                <!-- 第一列 -->
                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f1.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>日日花花</h3>
                        <p style='font-size:20px'>品花香、看花，5點兌換入場卷折扣10元</p>
                        <p>
						<?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
						}
	
						
						?>
				        <script type="text/javascript" >

						function a()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=日日花花&randoma="+randoma  ;
						}
						</script>

						<input type="button" value="領取兌換券" onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> a(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
                        </p>
						</div>
						<div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f2.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>健康午日</h3>
                        <p style='font-size:20px'>健康的午餐如如何自己動手做呢，5點兌換DIY折扣10元</p>
                        <p>
						
						<?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
							
						}
						?>
						<script>
						function b()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=健康午日&randoma="+randoma  ;
						}
						</script>
                         <form>
						<input type="button" value="領取兌換券" 
　　						onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> b(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
						</form>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f3.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>花園景</h3>
                        <p style='font-size:20px'>自己的花園，5點兌換入場卷折扣10元</p>
                        <p>
						<?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
						
						}
						?>
						<script>
						function c()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=花園景&randoma="+randoma  ;
						}
						</script>
                        <form>
						<input type="button" value="領取兌換券" 
　　						onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> c(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
						</form>
                        </p>
                    </div>
                </div>

                <!-- 第二列 -->
                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f4.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>瑜珈</h3>
                        <p style='font-size:20px'>每天不能少了運動，怎麼雕塑身材，5點兌換5堂課優惠100元</p>
                        <p>
                           
						<?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
	
						}
						?>
						<script>
						function d()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=瑜珈&randoma="+randoma  ;
						}
						</script>
                        <form>
						<input type="button" value="領取兌換券" 
　　						onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> d(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
						</form>  
						   
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f5.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>廚藝DIY</h3>
                        <p style='font-size:20px'>最美的擺盤，5點兌換DIY活動折扣10元</p>
                        <p>
                         
						 <?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
							
						}
						?>
						<script>
						function e()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=廚藝DIY&qqq=123&randoma="+randoma  ;
						}
						</script>
                        <form>
						<input type="button" value="領取兌換券" 
　　						onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> e(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
						</form>
						 
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img class="img-circle" src="../../pictures/f6.jpg" width="160" height="160">
                        <h3 style='font-size:25px'>小小廚</h3>
                        <p style='font-size:20px'>給小孩最好的營養知識，5點兌換5堂課折扣100元</p>
                        <p>
                        
						<?php
						$random=10;
						$randoma = NULL;
						//FOR回圈以$random為判斷執行次數
						for ($i=1;$i<=$random;$i=$i+1){
						$b = 0;
						//亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
						$c=rand(1,3);
						//在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==1){$a=rand(97,122);$b=chr($a);}
						//在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
						if($c==2){$a=rand(65,90);$b=chr($a);}
						//在$c==3的情況下，設定$b亂數取值為0-9之間的數字
						if($c==3){$b=rand(0,9);}
						//使用$randoma連接$b
						$randoma=$randoma.$b;
						
						}
						?>
						<script>
						function f()
						{
						 var randoma = " <?php echo $randoma ; ?> "	;
						 alert('<?php echo "您的兌換碼是：".$randoma  ?>')	
						 window.location.href = "http://120.105.129.17/project/front/store/123.php?action=小小廚&randoma="+randoma  ;
						}
						</script>
                        <form>
						<input type="button" value="領取兌換券" 
　　						onClick="<?php
                                     $sql = "SELECT * FROM member where member_username='$member_username' ";			
					                 if($stmt = $conn->query($sql))
									   {	 
										while($result = mysqli_fetch_object($stmt))
										     {
					                         if ( ($result->member_username) == $member_username)   
								                { 
					  		                     $point = $result-> member_join ;
							                    }
						                     }				   
						               }  
									   if ( $point > 5)
									      {
										   ?> f(); <?php 
									      }
									   else{
										   ?> F() ;<?php
									   }	  
									   ?> " >
						</form>
						
                        </p>
                    </div>
                </div>
                
                
            </section>

            <section class="line">
			<div class='row'>
				<div class='col-md-12 text-center'>
					<img src="../../pictures/line1.png">
					<img src="../../pictures/line1.png">
				</div>
			</div>			
		</section>
		<br><br>

		<center>
			<!--最下排內容未寫-->
		<section class='third'>
			<div class='row'>				
				<div class='col-md-4'>
				<p>指導教授</p><br>
				</div>
				<div class='col-md-4'>
				<p>專題成員</p>
				<p>蔡君亮</p>
				<p>林庭妘</p>
				<p>李沛嫻</p>
				<p>劉哲綸</p>
				<p>鄧偉志</p>
				<p>蕭作青</p>
				
				</div>
				<div class='col-md-4'>
				<p>LINE官方帳號:@888phkrr</p>
				<img src="../../M.png">
				</div>
				
			</div>
		</section>	
		</center>
    
    </body>

</html>