<?php
	session_start(); 
	require_once 'autoload.php';
	   #importing library 
	   use Facebook\FacebookSession;
	   use Facebook\FacebookRedirectLoginHelper;
	   use Facebook\FacebookRequest;
	   use Facebook\FacebookResponse;
	   use Facebook\FacebookSDKException;
	   use Facebook\FacebookRequestException;
	   use Facebook\FacebookAuthorizationException;
	   use Facebook\GraphObject;
	   use Facebook\Entities\AccessToken;
	   use Facebook\HttpClients\FacebookCurlHttpClient;
	   use Facebook\HttpClients\FacebookHttpable;

	   #inisalisasi app facebook
	   FacebookSession::setDefaultApplication('590077934511206','59459af72e488f47ef8b36ec4bd474c0');
	   $basedir=__DIR__; 
	   $helper=new FacebookRedirectLoginHelper("http://localhost:80/belajarphp/fbconfig.php");
	   try {
	      $session = $helper->getSessionFromRedirect();
	   }catch( FacebookRequestException $ex ) {
	      // When Facebook returns an error
	   }catch( Exception $ex ) {
	      // When validation fails or other local issues
	   }
   		
   		// see if we have a session
   if ( isset( $session ) ) {
      // graph api request for user data
      $request = new FacebookRequest( $session, 'GET', '/me' );
      $response = $request->execute();
      
      // get response
      $graphObject = $response->getGraphObject();
      $fbid = $graphObject->getProperty('id');           // To Get Facebook ID
      $fbfullname = $graphObject->getProperty('name');   // To Get Facebook full name
      $femail = $graphObject->getProperty('mail');      // To Get Facebook email ID
      
      /* ---- Session Variables -----*/
      $_SESSION['FBID'] = $fbid;
      $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
      
      /* ---- header location after session ----*/
      header("Location: main.php");
   }else {
      $loginUrl = $helper->getLoginUrl();
      header("Location: ".$loginUrl);
   }


?>