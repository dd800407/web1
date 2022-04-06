<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">		
        <link rel="stylesheet" href="../../css/fishstyle.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


        <title>會員中心</title>

        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="blog.css" rel="stylesheet">
    </head>

    <body>
    <?php
        $member_username  = @$_COOKIE["member_username"];
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
         $id = NULL;
         $name = NULL;
            while($row = mysqli_fetch_row($result)){
            
            if($member_username==$row[1] && $member_password==$row[2]  ){
            $id   = $row[0];
            $name = $row[1];
            break;
            }
        }
		
	$sql  = "Select * From member WHERE member_username";
                        $result = mysqli_query($conn,$sql);
                        
                        if($stmt = $conn->query($sql))
                            {	 
						
                            while($result = mysqli_fetch_object($stmt))
                                { 
                                    if ( ($result->member_username) == "root2")   
                                    { 
                                       echo "156123185121854561"; 
                                    }
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
						        <a class="nav-link" href='#' style='font-size:20px'>會員中心</a>
                            </li>
                            <li class="nav-item">
						        <a class="nav-link" href='../item/index.php' style='font-size:20px'>新增書籍</a>
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
    
    <section id="top">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <h1 style="font-size: 40px; color: #613030">會員中心</h1>
                
                    <img src="../../pictures/man3.jpg" style="width: 70px">
            </div>
        </div>
    </section>
    
    <section id="memcen1">
        <div class='jumbotron' style="background-color: #FFD2D2; height: 30vh">	
            <div class="container">
                <div class='row'>
                    <div class='col-md-12'>
                    <?php
                        echo"<br><br><br><br><br>";
                        echo"<h1 class=display-4 font-italic  style='font-size: 30px; color:#FF7575' >您好！<br></h1>";
                        echo"<h1 class=display-4 font-italic style=color:#FF9797; font-size: 40px>$member_username<br></h1>";
                        echo"<p class='lead my-3' style='font-size: 30px'>您目前新增書籍數：";
                        
                        $sql  = "Select * From active WHERE member_account";
                        $result = mysqli_query($conn,$sql);
                        //$id = NULL;
                        $name = NULL;
                        $AA = 0;
                        $sql = "SELECT * FROM active WHERE member_account='$member_username'";			
                        if($stmt = $conn->query($sql))
                            {	 
                            while($result = mysqli_fetch_object($stmt))
                                { 
                                    if ( ($result->member_account) == $member_username)   
                                    { 
                                        $AA=$AA+1 ;
                                    }
                                    }	
                                    echo $AA ;
                            }	
					    echo"<p class=lead my-3 style='font-size: 30px'>您目前閱讀數：";
						$sql  = "Select * From active WHERE member_account";
                        $result = mysqli_query($conn,$sql);
                        //$id = NULL;
                        $name = NULL;
                        $BB = 0;
						$CC = 0;
                        $sql = "SELECT * FROM joinin WHERE member_account='$member_username'";			
                        if($stmt = $conn->query($sql))
                            {	 
                            while($result = mysqli_fetch_object($stmt))
                                { 
                                    if ( ($result->member_account) == $member_username)   
                                    { 
                                        $BB=$BB+1 ;
                                    }
                                    }	
                                    echo $BB ;
									$CC = $AA*10+$BB*5;
                            }	
						/*$sql = "INSERT INTO point (`member_account`,`point`,`time`) 
						VALUES ('$member_username','$CC','1')"; 
						if   (mysqli_query($conn,$sql) === TRUE){
							 $overpeople = $overpeople+1 ;
							//更新
							$sql = "UPDATE point
							SET member_up = '$overpeople'
							WHERE member_account='$go_account' AND member_time='$go_time' " ;
							if (mysqli_query($db,$sql) === TRUE){//不重要
								echo "參加成功，請準時出席".'<br>' ;  
								echo "三秒後自動切換畫面,請等待.............";
								header("Refresh:3;url=http://120.105.129.17/project/front/modify/membercenter.php") ; 
								}
							}	*/				
                						
                    ?>
                    <p style='font-size: 25px'>想建立活動嗎？
                    <a  href='http://120.105.129.17/project/front/item/index.php' class="p-2 text-danger" style='font-size: 25px'>手刀建立</a>
        
                    </div>
                </div>
            </div>
        </div>
    </section>
		  
         
        

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              
              <h3 class="mb-0">
                <a style="color:white; font-size: 35px" >修改會員資料</a>
              </h3>
              <div style="color:white; font-size: 25px">Modify member information</div>
              <p style="color:white; font-size: 30px">修改 密碼</p>
              <?php
                echo "<form name=form method=post action=index.php>";
                echo "<input type=hidden name=id value=".$id.">";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>前往修改</button>";
                echo "</form><br>";
              ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              <h3 class="mb-0">
                <a style="color:white; font-size: 35px">閱覽書籍</a>
              </h3>
              <div style="color:white; font-size: 25px">Reading </div>
              <p style="color:white; font-size: 30px">查看有哪些書籍</p>
              <?php
                echo "<form name=form method=post action=../../joinin/index.php>";
                echo "<input type=hidden name=id value=$id>";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>閱覽書籍</button>";
                echo "</form>";
              ?>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              
              <h3 class="mb-0">
                <a  style="color:white; font-size: 35px">活動地圖</a>
              </h3>
              <div style="color:white; font-size: 25px">Activity Map</div>
              <br>
              <?php
                echo "<form name=form method=post action=../recycle/checkrecycle.php>";
                echo "<input type=hidden name=id value=$id>";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>前往查看</button>";
                echo "</form>";
              ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              <h3 class="mb-0">
                <a  style="color:white; font-size: 35px">新增書籍</a>
              </h3>
              <div  style="color:white; font-size: 25px">Build Event</div>
              <br>
              <?php
                echo "<form name=form method=post action=../item/index.php>";
                echo "<input type=hidden name=id value=$id>";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>前往新增</button>";
                echo "</form>";
              ?>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              
              <h3 class="mb-0">
                <a  style="color:white; font-size: 35px">活動卡路里</a>
              </h3>
              <div style="color:white; font-size: 25px">Calories</div>
              <br>
              <?php
			    $A = 0 ;
			    $sql = "SELECT * FROM joinin ";			
				if($stmt = $conn->query($sql))
				  {	 
					while($result = mysqli_fetch_object($stmt))
						 { 
						  if ( ($result->member_account) == $member_username)   
							 { 
							  $all = $result-> member_place ;
							  if ($all == "苗栗縣政府")
							     {
								  $A = $A + 408 ; 
							     }
								 if ($all == "南苗三角公園")
							     {
								  $A = $A + 306 ; 
							     }
								 if ($all == "聯合八甲校區")
							     {
								  $A = $A + 54 ; 
							     }
								 if ($all == "聯合二坪校區")
							     {
								  $A = $A + 264 ; 
							     }
								 if ($all == "河濱公園")
							     {
								  $A = $A + 612 ; 
							     }
								 if ($all == "貓貍山公園")
							     {
								  $A = $A + 312 ; 
							     }
								  if ($all == "苗栗地方法院")
							     {
								  $A = $A + 330 ; 
							     }
								 if ($all == "苗栗火車站")
							     {
								  $A = $A + 462 ; 
							     }
								 if ($all == "巨蛋體育館")
							     {
								  $A = $A + 402 ; 
							     }
								 if ($all == "苗栗家樂福")
							     {
								  $A = $A + 486 ; 
							     }
								
								 
							 }
						 }				   
			      }
			  ?>
              <h3 class="mb-0">
                <a  style="color:white; font-size: 30px"> <?php echo "目前卡路里總消耗量為: ".$A." 大卡" ; ?> </a>
              </h3>			  
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              <h3 class="mb-0">
                <a  style="color:white; font-size: 35px">商家合作</a>
              </h3>
              <div  style="color:white; font-size: 25px">Business cooperation</div>
              <br>
              <?php
                echo "<form name=form method=post action=../store/storeget.php>";
                echo "<input type=hidden name=id value=$id>";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>前往兌換</button>";
                echo "</form>";
                echo "<form name=form method=post action=../store/pointrecord.php>";
                echo "<input type=hidden name=id value=$id>";
                echo "<button type=submit onclick=Check(event) style=font-size:15pt;width:100px;height:35px>兌換紀錄</button>";
                echo "</form>";
              ?>
            </div>
            
          </div>
        </div>
      </div>
      <br><br>
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
