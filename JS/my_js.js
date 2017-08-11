// Validating Empty Field
function check_empty() {
if (document.getElementById('msg').value == ""||document.getElementById('quantity').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}

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

function submit()
{
	var form=document.getElementById('userImageForm'),field=form.elements.AddUserImage;
	field.onblur=this.form.submit();
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
var div = document.getElementById('quantity');
while(div.firstChild){
    div.removeChild(div.firstChild);
}

document.getElementById("myForm").reset();
document.getElementById('abc').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}

function div_hide2(){
document.getElementById("myForm").reset();
document.getElementById('abc2').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}
function div_hide3(){
document.getElementById("myForm").reset();
document.getElementById('123').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}


function checkForm()  //client side validation
{
	
	var message = document.getElementById("message1").value;
	var quantity= document.getElementById("quantity1").value;
	var image=document.getElementById("image1").value;
	
	if(quantity=='')
	{
		alert("Please fill in missing fields.");
		return false;
	}
	else
	{
		var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		var image1= document.getElementById("image");
		if(quantity1.innerHTML=='Invalid quantity.')
		{
			alert("Correct invalid information.");
			return false;
		}
		
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
		var name1=document.getElementById("fullName");
		var email1=document.getElementById("emailAddress");
		var add1=document.getElementById("addressLine1");
		var city1=document.getElementById("city");
		var state1=document.getElementById("state");
		var zip1=document.getElementById("postalCode");
		
		if(name1.innerHTML=='Name must be alpha characters only.'||email1.innerHTML=='Invalid email address.'||add1.innerHTML=='Invalid address.'||
		city1.innerHTML=='City must be alpha characters only.'|| state1.innerHTML=='State must be alpha characters only.'||zip1.innerHTML=='Postal code must be numeric characters only.')
		{
			alert("Correct invalid information.");
			return false;
		}
		else
		{
			alert("Success!");
			success=1;
		}
	}
	
	if (success==1)
	{
		
		document.getElementById("continue").disabled=true;
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

function delItem(cartID)
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "removeItem.php",true);
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

function getFileExt(filename)
	{
		return filename.split('.').pop();
	};



function validateImg3(field,query)
{
	var fup=document.getElementById('image1');
	var fileName=fup.value;
	var ext=fileName.substring(fileName.lastIndexOf(".")+1);
	if(ext=="jpeg"||ext=="jpg")
	{
		
		if(fup.files[0].size>4000000000)
		{
			alert("File too large.");
			fup.value="";
			return false;
		}
		else
		{
			 image = new Image();
			 var reader = new FileReader();
         //Read the contents of Image File.
    	reader.readAsDataURL(fup.files[0]);
    	reader.onload = function (e) 
    		{
       		 //Initiate the JavaScript Image object.
        		var image = new Image();
        	//Set the Base64 string return from FileReader as source.
        		image.src = e.target.result;
        		image.onload = function () 
       				 {
            			//Determine the Height and Width.
            			var height = this.height;
            			var width = this.width;
            			if (height < 1500 || width < 1200) //a 4"x5" photo @ 300 dpi=1200x1500 pixels, so it should be at least this.
           			 		{
                				alert("Height must be at least 1500px/5 inches and Width must be at least 1200px/4 inches.");
                				fup.value="";
                				return false;
            				}
            			else
           				   {
            				   alert("Uploaded image has valid Height and Width.");
              				   return true;
          				   }
        			};
   			};
	   }
	}
	else
	{
		alert("Upload jpg images only.");
		fup.focus();
		fup.value="";
		return false;
	}
};


function validateImg(field,query)
{
	var myFile = document.getElementById('image1');
	

myFile.addEventListener('change', function() 
{
  image = new Image();

  if(this.files[0].size > 4000000000) //4gb max size for long blob in DB
  //if(this.files[0].size > 1000) //4gb max size for long blob in DB
  {
        alert("File size too big. Please upload a smaller image");
        myFile.value="";
        return false;
  }
  else if(!this.files[0].name.match(/.(jpg|jpeg)$/i))
  {
  		alert("Incorrect file type. Please upload a .jpg or .jpeg image.");
  	 	myFile.value="";
        return false;
  }
  else
  {
    var reader = new FileReader();
         //Read the contents of Image File.
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (e) 
    {
        //Initiate the JavaScript Image object.
        var image = new Image();
        //Set the Base64 string return from FileReader as source.
        image.src = e.target.result;
        image.onload = function () 
        {
            //Determine the Height and Width.
            var height = this.height;
            var width = this.width;
            if (height < 1500 || width < 1200) //a 4"x5" photo @ 300 dpi=1200x1500 pixels, so it should be at least this.
            {
                alert("Height must be at least 1500px/5 inches and Width must be at least 1200px/4 inches.");
                myFile.value="";
                return false;
            }
            else
            {
               alert("Uploaded image has valid Height and Width.");
               return true;
            }
        };
    };
  }


});
};

function validateImg2(field,query)
{
	var myFile = document.getElementById('image1');
	

  image = new Image();

  if(this.files[0].size > 4000000000) //4gb max size for long blob in DB
  {
        alert("File size too big. Please upload a smaller image");
        myFile.value="";
        return false;
  }
  else if(!this.files[0].name.match(/.(jpg|jpeg)$/i))
  {
  		alert("Incorrect file type. Please upload a .jpg or .jpeg image.");
  	 	myFile.value="";
        return false;
  }
  else
  {
    var reader = new FileReader();
         //Read the contents of Image File.
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (e) 
    {
        //Initiate the JavaScript Image object.
        var image = new Image();
        //Set the Base64 string return from FileReader as source.
        image.src = e.target.result;
        image.onload = function () 
        {
            //Determine the Height and Width.
            var height = this.height;
            var width = this.width;
            if (height < 1500 || width < 1200) //a 4"x5" photo @ 300 dpi=1200x1500 pixels, so it should be at least this.
            {
                alert("Height must be at least 1500px/5 inches and Width must be at least 1200px/4 inches.");
                myFile.value="";
                return false;
            }
            else
            {
               alert("Uploaded image has valid Height and Width.");
               return true;
            }
        };
    };
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

