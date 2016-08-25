<?php 
	session_start();
	require_once('./dbconnect.php');
	require_once('./functions.php'); 
?>
<!-- ^ Php session and code include ^ -->

<!DOCTYPE html>
	<head>
    
    	<!-- Meta Information -->
		<meta charset="utf-8">
		<title>Custom Search - The New Cookbook!</title>
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
                    <a class="brand active" href="./"><img src="/src/img/newcookbook.gif" width="200"></a>
              <div class="nav-collapse collapse">
                <ul class="nav navbar-nav">
                	<li class="">
                		<a href="./">Top</a>
                	</li>
                	<li class="<?php checkSearchType(); ?>">
                		<a href="./categories.php">Categories</a>
                	</li>
                	<li class="<?php checkSearchType(); ?>">
                		<a href="./ingredients.php">Ingredients</a>
                	</li>
                    <li class="">
                    	<a href="./create.php">Create</a>
                    </li> 
                    <li class="active">
                    	<a href="./custom.php">Custom Search</a>
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
        	This is where the custom posts will be found.  Users will be able to scroll through and vote accordingly.
        </div>
        <!-- echo hash('sha256', 'poopnugget100'); -->        
	</body>    
</html>