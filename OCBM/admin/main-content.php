
<!DOCTYPE html>
<html>

<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<style>

.mySlides {display:none;}
.w3-center{
  text-align:center;
  color:blue;
}
.mySlides{
  margin-left:40%;
  margin-top:5%;
  /* background-size:cover; */
  width:150%;
  height:100%
  justify-content:center;
}
</style>
</head>

<body>

<h2 class="w3-center">Best Car Dealer In Your Town</h2>
<h3 style="color:brown; text-align:center">Now You can buy Your Dream Car</h3>

<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="../admin/image/bg1.jpg">
  <img class="mySlides" src="../admin/image/bg2.jpg">
  <img class="mySlides" src="../admin/image/bg3.jpg">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
	  
			  
			  
		
			  
		



			 