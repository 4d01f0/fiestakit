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

//require_once("../application/models/EstadoModel.php");
require_once("../application/models/dbConnection.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

#Zend::LoadClass('Zend_View');
class IndexController extends Zend_Controller_Action
{
	public function testAction()
	{
	}

   public function indexAction()
   {
		$dbConn = Zend_Registry::get("dbConn");
		//echo("<pre>".print_r($dbConn)."</pre>");
		$query = $dbConn->fetchAll("select estado_nombre, estado_id from estado");
		//echo("<pre>".print_r($query)."</pre>");
		//echo string($query[0]);
		
		echo '<h1>All articles with default sort order</h1>';
		#reset($query);

		/*
		$a = array(1, 2, 3, 17); 
		foreach($query[0] as $v) { 
			print "Valor actual de \$a: $v.\n"; 
		} 
		 */

		$i=0;

		//echo("<pre>".print_r($query)."</pre>");

		$combo = "";

		foreach ($query as $row)
		{
			$combo .= '<option value="' . $row->estado_id . '">' . $row->estado_nombre . '</option>';
			//echo 'Estado#' . $row->estado_nombre . '<br />';
			//echo 'Id#' . $row->estado_id . '<br />';
		}
      $this->view->assign('c_estados', $combo);

		//echo("<pre>".print_r($query)."</pre>");
		//while( list( , $row ) = each( $query ) ) { 
		//	echo $row->estado_nombre;
		//} 

		/*
		foreach ($query as $row)
		{
				echo 'Article #' . $row['estado_id'] . '<br />';
		}
		echo '<hr />';
		 */
		/* foreach ejemplo 1: sólo valor*/ 


      $this->view->assign('title', 'Hello World!');

   }


}

?>
