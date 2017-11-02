<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function Validate()
	{
    // process the form here
    // create custom validation messages ------------------
    $messages = array(
        'required' => 'Your :attribute is required.'
         );
		
    // do the validation ----------------------------------
    // validate against the inputs from our form   
       $validator = Validator::make(Input::all(), enquiry::$rules, $messages);
    // check if the validator failed -----------------------
       if ($validator->fails()) {
                     // get the error messages from the validator
                     $messages = $validator->messages();
		             // redirect our user back to the form with the errors from the validator
                     return Redirect::to('/')
                            ->withErrors($validator)
                            ->withInput(Input::except('password', 'password_confirm'));
                                }
	   else {
        /* validation successful ---------------------------
           $enquiry = new enquiry;
	       $enquiry->email    = Input::get('email');
           $enquiry->name     = Input::get('name');
		   $enquiry->phone     = Input::get('phone');
		   $enquiry->cname1     = Input::get('name1');
		   $enquiry->cdate1     = Input::get('date1');
		   $enquiry->cname2     = Input::get('name2');
		   $enquiry->cdate2     = Input::get('date2');
		   $enquiry->message     = Input::get('message');
		  
        // save enuiry info
           $enquiry->save();*/
		   
		//send email with the enquiry info to John
		 Mail::send('emails.enquiry', array('name'=>Input::get('name'),'email'=>Input::get('email'),
		 'phone'=>Input::get('phone'),'name1'=>Input::get('name1'),'date1'=>Input::get('date1'),
		 'name2'=>Input::get('name2'),'date2'=>Input::get('date2'),'message1'=>Input::get('message')), function($message){$message->to('gwa20094@optusnet.com.au', 'Jasmine')->subject('Customer enquiry');});

        // Redirect to contact page.
           return Redirect::to('index.php/enquirysent');
		    }
	}
	
	public function showLogin()
{
    // show the form
    return View::make('login');
}

public function doLogin()
{
	    $data = Input::all();

    if(isset($data['login'])){//The login button is clicked.
// process the form// validate the info, create rules for the inputs
$rules = array(
    'email'    => 'required|email', // make sure the email is an actual email 
    'password' => 'required|min:6'
   );

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

    // create our user data for the authentication
	
    $userdata = array(
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
		
    );

    // attempt to do the login, attempt checks only the hashed password.
    if (Auth::attempt($userdata)) {

           // validation successful! Show booking page.
       
		   //create the trips eloquent object for db operations
           $trips = new trips;
           //get all the trip info by using the trip model
           $alltrip = trips::all(); 
		   //Store email to session variable
		   Session::put('email', Input::get('email'));
		   //Create an empty session array
		   $cart = array();
		   Session::put('scart', $cart);
		   //Create an empty cart
		      Session::put('CartTrip', 0);
			  Session::put('CartPeople', 0);
			  Session::put('CartTotal', 0);
          //pass all the trip info to view
           return View::make('booking')->with('alltrips',$alltrip);

    } else {        

        // validation not successful, send back to login and tell customer that the email and the password does not match
		

        return Redirect::to('login')
		->withErrors(array('email' => 'The email address does not match with the password.'))
        ->withInput(Input::except('password'));

    }

}
}

    if(isset($data['forgetpw'])){//Forget password link is clicked
        //handle forget password process
	$rules = array(
    'email'    => 'required|email', // make sure the email is an actual email
   );

// Is the input an email address?
$validator = Validator::make(Input::all(), $rules);

// No, it is not.
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password)
} else {

    // Yes, it is.  Is it in the customers database?

  if (customers::where('email', '=', Input::get('email'))->count()==1)
     {//yes, it is. Send reminder email to help the customer with the password reset.
 
      	switch ($response = Password::remind(Input::only('email'),function($message) {
			//Give the reminder email a subject
			$message->subject('Delightful Bus Login Password Reset');
			}))
		{
			
			case Password::REMINDER_SENT:
				{ 
				return Redirect::to('login')//Tell the customer that the helping email is sent.
                       ->withErrors(array('password' => 'An email with the password reset instructions has been sent to you.')) // send back remind info to the login form
                       ->withInput(Input::except('password'));
				}
		}
	
	  
	  }
  else
        {
			
			//The input email is not in the database.
			return Redirect::to('login')
                   ->withErrors(array('email' => 'The registered email address is required.')) 
                   ->withInput(Input::except('password'));
		}
       }
    }
}


