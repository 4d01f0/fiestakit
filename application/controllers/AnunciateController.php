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
 * AnunciateController.php :: --here short description--
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

require_once("../application/models/dbConnection.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

class AnunciateController extends Zend_Controller_Action
{
   public function indexAction()
	{
		$title="Fiestakit.com te brinda los datos y referencias de los mejores proveedores de servicios y productos para tu fiesta, evento o convenci&oacute;n, en cualquier parte de M&eacute;xico.";
      $this->view->assign('title', $title);

		$dbConn = Zend_Registry::get("dbConn");
		//echo("<pre>".print_r($dbConn)."</pre>");
		//
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

