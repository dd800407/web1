<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">		
        <link rel="stylesheet" href="css/fishstyle.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <title>CFC104-team03專題</title>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="pricing.css" rel="stylesheet">
    </head>


    <body>

        <header>
			<div class='container'>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="#">
						<img src="pictures/tree.png">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
				  
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    
                        <ul class="navbar-nav mr-auto">
						    <li class="nav-item">
						        <a class="nav-link" href='index.php'style='font-size:20px'>主頁</a>
						    </li>
                            <li class="nav-item">
						        <a class="nav-link" href='#'style='font-size:20px'>會員中心</a>
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
					  
					</div>
				  </nav>				 
			</div>
        </header>

        <section id='top'>
            <div class='jumbotron' style="background-color: #FFD2D2; height: 30vh">				
				<div class='container'>	
					<div class='row'>		
						<div class='col-md-12'>							
							<h1 style='font-size: 40px; color:#FF7575'>CFC104-team03專題</h1>						
						</div>						
					</div>	
				</div>			
			</div>			
        </section>

        

        <div class="container" >
            <form name="form" method="post" action="index.php">
                <div class="card-deck mb-5 text-center">
                    <h1 class="h3 mb-3 font-weight-normal">會員登錄</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" name="member_username"  class="form-control" maxlength="30" placeholder="帳號" required autofocus required="required">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="member_password"  class="form-control" maxlength="30" placeholder="密碼" required="required">
        
        
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
                    <a   class="p-2 text-dark"  ></a>

                    <a   href='addacountindex.php' class="p-2 text-danger" >註冊會員</a>
                    <a   href='forgot.php' class="p-2 text-danger" >忘記密碼？</a>
                </div>
            </form>
        </div>

		<section class="line">
			<div class='row'>
				<div class='col-md-12 text-center'>
					<img src="pictures/line1.png">
					<img src="pictures/line1.png">
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
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vendor/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        
        </script>

    
    </body>
</html>
