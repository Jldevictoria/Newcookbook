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
		<title>Create - The New Cookbook!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A place to share your favorite recipies and discover new cooking ideas.">
		<meta name="author" content="Joseph Lopez DeVictoria">

		<!-- favicon -->
        <link rel="shortcut icon" href="/src/img/icon16.gif">

		<!-- Stylesheets -->
        <link href="http://www.newcookbook.org/src/bootstrap/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>
        
        <!-- Script for Form verification -->
        <script type="text/javascript" src="./validateCreationForm.js"></script>
        
	</head>

	<body style="background-color:#FADFC5">

		<!-- Navbar Implementation -->
        <div class="navbar navbar-inverse navbar-fixed-top">
                    <a class="brand active" href="http://www.newcookbook.org/"><img src="/src/img/newcookbook.gif" width="200"></a>
              <div class="nav-collapse collapse">
                <ul class="nav navbar-nav">
                	<li class="">
                		<a href="http://www.newcookbook.org/">Top</a>
                	</li>
                	<li class="">
                		<a href="./categories.php">Categories</a>
                	</li>
                	<li class="">
                		<a href="./ingredients.php">Ingredients</a>
                	</li>
                    <li class="active">
                    	<a href="./create.php">Create</a>
                    </li>                  
            		</ul>
                	<a class="btn btn-primary pull-right" <?php loginButtonRedirectorTwo(); ?>><img width="25" src="http://www.newcookbook.org/src/img/defaultusericon.png"> <?php loginButtonCheck(); ?></a>
                    <?php 
						logoutButtonCheck(); 
						settingsButtonCheck();
					?>
            </div>
        </div>
        
        <div class="container" style="padding-top::80px;"><br><br><br></div>  
        
        <div class="container" style="background-color: #FFFFFF; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;">
        	<?php 
				if ($_SESSION['userID']){
				echo
    				'This is where the Post creation page will be.
            			<form name="createPost" class="form-horizontal" role="form" action="./createpost.php" onsubmit="return validateCreationForm()" method="post">
            			<h3><div class="form-group"><br>
							<label for="inPostName" class="col-sm-2 control-label">New Post Title</label>
							<div class="col-sm-10">
								<input type="text" name="postName" class="form-control">
							</div>
						</div></h3>
						
                		<div class="form-group"><br>
							<label for="inShortDesc" class="col-sm-2 control-label">Short Description</label>
							<div class="col-sm-10">
								<input type="text" name="shortDesc" class="form-control">
							</div>
						</div>
						
						<div class="form-group"><br>
							<label for="inLongDesc" class="col-sm-2 control-label">Full Description</label>
							<div class="col-sm-10">
								<input type="text" name="longDesc" class="form-control">
							</div>
						</div>
						
						<div class="form-group"><br>
							<label for="inIngredients" class="col-sm-2 control-label">Ingredients</label>
							<div class="col-sm-10">
								<input type="text" name="ingredients" class="form-control">
							</div>
						</div>
						
                		<div class="form-group"><br>
							<label for="inInstructions" class="col-sm-2 control-label">Instructions</label>
							<div class="col-sm-10">
								<input type="text" name="instructions" class="form-control">
							</div>
						</div>
						
                		<p><align="center"><input type="Submit" value="Post Recipe"/></p>
						
            		</form>';}else{  
				echo '<p><align="center">You must be logged in to create a post, please log in or register to participate!';
				}
			?>
       </div>
	</body>
</html>