<?php 
	session_start();
	require_once('./src/code/dbconnect.php');
	require_once('./src/code/functions.php'); 
?>
<!-- ^ Php session and code include ^ -->

<!DOCTYPE html>
	<head>
    
    	<!-- Meta Information -->
		<meta charset="utf-8">
		<title>The New Cookbook!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A place to share your favorite recipies and discover new cooking ideas.">
		<meta name="author" content="Joseph Lopez DeVictoria">

		<!-- favicon -->
        <link rel="shortcut icon" href="/src/img/icon16.gif">

		<!-- Stylesheets -->
        <link href="/src/bootstrap/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      		<script src="assets/js/html5shiv.js"></script>
    	<![endif]-->
	</head>
    
	<body style="background-color:#FADFC5">

		<!-- Navbar Implementation -->
        <div class="navbar navbar-inverse navbar-fixed-top">
                    <a class="brand active" href="./"><img src="./src/img/newcookbook.gif" width="200"></a>
              <div class="nav-collapse collapse">
                <ul class="nav navbar-nav">
                	<li class="active">
                		<a href="./">Top</a>
                	</li>
                	<li class="">
                		<a href="./src/code/categories.php">Categories</a>
                	</li>
                	<li class="">
                		<a href="./src/code/ingredients.php">Ingredients</a>
                	</li>
                    <li class="">
                    	<a href="./src/code/create.php">Create</a>
                    </li>                 
            		</ul>
                	<a class="btn btn-primary pull-right" <?php loginButtonRedirectorOne(); ?>><img width="25" src="http://www.newcookbook.org/src/img/defaultusericon.png"> <?php loginButtonCheck(); ?></a>
                    <?php 
						logoutButtonCheck(); 
						settingsButtonCheck();
					?>
            </div>
        </div>
        <div class="container" style="padding-top::80px;"><br><br><br></div>  
        <div class="container" style="background-color: #FFFFFF; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
        	<p>Welcome to the new cookbook!
            This is where the Top posts will be found.  Users will be able to scroll through and vote for their favorite posts here.
            <p>This is a rough example of what the posts will look like when the design is completed:
        </div>  
        <br>      
        <div class="container" style="background-color: #FFFFFF; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; padding: 18px;">
        	<div class="media-body">
            	<h2> Devils Food Cake with Fudgey Chocolate Frosting </h2>
           </div>
        	<div class="img-thumbnail" style="width: 100%;">
            	<img src="./src/img/devils-food-cake5.jpg" width="350" >
                <div class="pull-right" style="width: 75;">
                	<img style="margin-top:10px; margin-bottom:10px;" src="./src/img/thumbsup.gif" width="75"><br>
                	<img style="margin-top:10px; margin-bottom:10px;" src="./src/img/thumbsdown.gif" width="75"> 
                </div>
            </div>
            <div class="media-body">
                <h4> This recipe was given to me by my boss' wife, and is honestly one of the most delicious cakes I have ever tried!  The cake is very moist and sweet.  A must try! </h4>
                
                <h5> Tags: Cake, Chocolate, Dessert </h5>
            </div>
        </div> 
        <?php generateFrontPage(); ?> 
	</body>    
</html>