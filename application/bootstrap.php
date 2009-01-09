<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * FiestaKit :: Página para promocionar todo lo necesario para fiestas 
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      FiestaKit
 * @copyright    Copyright 2008 Grupo Editorial Expansion	
 * @filesource   
 * 
 */

//
//	requires
/**
 * bootstrap.php :: --here short description--
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

// Step 1: APPLICATION CONSTANTS - Set the constants to use in this application.
// These constants are accessible throughout the application, even in ini 
// files. We optionally set APPLICATION_PATH here in case our entry point 
// isn't index.php (e.g., if required from our test suite or a script).
defined('APPLICATION_PATH')
or define('APPLICATION_PATH', dirname(__FILE__));

defined('APPLICATION_ENVIRONMENT')
or define('APPLICATION_ENVIRONMENT', 'development');

// Step 2: FRONT CONTROLLER - Get the front controller.
// The Zend_Front_Controller class implements the Singleton pattern, which is a
// design pattern used to ensure there is only one instance of
// Zend_Front_Controller created on each request.
$frontController = Zend_Controller_Front::getInstance();

// Step 3: CONTROLLER DIRECTORY SETUP - Point the front controller to your action
// controller directory.
$frontController->setControllerDirectory(APPLICATION_PATH . '/controllers');

// Step 4: APPLICATION ENVIRONMENT - Set the current environment.
// Set a variable in the front controller indicating the current environment --
// commonly one of development, staging, testing, production, but wholly
// dependent on your organization's and/or site's needs.
$frontController->setParam('env', APPLICATION_ENVIRONMENT);

// Step 5: CLEANUP - Remove items from global scope.
// This will clear all our local boostrap variables from the global scope of 
// this script (and any scripts that called bootstrap).  This will enforce 
// object retrieval through the applications's registry.
# unset($frontController);

// ***********  LAYOUT SETUP - Setup the layout component
// The Zend_Layout component implements a composite (or two-step-view) pattern
// With this call we are telling the component where to find the layouts scripts.
Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/scripts');

// VIEW SETUP - Initialize properties of the view object
// The Zend_View component is used for rendering views. Here, we grab a "global" 
// view instance from the layout object, and specify the doctype we wish to 
// use. In this case, XHTML1 Strict.
$view = Zend_Layout::getMvcInstance()->getView();
$view->doctype('XHTML1_STRICT');

/** 
 * Cargar configuracion
 *
 */
$enviroment = "production";
#$config = new Zend_Config_Ini("../application/config.ini", $enviroment);
$config = new Zend_Config_Ini(require "../application/config.ini");
#echo $config->webhost;

#$frontController->setParam("env", $enviroment);
#$frontController->setParam("config", $config);
#Zend_Session::start();
#$session = new Zend_Session_Namespace($enviroment);


/** 
 * Registrar DB
 *
 */
try {
   #$db = Zend_Db::factory($config->db);
	$config = new Zend_Config(
		array(
			'database' => array(
				'adapter' => 'Mysqli',
				'params' => array(
					'dbname' => 'fiestakit',
					'username' => 'fiestakit',
					'password' => 'f13st4k1t',
				)
			)
		)
	);

	$db = Zend_Db::factory($config->database);
   $db->getConnection();
   $db->setFetchMode(Zend_Db::FETCH_OBJ);
   Zend_Db_Table::setDefaultAdapter($db);
} catch (Zend_Db_Adapter_Exception $e) {
   // perhaps a failed login credential, or perhaps the RDBMS is not running
} catch (Zend_Exception $e) {
   // perhaps factory() failed to load the specified Adapter class
}

// CLEANUP - remove items from global scope
// This will clear all our local boostrap variables from the global scope of 
// this script (and any scripts that called bootstrap). This will enforce 
// object retrieval through the applications's registry.
unset($frontController, $view);

?>
