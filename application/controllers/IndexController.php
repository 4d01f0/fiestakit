<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * $SYSNAME :: $SYSDESCRIPTION 
 * 
 * @author       Adolfo Morales  <adolfom@expansion.com.mx> 
 * @package      $SYSNAME
 * @copyright    Copyright 2008 Grupo Editorial Expansion	
 * @filesource   
 * 
 */

//
//	requires
/**
 * IndexController.php :: --here short description--
 * 
 * --long description--
 * 
 * @author       Adolfo Morales  <adolfom@expansion.com.mx> 
 * @package      $SYSNAME
 * @subpackage   
 * @category     
 * @version      $Id: vimrc.local 39 2008-05-10 06:44:21Z andresaquino $
 * 
 */
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', '1');

#Zend::LoadClass('Zend_View');
class IndexController extends Zend_Controller_Action
{
   public function indexAction()
   {
      #$this->view->assign('title', 'Hello World!');
      $this->view->title='Hello World2!';
      $music = array('title'=>'The End of the Line','artist'=>'Metallica');

		$sql = "SELECT estado_id, estado_nombre, estado_nombre as estado_url, now() as dateUpdated FROM estado "; 
		$result = $db->query($sql); 

		#$select = new Zend_Db_Select($db);                    #1 
		#$select->from('estado'); 
		#$select->where('1 = ?', '1'); 
		#$result = $select->query();     

   }


}

?>
