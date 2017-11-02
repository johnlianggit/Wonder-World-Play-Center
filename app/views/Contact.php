<!DOCTYPE html>
<html lang="en">
   <head>
         <title>Contact</title>
   </head>

<body>
<div class="scrolllimiter">
<?php
require($_SERVER['DOCUMENT_ROOT'] . "/frametop.blade.php");
?> 

<div class="container">

    <div class="jumbotron">
	
	<div id="map" class="imgfl" style="max-width:100%;height:360px; margin-top: 30px; margin-bottom: 15px;"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(-37.738152,144.992967);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCewCZ7FH4CJNYRgpz35Etd04_mhvJmVs&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
</br>
      <p><b> Wonder World Play Centre </b>is located in a unique place, far away from traffic hazards. We have plenty parking spaces 
	   at the premise.</p>

<p><b>Address: </p></b>
<p>at end of Ford Street</p>
<p>Preston VIC 3072</p>
<p><b>Phone:</b> 03 94784433</p>
<p><b>Fax:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 03 94011051</p>

<p><b>Email:&nbsp</b><a class="smallfont" href="mailto:gwa20094@optusnet.com.au?Subject=Hello%20Wonder" target="_top">gwa20094@optusnet.com.au</a></p>

   	</div>
	
	 
	 
</div>  <!-- /.container -->
  <img src="/img/footer.jpg" alt="footer" class="footer">

</div>

</body>
</html>