function validate() 
{
	var email = document.getElementById('email').value; 
	
	if (email == "") 
	{
		return false; 
	}
	
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
		return false; 
	}
	
	this.form.submit();  
}

//Function To Display Popup
function show() 
{
	document.getElementById('PUwindow').style.display = "block";
}

//Function to Hide Popup
function hide()
{
	document.getElementById('PUwindow').style.display = "none";
}
	
	
	
	
	
		//twitter drop down
	$(document).ready(function()
	{
	    $("#Twitflip").click(function()
	    {
	        $("#twitTmln").slideToggle("slow");
	    });
	});
	
	
	//facebook drop down
	$(document).ready(function()
	{
	    $("#FBflip").click(function()
	    {
	        $("#FBTmln").slideToggle("slow");
	    });
	});
	
	//email drop down
	$(document).ready(function()
	{
	    $("#emailflip").click(function()
	    {
	        $("#subForm").slideToggle("slow");
	    });
	});
	
