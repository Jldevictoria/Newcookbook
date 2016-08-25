function validateCreationForm(){
	var x=document.forms["createPost"]["postName"].value;
	if (x==null || x==""){
  		alert("Your post needs a title!");
 		return false;
  	}
}