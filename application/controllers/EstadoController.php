<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * workTogether :: workTogether CRM Customer Resources Management 
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      workTogether
 * @copyright    Copyright 2009 MashedCode Co.	
 * @filesource   
 * 
 */

//
//	requires
/**
 * EstadoController.php :: --here short description--
 * 
 * --long description--
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      workTogether
 * @subpackage   
 * @category     
 * @version      $Id: vimrc.local 39 2008-05-10 06:44:21Z andresaquino $
 * 
 */

require_once("../application/models/dbConnection.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

#Zend::LoadClass('Zend_View');
class EstadoController extends Zend_Controller_Action
{

   public function indexAction()
   {
		$dbConn = Zend_Registry::get("dbConn");
		//echo("<pre>".print_r($dbConn)."</pre>");
		$query = $dbConn->fetchAll("select estado, estado_id from estado");
		//echo("<pre>".print_r($query)."</pre>");
		
		$combo = "";
		foreach ($query as $row)
		{
			$combo .= '<option value="' . $row->estado_id . '">' . $row->estado. '</option>';
		}
      $this->view->assign('c_estados', $combo);

		reset($query);
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li style="float:left"><a href="/estado/' . $row->estado_id . '">' . $row->estado. '</a></li>';
		} 
      $this->view->assign('l_estados', $lista);

   }


}




?>
