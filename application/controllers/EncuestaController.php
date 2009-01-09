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
//Zend::LoadClass('Zend_View');
class EncuestaController extends Zend_Controller_Action
{
   public function indexAction()
   {
     $this->view->formself="/encuesta";
     $request = $this->getRequest();
     if( $request->isPost() )
     {
       //$forms = $this->get();
       $data = $request->getPost();
       $this->view->recibe="<code>"+print_r($this,false)+"</code>";
       $this->view->recibe=$data["nombre"];
     }
     #$this->view->assign('title', 'Hello World!');
     $this->view->title='Hello Encuesta!';
     $music = array('title'=>'The End of the Line','artist'=>'Metallica');
   }

   public function indexView()
   {
      $music = array('title'=>'The End of the Line','artist'=>'Metallica');
      $music = array('title'=>'Presente','artist'=>'Julieta Venegas');
      $view->assign($music);
   }

   public function encuestaAction()
   {
      $this->view->title="Encuesta";
      // si POST, guardar y mostrar datos
      if($this->_request->isGet())
      {
         $stat=false;
      }
      // en cualquier caso mostrar formulario
      else
      {
         $stat=true;
      
      }
      $this->view->formStat = $stat;
      // mostrar la forma 

   }

}

?>
