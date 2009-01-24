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
 * LoginController.php :: --here short description--
 * 
 * --long description--
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      FiestaKit
 * @subpackage   
 * @category     
 * @version      $Id: vimrc.local 39 2009-01-14 20:37:37Z adolfomorales $
 * 
 */

require_once("../application/models/dbConnection.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

class LoginController extends Zend_Controller_Action
{
   public function indexAction()
   {
		$title="Fiestakit.com Obten los datos y referencias de los mejores proveedores de servicios y productos para tu fiesta, evento o convenci&oacute;n, de cualquier parte de M&eacute;xico";
      $this->view->assign('title', $title);
	}
}

