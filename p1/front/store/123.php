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


		<title>兌換紀錄</title>
		
		<!-- Bootstrap core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="pricing.css" rel="stylesheet">
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
						    <li class="nav-item">
						        <a class="nav-link" href='../../index.php'>主頁</a>
						    </li>
                            <li class="nav-item">
						        <a class="nav-link" href='../modify/membercenter.php'>會員中心</a>
							</li>
							<li class="nav-item">
						        <a class="nav-link" href='../item/index.php'>建立活動</a>
						    </li>
							<li>
							<a class="nav-link" href="../../message2/index.php">留言板</a>
							</li>					
					  </ul>				  
					  
					</div>
				  </nav>				 
			</div>
        </header>

    	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<img src="../../pictures/cat1.png" style="width: 90px">
			<h1 class="display-3" style="font-size: 40px; color: #613030">兌換紀錄</h1>
		</div>
		
		<section id="search">
			<div class='container'>
 <?php
 
$db_server = "localhost";
$db_name   = "project";
$db_user   = "root";
$db_passwd = "";

$what = @$_GET['action'];
$QQQ = @$_GET['qqq'];
$randoma = @$_GET['randoma'];




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

$member_username = @$_COOKIE["member_username"];
$member_password = @$_COOKIE["member_password"];

date_default_timezone_set('Asia/Taipei');
$n = date("Y-m-d ").date("H:i:s") ;

$sql = "INSERT INTO exchange (`member_account`,`item`,`exchange`,`minus`,`time`,`change2`) 
		VALUES ('$member_username','$what','$randoma','5','$n','0')"; 
$point = 0 ;
if   (mysqli_query($conn,$sql) === TRUE)
     {	
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
					   $point = ($point-5) ;
                     /*  if ( $point < 0 )
					   {
						echo "點數不足" ;   
					   }		*/		
                      $sql = "UPDATE member
							SET member_join = '$point'
							WHERE member_username='$member_username'  " ;	
                       if (mysqli_query($conn,$sql) === TRUE)
					  {
						  header("Refresh:0;url=http://120.105.129.17/project/front/store/pointrecord.php	") ; 
					  }	
					   					   
                       
	 }

				?>


		
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

    function membercenter(){
    document.forms["MyForm1"].submit();
    }
    function Order(){
      document.forms["MyForm2"].submit();
    }
    function Item(){
      document.forms["MyForm3"].submit();
    }
    function recycle(){
      document.forms["MyForm4"].submit();
    }
    function out(){
      document.forms["MyForm5"].submit();
      $id=NULL;
    }
    </script>
  </body>
</html>
