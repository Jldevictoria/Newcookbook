function validateRegistrationForm(){
	var a=document.forms["registerForm"]["uName"].value;
	if (a==null || a==""){
  		alert("You need to choose a username");
 		return false;
  	}
	var b=document.forms["registerForm"]["uPassword"].value;
	if (b==null || b==""){
		alert("You need to choose a password!");
		return false;
	}
	var c=document.forms["registerForm"]["uPasswordC"].value;
	if (c==null || c==""){
		alert("You are missing your verification Password!");
		return false;
	}
	if (c != b){
		alert("Passwords do not match!");
		return false;
	}
	var b=document.forms["registerForm"]["uEmail"].value;
	if (b==null || b==""){
		alert("You need to enter an email!");
		return false;
	}
	var e=document.forms["registerForm"]["uEmailC"].value;
	if (e==null || e==""){
		alert("You are missing your verification email!");
		return false;
	}
	var f=document.forms["registerForm"]["uName"].length;
	if ( f < 3 || f > 28 ){
		alert("Username must be at least 3 characters, and at most 28 characters");
		return false;
	}
	var g=document.forms["registerForm"]["uPassword"].length;
	if ( g < 8 || g > 64){
		alert("Password must be at least 8 characters, and at most 64 characters");
		return false;
	}
}