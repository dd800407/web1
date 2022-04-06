<!DOCTYPE html>
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

        <title>CFC104-team03專題</title>
        
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
					<img src="../../pictures/tree.png">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				</button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    
                    <ul class="navbar-nav mr-auto">

                        <?php        
                            $member_username  = @$_COOKIE["member_username"];
                            $member_password = @$_COOKIE["member_password"];

                            $db_server = "localhost";
                            $db_name   = "project";
                            $db_user   = "root";
                            $db_passwd = "";
                            
                            echo "<li class='nav-item'><a class='nav-link' href='../../index.php'style='font-size:20px'>主頁</a></li>";
                            
                            if($member_username){
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='../modify/membercenter.php'style='font-size:20px'>會員中心</a></li>";
                            }
                            else{
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='../../check.php'style='font-size:20px'>會員中心</a></li>";
                            }
                        ?>

                        <li class='nav-item'>
                        <a class="nav-link" href='index.php' style='font-size:20px'>新增書籍</a>
                        </li>
                        <li>
						<a class="nav-link" href="../../joinin/index.php" style='font-size:20px'>閱覽書籍</a>
                        </li> 
				        <li>
						<a class="nav-link" href="../../message2/index.php" style='font-size:20px'>留言板</a>
						</li>	         

                    </ul>						 
					  
				</div>
			</nav>				 
		</div>
    </header>       

    
    <div class='col-md-12 text-center'>
        <img src="../../pictures/cat1.png" style="width: 90px">
        <h3 class="display-3" style="font-size: 50px; color: #613030">新增書籍</h3>
    </div>
    
    <section id="first">
        <div class='row'>
            <div class='col-md-12 text-center'>
                <?php

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
                    $name	= @$_POST['name'];
                    /*$price1	= @$_POST['price1'];
                    $price2	= @$_POST['price2'];
                    $info	= @$_POST['info'];*/

                    $sql  = "Select * From member";
                    $result = mysqli_query($conn,$sql);
                    $id = NULL;	
                    $name = NULL;

                    if($member_username){}
                    else{
                    echo"<form name=form method=post action=../../check.php>";
                    echo "<br><font size=4 color='#FF7575' style='letter-spacing: 2px;'>登入後才可建立活動 </font>";
                    echo "<button class='btn' <li class='nav-item'><a class='nav-link' href='../../check.php'</a></li>登入去 &raquo</a></li></button><br><br>";
                    echo "</from><br>";
                    }



                    mysqli_close($conn);
                ?>                     
            </div>
        </div>                
        
    </section>

    
    <br><br>
		<form action ="putup.php" method ="post" name="log">
		</font>
        <div align="center">
        <font size="3" face="DFKai-sb:" color="#3C3C3C" >新增書名：<input type="text" name="member_text" style="padding:3px;" required ></font><br><br>
		<font size="3" face="DFKai-sb:" color="#3C3C3C" >書籍作者：<input type="text" name="member_text1" style="padding:3px;" required ></font><br><br>
		<font size="3" face="DFKai-sb:" color="#3C3C3C" >書籍內容：<input type="text" name="member_text2" style="padding:3px;" required ></font><br><br>
        <font size="3" face="DFKai-sb:" color="#3C3C3C" >新增書籍時間：<input type="datetime-local" name="member_time" required ></font><br><br>
        <input type="submit" name="go" value="新增" style="
        background: #f05f5c;
        color:white;
		padding:7px 18px;
        border-radius:20px;
        width:120px;height:40px;">
    </form> 

    <br><br>
    <section class="line">
		<div class='row'>
			<div class='col-md-12 text-center'>
				<img src="../../pictures/line1.png">
				<img src="../../pictures/line1.png">
			</div>
		</div>			
	</section>

    <center>
			<!--最下排內容未寫-->
		<section class='third'>
			<div class='row'>				
				<div class='col-md-4'>
				<br>
				<p>指導老師</p><br>
				</div>
				<div class='col-md-4'>
				<br>
				<p>專題成員</p>
				<p>蔡君亮</p>
				<p>林庭妘</p>
				<p>李沛嫻</p>
				<p>劉哲綸</p>
				<p>鄧偉志</p>
				<p>蕭作青</p>
				
				</div>
				<div class='col-md-4'>
				<br>
				<p>LINE官方帳號:@888phkrr</p>
				<img src="	M.png">
				</div>
				
			</div>
		</section>
		</center>
 

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

    
    
    </script>
  </body>
</html>