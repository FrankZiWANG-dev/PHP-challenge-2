<?php
	//Logout
	// start session
	session_start ();
	
	// destroy variables session
	session_unset ();
	
	// destroy session
	session_destroy ();
	
	// redirect to home page
	header ('location: ../../../');

