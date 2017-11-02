<?php


class enquiry extends Eloquent 
{ 
    protected $fillable = array('name','email','phone','cname1','cdate1','cname2','cdate2','message');
	
    // create the validation rules ------------------------
    public static $rules = array(
        'email'            => 'required|email', // required and must be in email format
		'name'             => 'required',      // just a normal required validation
        'phone'             => 'required',  
    );
}

