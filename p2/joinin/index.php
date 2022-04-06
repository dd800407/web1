<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">		
		<link rel="stylesheet" href="../../css/fishstyle.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <title>活動</title>
        
        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="pricing.css" rel="stylesheet">
        <link rel="stylesheet" href="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.css" />
        <script src="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js"></script>
	</head>
<body>
		<header>
			<div class='container'>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="#">
						<img src="../pictures/tree.png" style="width:50px">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
				  
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    
                        <ul class="navbar-nav mr-auto">
						    <li class="nav-item">
						        <a class="nav-link" href='../index.php'style='font-size:20px'>主頁</a>
						    </li>
                            <li class="nav-item">
						        <a class="nav-link" href='../front/modify/membercenter.php'style='font-size:20px'>會員中心</a>
							</li>
							<li class="nav-item">
						        <a class="nav-link" href='../front/item/index.php'style='font-size:20px'>新增書籍</a>
                            </li>
                            <li>
							<a class="nav-link" href="index.php"style='font-size:20px'>閱覽書籍</a>
                                
                            </li>
                            <li>
						        <a class="nav-link" href="../message2/index.php"style='font-size:20px'>留言板</a>
                            </li>					
					    </ul>				  
					  
					</div>
				  </nav>				 
			</div>
        </header>

    	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<img src="../pictures/cat1.png" style="width: 100px">
			<h1 class="display-3" style="font-size: 40px; color: #613030">書籍</h1>
		</div>
		
		<section id="search">
			<div class='container'>
				<?php

					$member_username  = @$_COOKIE["member_username"];
					$member_password = @$_COOKIE["member_password"];

					if(!$member_username){
						die("<a href='../check.php'>請先登入</a>");
					}
					else{
						
					}

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

					$sql = "Select * From active";
					$result = mysqli_query($conn,$sql);





date_default_timezone_set("Asia/Shanghai");  
$n = date("Y-m-d ").date("H:i:s") ;
				   
echo "<center>";
					echo "<table class='table'>";
					echo "<thead><tr>";
					echo "<th>序號</th>";
					echo "<th>建立者</th>";
					echo "<th>書名</th>";
					echo "<th>作者</th>";
					echo "<th>內容</th>";
					echo "<th>建立時間</th>";
					echo "<th>完成閱覽</th>";
					echo "</tr></thead>";
					$AA = 0;
					$temp = 0;
					$i=0 ;
					$j=0;
					$sql = "SELECT * FROM active";			
						if($stmt = $conn->query($sql))
							{	 
							while($result = mysqli_fetch_object($stmt))
								{ 
									//資料格名字 
									if ( ($result->member_id) > 0)   
									{ 	
										$j=$j+1;
										echo "<tbody><tr>";
										echo "<td>$j</td>"; //序號
										echo "<td>$result->member_account</td>"; //建立者
										echo "<td>$result->member_text</td>"; //書名
										echo "<td>$result->member_text1</td>"; //作者
										echo "<td>$result->member_text2</td>"; //內容
										echo "<td>$result->member_time</td>";
										echo "<td>$result->member_up</td>"; //閱讀人數
										
										$go_account = ($result->member_account) ;
										$go_text = ($result->member_text) ;
										$go_text1 = ($result->member_text1) ;
										$go_text2 = ($result->member_text2) ;
										$go_time = ($result->member_time) ;
										echo "<td>
										     <form name=form method=post action=checkjoin.php>
											 <input type=hidden name=member_account value=$go_account>
											 <input type=hidden name=member_text value=$go_text>
											 <input type=hidden name=member_text1 value=$go_text1>
											 <input type=hidden name=member_text2 value=$go_text2>
											 <input type=hidden name=member_time value=$go_time>
							                 <button class='btn btn-outline-success' type=submit onclick=Check(event)>完成閱覽</button>
							                  </form>
										      </td>";
										echo "</tr></thbody>";
								
										$AA=$AA+1 ;
										
									}
									}
									$AA=0;					
							}	
					
					echo "</table>";
					echo "</center>";
?>


			</div>
		
		</section>

    <div class="container" >

      <br><br>
		<section class="line">
			<div class='row'>
				<div class='col-md-12 text-center'>
					<img src="../pictures/line1.png">
					<img src="../pictures/line1.png">
				</div>
			</div>			
		</section>
        <br><br>  
        <center>
			<!--最下排內容未寫-->
		<section class='third'>
			<div class='row'>				
				<div class='col-md-4'>
				<p>指導老師</p><br>
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
				<img src="	M.png">
				</div>
				
			</div>
		</section>
		</center>  
    </div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/vendor/holder.min.js"></script>

  </body>
</html>