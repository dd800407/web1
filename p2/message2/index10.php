<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">		
		<link rel="stylesheet" href="../css/fishstyle.css">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="//cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<title>老人系統 專題</title>

		<!-- Bootstrap core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="pricing.css" rel="stylesheet">
		
	
	</head>
	
	<body>
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
                            <img src="../pictures/tree.png">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            
                          <li class="nav-item">
                                <a class="nav-link" href='../index.php'>主頁</a>
                            </li>
                            <li class="nav-item">
                                
                            
                              <a class="nav-link" href='<?php
                              if($id)
                                echo "../front/modify/membercenter.php?id=".$id;
                              else
                                echo "../check.php";
                              ?>'>會員中心</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='../front/item/index.php'>建立活動</a>
                            </li>
                            <li>
                                <a class="nav-link" href="index.php">留言板</a>
                            </li>
                            <li>
						        <a class="nav-link" href="../joinin/index.php">參加活動</a>
                            </li>						
                          </ul>
                          <!--
                          <form class="form-inline">
                            <button class="btn btn-outline-success" type="button" onclick="self.location.href='check.php'" style="text-align:right">登錄</button>					  
                          </form> -->
    
                          <?php 
                            if($id){
                                
                                echo "<font size=3 color=#00A600 style='text-align:right'>歡迎! </font>&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo "<font size=3>$name</font>";
                                echo "<form name=MyForm5 method=post action=../logout.php>";
                                echo "<input type=hidden name=id value=$id>";
                                echo "<button class='btn btn-outline-success' type=submit href='../logout.php'>登出</button>";
                                echo "</form>";
                            }
                            else{
                                echo "<form name=form method=post action=../check.php>";
                                echo "<input type=hidden name=id value=$id>";
                                echo "<button class='btn btn-outline-success' type=submit onclick=Check(event) style='float:right'>登錄</button>";
                                echo "</form>";
                            }
                        ?>	
                          
    
                        </div>
                        
                    </nav>				 
                </div>
		</header>
		
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
		?>

		<section id="top">
			<div class='container'>
				<div class='row'>
					<div class='col-md-12 text-center'>
						<h1 style="font-size: 40px; color: #613030">巨蛋留言板</h1>					
				</div>
			</div>
    	</section>
		
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
					<img class="d-block w-100" src="../pictures/p2.jpg" alt="First slide">
					<div class="carousel-caption">
						<h1>來來來</h1>
					</div>
					
				</div>
				<div class="item">
					<img class="d-block w-100" src="../pictures/p1.jpg" alt="Second slide">
				</div>
				<div class="item">
					<img class="d-block w-100" src="../pictures/p3.jpg" alt="Third slide">
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

		<section id="write">
		<div class='container'>
			<div class="row">
				<div class='col-md-12 text-center'>
					<h3 style="font-size: 35px; color: #750000">我要留言</h3>
					<form action ="run10.php" method ="post" name="log"> 
						<input type="text" name="account" style="width: 400px; height: 100px;">
						<br>
						<input class="btn" type="submit" name="go" value="送出">
					</form> 
				</div>
			</div>
		</div>
		</section>

		<section id="seetalk">
			<div class='container'>
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
				echo "<center>";
				echo "<table class='table'>";
				
				echo "<thead><tr>";

				echo "<th>序號</th>";
				echo "<th>名字</th>";
				echo "<th>內容</th>";
				echo "</tr></thead>";

				$AA = 0;
				$temp = 0;
				$i=0 ;
				$j=0;
				$sql = "SELECT * FROM message9 ";
			
				if($stmt = $db->query($sql))
				  {	 
				   while($result = mysqli_fetch_object($stmt))
						{ 
						 if ( ($result->username) != NULL)   
							{ 
							 $j=$j+1;
							 echo "<tbody><tr>";
							 echo "<td>$j</td>";
							 echo "<td>$result->username</td>";
							 echo "<td>$result->context</td>";
							 echo "</tr></thbody>";
							 
							}
						 }				
				  }
				echo "</table>";
				echo "</center>";
				
				mysqli_close($conn);	
			?>
			</div>
		</section> 

		<section class="line">
			<div class='row'>
				<div class='col-md-12 text-center'>
					<img src="../pictures/line1.png">
					<img src="../pictures/line1.png">
				</div>
			</div>			
		</section>

        <center>
			<!--最下排內容未寫-->
		<section class='third'>
			<div class='row'>				
				<div class='col-md-4'>
				<br>
				<p>指導教授</p><br>
				<p>蔡丕裕 教授</p><br>
				</div>
				<div class='col-md-4'>
				<br>
				<p>專題成員</p>
				<p>U0524002 許立泓</p>
				<p>U0524005 孫  瑜</p>
				<p>U0524011 王大維</p>
				<p>U0524032 劉哲綸</p>
				
				</div>
				<div class='col-md-4'>
				<br>
				<p>國立聯合大學</p>
				<p>資訊工程學系CSIE</p>
				<p>LINE官方帳號:@888phkrr</p>
				</div>
				
			</div>
		</section>
		</center>  
	</body>
</html>