public function doLogout()
{
	//Removing All Items From The Session
	Session::flush();
    Auth::logout(); // log the user out of our application
    return Redirect::to('login'); // redirect the user to the login screen
}

public function booking()
{
   //create the trips eloquent object for db operations
   $trips = new trips;
   //get all the trip info by using the trip model
   $alltrip = trips::all(); 
   //pass all the trip info to view
  return View::make('booking')->with('alltrips',$alltrip);
}

public function AddToList()
{
	 
	//retrieve the length of the session array
	$arrlength = count(Session::get('scart'));	
	//pass the session array to a temp variable
	$temp=Session::get('scart');
	$exist=0;//the selected trip name is not in the session array
	 for ($row = 0; $row <$arrlength; $row++) {
         if(Session::get('scart')[$row][0]==Input::get('tripname'))
		 {$exist=1;  $match=$row;}//the input trip name is in the session array
   }
	
	if($exist==0){
	//add one row of value to the bottom of the temp array
	$temp[$arrlength][0]=Input::get('tripname');
	$temp[$arrlength][1]=Input::get('price');
	$temp[$arrlength][2]=Input::get('time');
	$temp[$arrlength][3]=Input::get('number');
	}
	else {//only update the number of people for the trip already in the cart
		$temp[$match][3]=$temp[$match][3]+Input::get('number');
		
	}
	//save the changes back to the session array
	Session::put('scart', $temp);
    //The length of the session array could be changed, retrieve it
	$arrlength = count(Session::get('scart'));
   // Statistic
   $TotalPeople=0;
   $TotalCost=0;
   for ($row = 0; $row <$arrlength; $row++) {
       $TotalPeople=$TotalPeople+Session::get('scart')[$row][3];
	   $TotalCost=$TotalCost+(Session::get('scart')[$row][1]*Session::get('scart')[$row][3]);
  
   }
    //Update the cart
    Session::put('CartTrip',$arrlength);
	Session::put('CartPeople',$TotalPeople);
	Session::put('CartTotal',$TotalCost);
    //create the trips eloquent object for db operations
    $trips = new trips;
    //get all the trip info by using the trip model
    $alltrip = trips::all(); 	
    //pass all the trip info to view
    return View::make('booking')->with('alltrips',$alltrip);	
}

