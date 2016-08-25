<?php 
	date_default_timezone_set('America/Denver');

	function loginButtonRedirectorOne(){
		if($_SESSION['userID']){
			echo 'href="./src/code/user.php"';}
		else {echo 'href="./src/code/login.php"';}	
	}
	
	function loginButtonRedirectorTwo(){
		if($_SESSION['userID']){
			echo 'href="./user.php"';}
		else {echo 'href="./login.php"';}	
	}

	function loginButtonCheck(){
		if($_SESSION['userID']){
			echo $_SESSION['userID'];}
		else {echo "Log in / Sign up";}
	}
	
	function checkLoginInfo(){
		$hashedPass = hash('sha256', $_POST['uPassword']);
		$accountQ = mysql_query("SELECT * FROM accounts WHERE (Username = '$_POST[uName]')");
		$nameQ = mysql_fetch_array($accountQ);
		if (!$nameQ['Username']|$nameQ['Password'] != $hashedPass){
			$_SESSION['pIncorrect'] = true;	
			echo 'Incorrect Username or password, <a href="http://www.newcookbook.org/src/code/login.php"> click here to try again. </a>';
		}else{
			$_SESSION['pIncorrect'] = false;
			$_SESSION['userID'] = $nameQ['Username'];
			echo 'Success! <a href="http://www.newcookbook.org"> Click here to continue. </a>';
		}
	}
	
	function wrongPass(){
		if ($_SESSION['pIncorrect'] == true){
			echo "Incorrect username or password.";
		}
	}
	
	function checkRegisterInfo(){
		$errorFlag = false;
		if ($_POST['uPassword'] != $_POST['uPasswordC']){
			echo '<br>Passwords do not match.';	
			$_SESSION['npIncorrect'] = true;
			$errorFlag = true;
		}
		if (strlen($_POST['uPassword']) > 64|strlen($_POST['uPassword']) < 8){
			echo '<br>Password must be at least 8 characters, and at most 64 characters';
			$_SESSION['npBad'] = true;	
			$errorFlag = true;
		}
		if ($_POST['uEmail'].length > 64){
			echo '<br>Email must be at most 64 characters';
			$_SESSION['bEmail'] = true;
			$errorFlag = true;
		}			
		if (strlen($_POST['uName']) > 28|strlen($_POST['uName']) < 3){
			echo '<br>Username must be at least 3 characters, and at most 28 characters';	
			$_SESSION['bUsername'] = true;
			$errorFlag = true;
		}
		if ($_POST['uEmail'] != $_POST['uEmailC']){
			echo '<br>Emails do not match.';	
			$_SESSION['neIncorrect'] = true;
			$errorFlag = true;
		}
		if (!$_POST['uName']|!$_POST['uPassword']|!$_POST['uPasswordC']|!$_POST['uEmail']|!$_POST['uEmailC']){
			echo '<br>Missing required fields';
			$_SESSION['missField'] = true;
			$errorFlag = true;	
		}
		if ($errorFlag == true){
			echo '<br><h2 style="text-align:center;">There were problems with your form, to fix these issues <a href="./register.php">click here!</a></h2>';	
		}else{
			$hashedPass = hash('sha256', $_POST['uPassword']);
			$todaysDate = date('Y-m-d');
			mysql_query("INSERT INTO accounts (Username, Password, Email, DateJoined) VALUES ('$_POST[uName]', '$hashedPass', '$_POST[uEmail]', '$todaysDate')");
			echo '<br><h2 style="text-align:center;">Your Registration was successful, <a href="./login.php">click here</a> to log in</h2>';
		}
	}
	
	function badUserName(){
		if ($_SESSION['bUsername'] == true){
			echo '<br>Username must contain at least 3 letters, and at most 28 characters.';
			$_SESSION['bUsername'] == false;	
		}
	}
	
	function badNewPassword(){
		if ($_SESSION['npBad'] == true){
			echo '<br>Password must be at least 9 characters, and at most 64 characters';	
			$_SESSION['npBad'] == false;
		}
	}
	
	function wrongNewPass(){
		if ($_SESSION['npIncorrect'] == true){
			echo '<br>Passwords do not match.';	
			$_SESSION['npIncorrect'] == false;
		}
	}
	
	function wrongNewEmail(){
		if ($_SESSION['neIncorrect'] == true){
			echo '<br>Emails do not match.';	
			$_SESSION['neIncorrect'] == NULL;
		}
	}
	
	function badEmail(){
		if ($_SESSION['bEmail'] == true){
			echo '<br>Email must be at most 64 characters';
			$_SESSION['bEmail'] == NULL;
		}
	}
	
	function missingField(){
		if ($_SESSION['missField'] == true){
			echo '<br>Required field(s) is(are) missing.';	
			$_SESSION['missField'] == NULL;
		}
	}
	
	function logoutButtonCheck(){
		if ($_SESSION['userID']){ echo '<a class="btn pull-right" href="http://www.newcookbook.org/src/code/logout.php">Log out</a>'; }
	}
	
	function settingsButtonCheck(){
		if ($_SESSION['userID']){ echo '<a class="btn pull-right" href="http://www.newcookbook.org/src/code/usersettings.php">Settings</a>'; }
	}
	
	function logoutNow(){
		session_unset();
		session_destroy();
	}
	
	function checkSearchType(){
		
	}
	
	function submitPost(){
		$postNum = mysql_query("SELECT currentValue FROM globals WHERE (postCounter = 'default')");
		$postResult = mysql_fetch_assoc($postNum);
		$todaysDate = date('Y-m-d-h-m-s');
		$usernamenow = $_SESSION['userID'];
		mysql_query("INSERT INTO posts (Title, PostID, CreationDate, PostRating, Username, ShortDescription, LongDescription, Instructions, Thumbnail) VALUES ('$_POST[postName]', '$postResult[currentValue]', '$todaysDate', '1', '$usernamenow', '$_POST[shortDesc]', '$_POST[longDesc]', '$_POST[instructions]', 'http://www.newcookbook.org/src/img/genericfood.gif')");
		$postResult[currentValue] = $postResult[currentValue] + 1;
		mysql_query("UPDATE globals SET currentValue = $postResult[currentValue] WHERE (postCounter = 'default')");
		echo '<br><h2 style="text-align:center;">Your recipe has been posted, <a href="http://www.newcookbook.org">click here</a> to return home </h2>';
	}
	
	function generatefrontPage(){
		$todaysDate = date('Y-m-d-h-m-s');
		$topPost = mysql_query("SELECT * FROM posts ORDER BY PostRating DESC LIMIT 10");
		if (!$topPost) {
    		die('Query execution problem: ' . msql_error());
		}
		while($topResult = mysql_fetch_array($topPost)){
			echo '
				<br>      
		        <div class="container" style="background-color: #FFFFFF; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; padding: 18px;">
		        	<div class="media-body">
		            	<h2> ';	echo "$topResult[Title]"; echo '</h2>
		            </div>
		        	<div class="img-thumbnail" style="width: 100%;">
		            	<img src="';echo "$topResult[Thumbnail]"; echo '" width="350" >
		                <div class="pull-right" style="width: 75;">
		                	<img style="margin-top:10px; margin-bottom:10px;" src="./src/img/thumbsup.gif" width="75"><br>
		                	<img style="margin-top:10px; margin-bottom:10px;" src="./src/img/thumbsdown.gif" width="75"><br>
		                	Rating: '; echo "$topResult[PostRating]"; echo 
		                '</div>
		            </div>
		            <div class="media-body">
		                <h4> '; echo "$topResult[ShortDescription]"; echo '</h4>
		                
		                <h5> Tags: To be implemented. </h5>
		            </div>
		        </div> 
		    ';
		}
	}

?>