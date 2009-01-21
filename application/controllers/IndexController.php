<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * $SYSNAME :: $SYSDESCRIPTION 
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      Fiestakit
 * @copyright    Copyright 2009 MashedCode Co.	
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
		$title="FiestaKit - La mejor opci&oacute;n para tu fuesta";
      $this->view->assign('title', $title);

		$dbConn = Zend_Registry::get("dbConn");
		//echo("<pre>".print_r($dbConn)."</pre>");
		$query = $dbConn->fetchAll("select estado, estado_id from estado");
		//echo("<pre>".print_r($query)."</pre>");
		
		#Construimos combo para los estados
		$combo = "";
		foreach ($query as $row)
		{
			$combo .= '<option value="' . $row->estado_id . '">' . $row->estado . '</option>';
		}
      $this->view->assign('c_estados', $combo);

		#Se genera barra izquierda de estados usando el query anterior
		reset($query);
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li style="float:left"><a href="/estado/' . $row->estado_id . '">' . $row->estado . '</a></li>';
		} 
      $this->view->assign('l_estados', $lista);

		#Se crea lista de categorias de A->B
		$query= $dbConn->fetchAll("SELECT categoria_nombre, categoria_id FROM categoria WHERE categoria_nombre RLIKE '^[a-b]' ORDER BY categoria_nombre");
		//echo("<pre>".print_r($query)."</pre>");
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li><a href="/categoria/' . $row->categoria_id . '">' . $row->categoria_nombre . '</a></li>';
		} 
      $this->view->assign('categoria_ab', $lista);

		#Se crea lista de categorias de C->F
		$query= $dbConn->fetchAll("SELECT categoria_nombre, categoria_id FROM categoria WHERE categoria_nombre RLIKE '^[c-f]' ORDER BY categoria_nombre ");
		//echo("<pre>".print_r($query)."</pre>");
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li><a href="/categoria/' . $row->categoria_id . '">' . $row->categoria_nombre . '</a></li>';
		} 
      $this->view->assign('categoria_cf', $lista);

		#Se crea lista de categorias de G->M
		$query= $dbConn->fetchAll("SELECT categoria_nombre, categoria_id FROM categoria WHERE categoria_nombre RLIKE '^[g-m]' ORDER BY categoria_nombre ");
		//echo("<pre>".print_r($query)."</pre>");
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li><a href="/categoria/' . $row->categoria_id . '">' . $row->categoria_nombre . '</a></li>';
		} 
      $this->view->assign('categoria_gm', $lista);

		#Se crea lista de categorias de N->Z
		$query= $dbConn->fetchAll("SELECT categoria_nombre, categoria_id FROM categoria WHERE categoria_nombre RLIKE '^[n-z]' ORDER BY categoria_nombre ");
		//echo("<pre>".print_r($query)."</pre>");
		$lista = "";
		while( list( , $row ) = each( $query ) ) { 
			$lista .= '<li><a href="/categoria/' . $row->categoria_id . '">' . $row->categoria_nombre . '</a></li>';
		} 
      $this->view->assign('categoria_nz', $lista);

		#Se crea combo de categorias de N->Z
		$query= $dbConn->fetchAll("SELECT categoria_nombre, categoria_id FROM categoria ORDER BY categoria_nombre ");
		//echo("<pre>".print_r($query)."</pre>");
		$combo = "";
		while( list( , $row ) = each( $query ) ) { 
			$combo .= '<option value="' . $row->categoria_id . '">' . $row->categoria_nombre . '</option>';
		} 
      $this->view->assign('c_categoria', $combo);
   }


}

?>
