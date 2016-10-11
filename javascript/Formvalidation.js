
function isValidCreateAdvert()
{
	var price = document.forms["createAdvertform"]["pricePerHour"].value;
	var typeOfService = document.forms["createAdvertform"]["typeOfService"].value;
	
	if(price < 0 || price == ""){
		alert("Please fill in a valid price");
		return false;
	}
	
	if(typeOfService == ""){
		alert("Please fill in a valid type of service");
		return false;
	}
}

function isValidRegisterForm()
{
	var name = document.forms["registerForm"]["details[0]"].value;
	var email = document.forms["registerForm"]["details[1]"].value;
	var password = document.forms["registerForm"]["details[2]"].value;
	var password2 = document.forms["registerForm"]["details[3]"].value;
	
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	
	if(name == ""){
		alert("Please enter a valid name");
		return false;
	}
	
	if(email == "" || !emailReg.test(email)){
		alert("Please enter a valid email address");
		return false;
	}

	if(password == "" || password2 == ""){
		alert("Please enter a valid password");
		return false;
	}
	
	if(password != password2){
		alert("Your passwords do not match");
		return false;
	}
	
	
}
