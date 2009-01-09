<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * pawaman :: Password Administration and Management 
 * 
 * @author       Andres Aquino  <cesar.aquino@nextel.com.mx> 
 * @package      pawaman
 * @copyright    Copyright 2008 NEXTEL DE MEXICO	
 * @filesource   
 * 
 */

/**
 * bootstrap.php :: --here short description--
 * 
 * --long description--
 * 
 * @author       Andres Aquino  <cesar.aquino@nextel.com.mx> 
 * @package      pawaman
 * @subpackage   
 * @category     
 * @version      $Id: bootstrap.php 8 2008-09-24 08:32:32Z andres.aquino $
 * 
 */

/**
 * Enviroment para PHP (/etc/php/apache2/php.ini)
 *
 */
#error_reporting(E_ALL | E_STRICT);  
error_reporting(E_ALL | E_STRICT);  
ini_set("display_startup_errors", "ON");  
ini_set("display_errors", "ON"); 
ini_set("session.auto_start", "OFF");
ini_set("session.name","OMSESS");
 
/**
 * checar enviroment e instanciar los objetos necesarios
 *
 */
if (isset($bootstrap) && $bootstrap) { 
    // Add our {{library}} directory to the include path so that PHP can find the Zend Framework classes. 
    set_include_path("../library" . PATH_SEPARATOR . get_include_path());  
 
    // Set up autoload. 
    require_once("Zend/Loader.php"); 
    Zend_Loader::registerAutoload(); 
    set_include_path("../application" . PATH_SEPARATOR . get_include_path());  
} 

/**
 * Instanciar el front controller para soportar las peticiones
 *
 */
$fController = Zend_Controller_Front::getInstance(); 


/**
 * Indicar donde se encuentran los controladores
 *
 */
$fController->setControllerDirectory("../application/controllers"); 
Zend_Layout::startMvc(array("layoutPath" => "../application/views/layouts", "layout" => "nextel"));
//Zend_Layout::startMvc(array("layoutPath" => "../application/views/layouts", "layout" => "default"));


/** 
 * Cargar configuracion
 *
 */
$enviroment = "development";
$config = new Zend_Config_Ini("../application/config.ini", $enviroment);
$fController->setParam("env", $enviroment);
$fController->setParam("config", $config);
Zend_Session::start();
$session = new Zend_Session_Namespace($enviroment);


/** 
 * Registrar DB
 *
 */
try {
   $db = Zend_Db::factory($config->db);
   $db->getConnection();
   $db->setFetchMode(Zend_Db::FETCH_OBJ);
   Zend_Db_Table::setDefaultAdapter($db);
} catch (Zend_Db_Adapter_Exception $e) {
   // perhaps a failed login credential, or perhaps the RDBMS is not running
} catch (Zend_Exception $e) {
   // perhaps factory() failed to load the specified Adapter class
}


?>
