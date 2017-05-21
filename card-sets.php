<!DOCTYPE html>
<html lang="en">
<head>
	<script>
function showPics(str) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } 
  else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getpics.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>

<header>
	<div class="header">
		<img src="images/logo.png" id="logo" alt="sporting life logo">
	</div>		
</header>

<nav>
	
</nav>

<body>
	<aside>
		<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "M3g4nM4ys17";
 $db = "sportinglife";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
/*query*/
 $query = "SELECT * FROM series";
 $result = mysqli_query($conn, $query);
 
 $numRows = mysqli_num_rows($result);
  
 for($i=0; $i < $numRows; $i++)
 {
 	  $row = mysqli_fetch_array($result);
	  ?>
		<input type="button" value="<?php echo $row['seriesName'];?>" onclick="showPics(this.value)"><br>

	  <?php	  
 } ?>
 
 
 	</aside>

	<article>

		<div id="txtHint"><b>Person info will be listed here.</b></div>

	</article>

</body>

<footer>
	
</footer>
</html>