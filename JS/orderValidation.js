function div_show()
{
	document.getElementById('mainform').style.display="block";
}

function div_hide()
{
	document.getElementById('mainform').style.display="none";
}


function checkForm()  //client side validation
{
	
	var firstName = document.getElementById("firstName1").value;
	var lastName = document.getElementById("lastName1").value;
	var emailAdd = document.getElementById("emailAdd1").value;
	var message = document.getElementById("message1").value;
	
	if(firstName==''||lastName==''||emailAdd==''||message=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		var firstName1 = document.getElementById("firstName");
		var lastName1 = document.getElementById("lastName");
		var emailAdd1 = document.getElementById("emailAdd");
		var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(firstName1.innerHTML == 'First name must be alpha characters only.'
		|| lastName1.innerHTML == 'Last name must be alpha characters only.'||emailAdd1.innerHTML == 'Invalid email address.'
		||message1.innerHTML=='Invalid message'||quantity1.innerHTML=='Invalid quantity.')
		{
			alert("Correct invalid information.");
			return false;
		}
		/*else
		{
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "contactValidation.php",true);
			xmlhttp.send();
			
		}*/
		else
		{
		alert("Success!");
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

	
	xmlhttp.open("GET", "orderValidation.php?field=" + field +"&query=" + query,true);
	xmlhttp.send();
	
};