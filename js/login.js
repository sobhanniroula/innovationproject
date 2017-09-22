function clicked(){

var user = document.getElementById('username);
var pass = document.getElementById('password);

var coruser = "arunk";
var caorpass = "login";

if(user.value == coruser)
{
	if(pass.value == corpass)
	{
		window.open();
	} else{
		window.alert("incorrect Username or Password");
		
	}	
} else{
	window.alert("incorrect Username or Password");
}

}