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
 * bootstrap.php :: bootstrap for the front controller
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
// Setup of php.ini
error_reporting(E_ALL); 
ini_set("display_startup_errors", "OFF");
ini_set("display_errors","ON");
ini_set("log_errors","ON");
ini_set("error_log","../logs/worktogether.log");
ini_set("use_only_cookies","ON");
ini_set("session.auto_start", "ON");
ini_set("session.name","WTSESS");
ini_set("session.save_path","../logs/sessions");

// bibliotecas
set_include_path("../library" . PATH_SEPARATOR . get_include_path());  

// controladores, modelos y vistas
require_once("Zend/Loader.php"); 
Zend_Loader::registerAutoload(); 
set_include_path("../application" . PATH_SEPARATOR . get_include_path());  

// save info
require_once("../project/encrypt-it.php");
require_once("../application/models/dbConnection.php");

//
// GO !
$registry = Zend_Registry::getInstance();

if( !isset($registry->config) )
{
   // configuracion
   $config = new Zend_Config_Ini("../application/config.ini", "development_env");
   Zend_Registry::set('config', $config);
   
   // sesion
   $session = new Zend_Session_Namespace("wtSession");
   $session->initialized = true;

}

if( !isset($session->initialized) )
{
   Zend_Session::regenerateId();
   $session->initialized = true;
}

// pasar parámetros de configuración
$appLayout->config = $config;

// establecer sesion con la DB
$dbConnection = new dbConnection($config->db);

// layout principal
Zend_Layout::startMvc(array("layoutPath" => "../application/views/layouts", "layout" => "mainlayout"));
$appLayout = Zend_Layout::getMvcInstance();

$fController = Zend_Controller_Front::getInstance(); 
$fController->setControllerDirectory("../application/controllers");

unset($fController);

