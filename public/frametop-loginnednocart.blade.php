<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
     <!-- The delightful bus company icon-->
     <link rel="icon" href="/img/cartoon_bus.gif">
	 <!-- Bootstrap core CSS -->
	 <link href="<?php echo asset('css/bootstrap.css')?>"  rel="stylesheet"> 
     <!-- Custom styles for this template -->
     <link href="<?php echo asset('css/starter-template.css')?>" rel="stylesheet">
	 <link href="<?php echo asset('css/grid.css')?>" rel="stylesheet">
	 <link href="<?php echo asset('/css/override-navbar-brand.css')?>" rel="stylesheet">	
	 
    <script src="<?php echo asset('css/jquery.js')?>"></script>
    <script src="<?php echo asset('css/bootstrap.js')?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo asset('css/ie10-viewport-bug-workaround.js')?>"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
		 <!--class="navbar-toggle collapsed"-->
         <button class="navbar-toggle collapsed" type="button"  data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			<span class="icon-bar"></span>
		 </button>		
		          <div>
                     <img class="navbar-brand" alt="Brand" src="/img/cartoon_bus.gif">				   
				  </div>        	  
	    </div>
		
		<div id="navbar" class="collapse navbar-collapse">
           <ol class="nav navbar-nav">
            <li><a href="/index.php/booking"> <span id="menucolor">Booking</span></a></li>			
            <li><a href="/index.php/payment"><span id="menucolor">Payment</span></a></li>
            <li><a href="/index.php/logout"><span id="menucolor">Logout</span></a></li>		   
           </ol>
        </div><!--/.nav-collapse -->
	</div>
</nav>
</body>
</html>