public function details()
{   //back to booking when the cart is empty
	if(Session::get('CartTotal')==0)
	{
		    //create the trips eloquent object for db operations
            $trips = new trips;
            //get all the trip info by using the trip model
            $alltrip = trips::all(); 	
            //pass all the trip info to view
            return View::make('booking')->with('alltrips',$alltrip);
	}
	else
         return View::make('details');
}
public function Delete()
{
	$array=Session::get('scart');
	//Update the cart before deletion
	$TotalPeople=Session::get('CartPeople')-$array[Input::get('TripDelete')][3];
	$TotalCost=Session::get('CartTotal')-$array[Input::get('TripDelete')][1]*$array[Input::get('TripDelete')][3];
	$UpdatedTrip=Session::get('CartTrip')-1;
    Session::put('CartTrip',$UpdatedTrip);	
	Session::put('CartPeople',$TotalPeople);
	Session::put('CartTotal',$TotalCost);
	//Delete the selected trip and re-order the array
	unset($array[Input::get('TripDelete')]);
    $array = array_values($array);
	//save the changes back to the session array
	Session::put('scart', $array);
	//Direct to booking when cart empty
	if(Session::get('CartTotal')==0)
	 {
		   //create the trips eloquent object for db operations
           $trips = new trips;
           //get all the trip info by using the trip model
           $alltrip = trips::all(); 	
           //pass all the trip info to view
           return View::make('booking')->with('alltrips',$alltrip);
	 }	 
    else//back to details if cart is not empty
	 {
		return View::make('details'); 
	 }
    
}
public function Update()
{
    $array=Session::get('scart');
	//When 0 is the input for updating, delete this booking
	if(Input::get('number')==0)
	{
	return $this->Delete(); 	
	}
	else
	{
	//Update the number of people
	$array[Input::get('TripUpdate')][3]=Input::get('number');
	//save the changes back to the session array
	Session::put('scart', $array);
	//Re-caculate
    $arrlength = count(Session::get('scart')); 
    $TotalPeople=0;
    $TotalCost=0;
    for ($row = 0; $row <$arrlength; $row++) {
         $TotalPeople=$TotalPeople+Session::get('scart')[$row][3];
	     $TotalCost=$TotalCost+(Session::get('scart')[$row][1]*Session::get('scart')[$row][3]);
    }
	//Update the cart	
	Session::put('CartPeople',$TotalPeople);
	Session::put('CartTotal',$TotalCost);
	//back to details
	return View::make('details'); 
	}
}
public function ConfirmBooking()
{
        
		  $arrlength = count(Session::get('scart'));
		  for ($row = 0; $row <$arrlength; $row++) {
			   $booking = new bookings;
	           $booking->email= Session::get('email');
               $booking->tripname = Session::get('scart')[$row][0];
		       $booking->quantity = Session::get('scart')[$row][3];
              // $booking->paymentdate = "0000-00-00 00:00:00";				   
               // save booking to database
               $booking->save();
		  }
		  //Empty the cart and the session array
	      Session::put('CartTrip',0);	  
          Session::put('CartPeople',0);
	      Session::put('CartTotal',0);
	      $cart = array();
		  Session::put('scart', $cart);
          // go for payment after booking
           return Redirect::to('payment');
}

public function payment()
{
	 //unpaid booking exists?
	 if (bookings::where('email', '=', Session::get('email'))->where('paymentdate', '=', null)->count()!=0)
     {
	 //yes, go for payment
		  return View::make('payment');
	 } 
	 else 
	 {
		 //no unpaid booking
		 return View::make('nounpaidbooking');
	 }
}
public function paynow()
{
	//input is correct?
	if(Input::get('name')==null)
	{
		//no, back to the payment view with error message
		 return Redirect::to('payment')
		->withErrors(array('name' => 'Please input the name on your credit card.'));
		
	}
	else 
	{
		 //yes, save input to payment table
		 $payment = new payments;		 
		 $payment->email=Session::get('email');
		 $payment->cardname=Input::get('name');
		 $payment->cardnumber=Input::get('cardnumber');
		 $payment->amount=Input::get('amount');
		 $payment->save();
		 //get the payment date
		 $paymentdate=payments::select('created_at')->max('created_at');
		 //update the payment date in booking table
		 bookings::where('email', '=', Session::get('email'))->where('paymentdate', '=', null)->update(array('paymentdate' => payments::select('created_at')->max('created_at')));		 
		 //booking details
		 $bookingdetails=bookings::where('email', '=', Session::get('email'))->where('paymentdate', '=', $paymentdate)  ->join('trips', 'trips.tripname', '=', 'bookings.tripname')->get();		 
         //send email with the booking and payment info to customer
		 Mail::send('emails.afterpayment', array('bookingdetails'=>$bookingdetails,'name'=>Input::get('name'),'cardname'=>$payment->cardname,'amount'=>number_format($payment->amount),'paymentdate'=>$paymentdate), function($message){$message->to(Session::get('email'), Input::get('name'))->subject('Thanks for your payment!');});
         //Thanks for making payment
		 return View::make('thanksforpayment');
	}
	 
}
}
