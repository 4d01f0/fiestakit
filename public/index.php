<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * FiestaKit :: Página para promocionar todo lo necesario para fiestas 
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      FiestaKit
 * @copyright    Copyright 2009 MashedCode Co.	
 * @filesource   
 * 
 */

//
//	requires
/**
 * index.php :: The index of the fiestakit site 
 * 
 * --long description--
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      FiestaKit
 * @subpackage   
 * @category     
 * @version      $Id: vimrc.local 39 2008-05-10 06:44:21Z andresaquino $
 * 
 */

//
//	MAIN
// Step 1: Set a flag indicating setup is necessary
$bootstrap = true;

// Step 3: Perform application-specific setup
// This allows you to setup the MVC environment to utilize. Later you can re-use this file for testing your applications
try {
   require_once("../application/bootstrap.php");
} catch (Exception $e){ 
   echo("An exception occured while bootstrapping the application.");
   echo("<br /><br />" . $e->getMessage() . "<br />"
         . "<div align='left'>Stack Trace:"
         . "<pre>" . $e->getTraceAsString() . "</pre></div>");

   exit(1);
}

// Step 4:  Dispatch the request using the front controller.
// The front controller is a singleton, and should be setup by now. We will grab
// an instance and dispatch it, which dispatches your application.
Zend_Controller_Front::getInstance()->dispatch();


