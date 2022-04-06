<!DOCTYPE html>
<?php
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
 
?>
<html>
  <head>
    <title>參加活動</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="../../css/fishstyle.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
    <style type="text/css">
      html, body, #map-canvas { height: 95%; margin: 0px; padding: 0px;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIO_GnspBGv_G994UbyKC8NmFaKrTVhpo">
    </script>
<font size="3">	
    <script type="text/javascript">
	
	var pinColor = "FFFF00";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(90, 120),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
    var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_blu-stars",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));
	var pinColor1 = "66FF00";
    var pinImage1 = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor1,
        new google.maps.Size(90, 120),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
    var pinShadow1 = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));	
	var pinColor2 = "E32636";
    var pinImage2 = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor2,
        new google.maps.Size(90, 120),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
    var pinShadow2 = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));		
	   var a = -1 , b = -1 , c=-1 ,d=-1 , d1=-1;
       function initialize() {
		var mapOptions = {
          center: { lat: 24.538040, lng: 120.788265},
          zoom: 15
        };
        var map = new google.maps.Map(
            document.getElementById('map-canvas'),
            mapOptions);		
				
		var infowindow = new google.maps.InfoWindow({
            content: '<h1>目前所在位置</h1>'
            });	
		var marker = new google.maps.Marker({position: {lat:24.538040,lng:120.788265}, map: map});	
		marker.setAnimation(google.maps.Animation.BOUNCE);
	    marker.addListener('click',function(){
			a = a * -1;
			if  ( a > 0)
			    {
			     infowindow.open(map, marker);
			    }
			else{
			     infowindow.close();
			    }
			    });
				
		//市政府
		var infowindowone = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if  ( ($result->member_place) == 'one')   
					      { 
						   $ONE = $result->member_account ;
						   $ONE1 = $result->member_time ;
					      }
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $ONE ?></h5><br><h5>時間是:<?php echo $ONE1 ?></h5><br><h5><a href="https://reurl.cc/ZOVEW3">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$ONE>";
																																														echo "<input type=hidden name=member_time value=$ONE1>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index2.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																														
																																										          ?></h5>',              
					maxWidth:800,
					});	
		var one = new google.maps.Marker({position: {lat:24.565045,lng:120.820948}, map: map, icon: pinImage, shadow: pinShadow});
		one.addListener('click',function(){
			b = b * -1;
			if  ( b > 0)
			    {
			     infowindowone.open(map, one);
			    }
			else{
			     infowindowone.close();
			    }
			    });		
        
		//三角公園
		var infowindowtwo = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'two')   
					     { 
						  $TWO = $result->member_account ;
						  $TWO1 = $result->member_time ;
						  $TWO2 = $result->member_text ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $TWO ?></h5><br><h5>時間是:<?php echo $TWO1 ?></h5><br><h5>內容是:<?php echo " ".$TWO2 ?></h5><br><h5><a href="https://reurl.cc/E7g9rm">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$TWO>";
																																														echo "<input type=hidden name=member_time value=$TWO1>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index3.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var two = new google.maps.Marker({position: {lat:24.552155,lng:120.816316}, map: map,icon: pinImage1, shadow: pinShadow1});	
		two.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowtwo.open(map, two);
			    }
			else{
			     infowindowtwo.close();
			    }
			    });
		
		//八甲
        var infowindowthree = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'three')   
					     { 
						  $THREE = $result->member_account ;
						  $THREE1 = $result->member_time ;
					     }	 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $THREE ?></h5><br><h5>時間是:<?php echo $THREE1 ?></h5><br><h5><a href="https://reurl.cc/j7QnGp">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$THREE>";
																																														echo "<input type=hidden name=member_time value=$THREE1>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index4.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var three = new google.maps.Marker({position: {lat:24.535948,lng:120.792268}, map: map,icon: pinImage1, shadow: pinShadow1});	
		three.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowthree.open(map, three);
			    }
			else{
			     infowindowthree.close();
			    }
			    });
				
		//二坪
        var infowindowfour = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'four')   
					     { 
						  $FOUR = $result->member_account ;
						  $FOUR1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $FOUR ?></h5><br><h5>時間是:<?php echo $FOUR1 ?></h5><br><h5><a href="https://reurl.cc/L35kML">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$FOUR>";
																																														echo "<input type=hidden name=member_time value=$FOUR>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index5.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var four = new google.maps.Marker({position: {lat:24.545551,lng:120.813357}, map: map, icon: pinImage, shadow: pinShadow});	
		four.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowfour.open(map, four);
			    }
			else{
			     infowindowfour.close();
			    }
			    });
				
		//河濱公園
        var infowindowfive = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'five')   
					     { 
						  $FIVE = $result->member_account ;
						  $FIVE1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $FIVE ?></h5><br><h5>時間是:<?php echo $FIVE1 ?></h5><br><h5><a href="https://reurl.cc/4R60pD">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$FIVE>";
																																														echo "<input type=hidden name=member_time value=$FIVE>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index6.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var five = new google.maps.Marker({position: {lat:24.568379,lng:120.841071}, map: map, icon: pinImage1, shadow: pinShadow1});	
		five.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowfive.open(map, five);
			    }
			else{
			     infowindowfive.close();
			    }
			    });		


        //貓貍山
        var infowindowsix = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'six')   
					     { 
						  $SIX = $result->member_account ;
						  $SIX1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $SIX ?></h5><br><h5>時間是:<?php echo $SIX1 ?></h5><br><h5><a href="https://reurl.cc/3D62Yl">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$SIX>";
																																														echo "<input type=hidden name=member_time value=$SIX>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index7.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var six = new google.maps.Marker({position: {lat:24.556411,lng:120.809632}, map: map,icon: pinImage, shadow: pinShadow});	
		six.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowsix.open(map, six);
			    }
			else{
			     infowindowsix.close();
			    }
			    });	

        //地方法院
        var infowindowseven = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'seven')   
					     { 
						  $SEVEN = $result->member_account ;
						  $SEVEN1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $SEVEN ?></h5><br><h5>時間是:<?php echo $SEVEN1 ?></h5><br><h5><a href="https://reurl.cc/E7g9R0">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$SEVEN>";
																																														echo "<input type=hidden name=member_time value=$SEVEN>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index8.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var seven = new google.maps.Marker({position: {lat:24.545832,lng:120.817026}, map: map, icon: pinImage2, shadow: pinShadow2});	
		seven.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowseven.open(map, seven);
			    }
			else{
			     infowindowseven.close();
			    }
			    });	

        //火車站
        var infowindoweight = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'eight')   
					     { 
						  $EIGHT = $result->member_account ;
						  $EIGHT1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $EIGHT ?></h5><br><h5>時間是:<?php echo $EIGHT1 ?></h5><br><h5><a href="https://reurl.cc/exGNOK">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$EIGHT>";
																																														echo "<input type=hidden name=member_time value=$EIGHT>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index9.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var eight = new google.maps.Marker({position: {lat:24.570124,lng:120.822777}, map: map,icon: pinImage, shadow: pinShadow});	
		eight.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindoweight.open(map, eight);
			    }
			else{
			     infowindoweight.close();
			    }
			    });	

        //巨蛋
        var infowindownine = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'nine')   
					     { 
						  $NINE = $result->member_account ;
						  $NINE1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $NINE ?></h5><br><h5>時間是:<?php echo $NINE1 ?></h5><br><h5><a href="https://reurl.cc/O15y4y">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$NINE>";
																																														echo "<input type=hidden name=member_time value=$NINE>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index10.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var nine = new google.maps.Marker({position: {lat:24.563580,lng:120.814903}, map: map, icon: pinImage2, shadow: pinShadow2});	
		nine.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindownine.open(map, nine);
			    }
			else{
			     infowindownine.close();
			    }
			    });	
        //家樂福
        var infowindowten = new google.maps.InfoWindow({
			<?php 
             $sql = "SELECT * FROM active";			
		     if($stmt = $db->query($sql))
	           {	 
			    while($result = mysqli_fetch_object($stmt))
				     { 
				   	  if ( ($result->member_place) == 'ten')   
					     { 
						  $TEN = $result->member_account ;
						  $TEN1 = $result->member_time ;
					     }		 
				     }				
	           }
			?>   
					content: '<h5>舉辦人是:<?php echo $TEN ?></h5><br><h5>時間是:<?php echo $TEN1 ?></h5><br><h5><a href="https://reurl.cc/R4LZXx">不會走嗎?點我帶你去</a><br><br><?php echo "<form name=form method=post action=gogo.php>";
																																														echo "<input type=hidden name=member_account value=$TEN>";
																																														echo "<input type=hidden name=member_time value=$TEN>";																																														
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>點我參加</button>";
																																														echo "</form>";
																																														echo "<form name=form method=post action=../../message2/index11.php>";
																																														echo "<button type=submit onclick=Check(event) style=font-size:10pt;width:90px;height:30px>查看留言板</button>";
																																														echo "</form>";
																																										          ?></h5>',
					maxWidth:800,
					});	
		var ten = new google.maps.Marker({position: {lat:24.573684,lng:120.817677}, map: map, icon: pinImage2, shadow: pinShadow2});	
		ten.addListener('click',function(){
			d = d * -1;
			if  ( d > 0)
			    {
			     infowindowten.open(map, ten);
			    }
			else{
			     infowindowten.close();
			    }
			    });								
	}  
	
      google.maps.event.addDomListener(
          window, 'load', initialize);
      		  
    </script>
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
                            <li class="nav-item">
						        <a class="nav-link" href='../../message2/index.php'>留言板</a>
						    </li>								
					  </ul>				  
					  
					</div>
				  </nav>				 
			</div>
        </header>

<div id="map-canvas"></div>
<div>	
  </body>
</html>