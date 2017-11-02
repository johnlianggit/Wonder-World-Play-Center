<!DOCTYPE html>
<html lang="en">
   <head>
         <title>Wonder World Play Centre</title>
   </head>

<body>
<div class="scrolllimiter">
<?php
require($_SERVER['DOCUMENT_ROOT'] . "/frametop.blade.php");
?> 

<div class="container">

    <div class="jumbotron">	 
	   
      <h3> Wonder World Play Centre—Childcare & Kindergarten for Children aged 3-5 Years </h3>
	  
	  <div class="imgfl">
        <img  id="appletree" src="/img/IMGP2194.JPG" alt="Children see flower blossom to apple harvest" style="max-width:100%; opacity: 1.0;">
        <div class="descontainer" style="height: 50px;">
           Children sense apple tree blossom to ripe
        </div>
       </div>

<p><b>Wonder World Play Centre</b> is a long-day childcare centre that provides an integrated kindergarten program. 
The Centre is located in West Preston and has been under the same management since 1994.</p>




<p><b>Wonder World Play Centre</b> provides a natural and nurturing environment for children. 
The Centre meets all new National Quality Standards (NQS). In fact, our programmes, environment and educators’ 
relationship with children exceed NQS ratings.</p>
<p><b>Wonder World Play Centre</b> is a small children’s service and is able provide a home-like environment for 22 
children on a daily basis.</p>
</br>
<h3>Childcare & Kindergarten Educators</h3>
<p>Our teachers and educators are experienced and caring. Teachers hold kindergarten teaching qualifications—a 
4-year bachelor degree or equivalent. Other educators hold a Certificate III in Child Services. Our current 
teachers and educators speak Chinese (Mandarin), Hindi and Vietnamese.</p>
<h3>Multicultural Environment</h3>
<p><b>Wonder World play Centre</b> provides an inclusive environment for the local community and welcomes all children 
and families.</p>

<h3>Nature-rich Environment</h3>
<p><b>Wonder World Play Centre</b> has created a very green environment for children. Over the last 15 years 
the management, parents, educators and children have planted many trees and other plants so that children can 
explore and discover in a nature-rich environment. Our environment provides habitat for birds and small creatures 
and we have chickens and turtles as pets.</p>
<!-- FORM STARTS HERE -->

                   
                   <form method="POST" action="/" novalidate>
				   
				       <input type="checkbox" name="Yes" value="Yes">&nbsp Yes, I am interested in enrolling my child/children
				       </br></br>
                      <div class="form-group @if ($errors->has('name')) has-error @endif">
                         <label for="name"><span class="inputtips">Your Name (required)</span></label>
                         <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{ Input::old('name') }}"">
				          @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                      </div>

                      <div class="form-group @if ($errors->has('email')) has-error @endif">
                         <label for="email"><span class="inputtips">Your Email (required)</span></label>
                         <input type="email" id="email" class="form-control" name="email" placeholder="" value="{{ Input::old('email') }}">
				          @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                      </div>

                      <div class="form-group @if ($errors->has('phone')) has-error @endif">
                         <label for="phone"><span class="inputtips">Phone Number (required)</span></label>
                         <input type="text" id="phone" class="form-control" name="phone">
				          @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                      </div>
					  
					  <div class="form-group @if ($errors->has('name1')) has-error @endif">
                         <label for="name1"><span class="inputtips">Child's Name 1</span></label>
                         <input type="text" id="name1" class="form-control" name="name1">
				          @if ($errors->has('name1')) <p class="help-block">{{ $errors->first('name1') }}</p> @endif
                      </div>
                      <div class="form-group @if ($errors->has('date1')) has-error @endif">
                         <label for="date1"><span class="inputtips">Child's Date Of Birth 1</span></label>
                         <input type="text" id="date1" class="form-control" name="date1">
				          @if ($errors->has('date1')) <p class="help-block">{{ $errors->first('date1') }}</p> @endif
                      </div>					  
                      <div class="form-group @if ($errors->has('name2')) has-error @endif">
                         <label for="name2"><span class="inputtips">Child's Name 2</span></label>
                         <input type="text" id="name2" class="form-control" name="name2">
				          @if ($errors->has('name2')) <p class="help-block">{{ $errors->first('name2') }}</p> @endif
                      </div>
                      <div class="form-group @if ($errors->has('date2')) has-error @endif">
                         <label for="date2"><span class="inputtips">Child's Date Of Birth 2</span></label>
                         <input type="text" id="date2" class="form-control" name="date2">
				          @if ($errors->has('date2')) <p class="help-block">{{ $errors->first('date2') }}</p> @endif
                      </div>	
					  
                      <div class="form-group @if ($errors->has('Message')) has-error @endif">
                         <label for="Message"><span class="inputtips">Your Message</span></label>
                       <!--  <input type="password" id="password_confirm" class="form-control" name="password_confirm">-->
						 
						   <textarea name="message" rows="8" cols="50"></textarea>
						 
				         @if ($errors->has('Message')) <p class="help-block">{{ $errors->first('Message') }}</p> @endif
                      </div>

                     <button type="submit" class="btn btn-success" style="background-color: #f9d2f9; color: purple;font-size: 25px;">Send</button>

                   </form>

           
   	</div>
	
	 
	 
</div>  <!-- /.container -->
  <img src="/img/footer.jpg" alt="footer" class="footer">
</div>

</body>
</html>