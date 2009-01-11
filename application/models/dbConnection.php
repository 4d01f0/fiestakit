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
 * dbConnection.php :: declaracion del modelo para conectar a la base de datos
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


// set & verify the db connection
class dbConnection
{

   // 
   public function __construct($dbConfig)
   {
      $session = new Zend_Session_Namespace("fkSession");
      $session->dbConnection=true;

      // verificar si se cuenta con enlace a la DB
      try 
      {
         $this->dbConnection = Zend_Db::factory($dbConfig);
         $this->dbConnection->getConnection();
         $this->dbConnection->setFetchMode(Zend_Db::FETCH_OBJ);
   
         // .. y establecerla como el adapter por defecto
         //Zend_Db_Table_Abstract::setDefaultAdapter($this->dbConn);

      } 
      catch (Zend_Db_Adapter_Exception $e) 
      {
         // Si no se pudo firmar en la DB o no se encuentra el driver ...
         $session->dbConnection=false;
         //echo("<pre> Exception1");
         //print_r($e);
         //echo("</pre>");
      } 
      catch (Zend_Exception $e) 
      {
         // quizas la DB se encuentre abajo ?
         $session->dbConnection=false;
         //echo("<pre> Exception2");
         //print_r($e);
         //echo("</pre>");
      };
   
   }

   public function status()
   {
      return true;
   }

}


