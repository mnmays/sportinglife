// Validating Empty Field
function check_empty() {
if (document.getElementById('msg').value == ""||document.getElementById('quantity').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
//var itemIndex= index;
//var itemPrice = price;
//var itemSize = size;
function div_show(index) {
document.getElementById('abc').style.display = "block";

document.getElementById("id1").value=index;

}
function div_show2(index) {
document.getElementById('abc').style.display = "block";

document.getElementById("cartID1").value=index;

}
function div_show3() {
document.getElementById('abc2').style.display = "block";

}

function div_show4() {
document.getElementById('paypal-button-container').style.display = "block";

}


function showPay()
{
	document.getElementById('pay-now').style.display = "block";
}


function showDiv() {
   document.getElementById('paypal-button-container').style.display = "block";
   amount=document.getElementById("totalCart1").value;
  
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'ASlk2qALC0I-fA5n39Hixc2NxulFftVqqYbVMoxIr6BnqNSk-Lsx3ngJJY0eLoIjhumUD4GQMAySANzn',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    transactions: [
                        {
                            amount: { total: amount, currency: 'USD' }
                        }
                    ]
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                    submitForm();
                    //insertOrder();
                });
                
                 if (error === 'INSTRUMENT_DECLINED') {
                actions.restart();
                 }
            }

        }, '#paypal-button-container');  
};
//Function to Hide Popup
function div_hide(){
document.getElementById("myForm").reset();
document.getElementById('abc').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}

function div_hide2(){
document.getElementById("myForm").reset();
document.getElementById('abc2').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}

function checkForm()  //client side validation
{
	
	var message = document.getElementById("message1").value;
	var quantity= document.getElementById("quantity1").value;
	
	if(message==''||quantity=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(message1.innerHTML=='Invalid message'||quantity1.innerHTML=='Invalid quantity.')
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
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "shopping-cart.php?cookie="+cookie,true);
			//xmlhttp.open("GET", "shopping-cart.php",true);
			xmlhttp.send();
		}
	}
	
	
	
};

function checkForm2()  //client side validation
{
	
	//var message = document.getElementById("message1").value;
	var quantity= document.getElementById("quantity1").value;
	
	if(quantity=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		//var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(quantity1.innerHTML=='Invalid quantity.')
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
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "shopping-cart.php?cookie="+cookie,true);
			xmlhttp.send();
		}
	}
	
	
	
};

function checkForm3()  //client side validation
{
	var success=0;
	var name = document.getElementById("fullName1").value;
	var email= document.getElementById("emailAddress1").value;
	var add1= document.getElementById("addressLine11").value;
	//var add2= document.getElementById("address-line21").value;
	var city= document.getElementById("city1").value;
	var state= document.getElementById("state1").value;
	var zip= document.getElementById("postalCode1").value;
	var country= document.getElementById("country").value;
	
	if(name=='' || email==''||add1==''||city==''||state==''||zip==''||country=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		//var message1 = document.getElementById("message");
		/*var quantity1= document.getElementById("quantity");
		if(quantity1.innerHTML=='Invalid quantity.')
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
		//else
		//{
		alert("Success!");
		success=1;
		//showDiv();
			//var xmlhttp;
			//xmlhttp = new XMLHttpRequest();
			//xmlhttp.open("GET", "shopping-cart.php?cookie="+cookie,true);
			//xmlhttp.send();
		//}
	}
	
	if (success==1)
	{
		
		showDiv();
		//showPay();
	}
	
	
	
};


function clearCart()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "clearCart.php",true);
	xmlhttp.send();
};

function insertOrder()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "insertOrder.php",true);
	xmlhttp.send();
};

function submitForm()
{
	document.getElementById("myForm").submit();
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

function validate2(field,query)  //server side validation
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

	
	xmlhttp.open("GET", "checkoutValidation.php?field=" + field +"&query=" + query,true);
	xmlhttp.send();
	
};

function validate3(field,query)  //server side validation
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

