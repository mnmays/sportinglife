function checkForm()  //client side validation
{
	
	var username = document.getElementById("username1").value;
	var password = document.getElementById("password1").value;
	
	
	if(username==''||password=='')
	{
		alert("Please fill in all fields.");
	}
	else
	{
		var username1 = document.getElementById("username");
		var password1 = document.getElementById("password");
		
		if(firstName1.innerHTML == 'Username must be alpha characters only.')
		{
			alert("Correct invalid information.");
		}
		else
		{
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "post-admin-login.php",true);
			xmlhttp.send();
			
		}
	}
};

function validate(field,query)  //server side validation
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		
		
		if (this.readyState != 4 && this.status == 200)
		{
			document.getElementById(field).innerHTML ="validating";
		}
		
		else if (this.readyState ==4 && this.status == 200)
		{
			document.getElementById(field).innerHTML = xmlhttp.responseText;
			
		}
		else
		{
			document.getElementById(field).innerHTML = "Error Occurred.";
		}
	};

	
	xmlhttp.open("GET", "admin-login-validation.php?field=" + field +"&query=" + query,true);
	xmlhttp.send();
	
};
