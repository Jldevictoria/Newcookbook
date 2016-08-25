<?php 
	session_start();
	require_once('./dbconnect.php');
	require_once('./functions.php'); 
?>

<!DOCTYPE html>
	<head>
    
    	<!-- Meta Information -->
		<meta charset="utf-8">
		<title>Create Post Processing - The New Cookbook!</title>
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
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      		<script src="assets/js/html5shiv.js"></script>
    	<![endif]-->
	</head>

	<body style="background-color:#FADFC5">
    <p align="center">
    <img src="http://www.newcookbook.org/src/img/newcookbook.gif" width> <br> <br> <br> <br>
    <font size="12">
    <?php 
		echo "Posting your recipe......"; 
		echo '<br> <br>';
		submitPost();  
	?>
    
   </body>
</html>