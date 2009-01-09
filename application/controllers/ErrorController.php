<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * FiestaKit :: Página para promocionar todo lo necesario para fiestas 
 * 
 * @author       Adolfo Morales  <adolfo.morales@gmail.com> 
 * @package      FiestaKit
 * @copyright    Copyright 2008 Grupo Editorial Expansion	
 * @filesource   
 * 
 */

//
//	requires
/**
 * ErrorController.php :: --here short description--
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


/**
* ErrorController
*/ 
class ErrorController extends Zend_Controller_Action 
{ 
  /**
  * errorAction() is the action that will be called by the "ErrorHandler" 
  * plugin.  When an error/exception has been encountered
  * in a ZF MVC application (assuming the ErrorHandler has not been disabled
  * in your bootstrap) - the Errorhandler will set the next dispatchable 
  * action to come here.  This is the "default" module, "error" controller, 
  * specifically, the "error" action.  These options are configurable. 
  * 
  * @see http://framework.zend.com/manual/en/zend.controller.plugins.html
  *
  * @return void
  */
  public function errorAction() 
  { 
    // Ensure the default view suffix is used so we always return good 
    // content
    $this->_helper->viewRenderer->setViewSuffix('phtml');

    // Grab the error object from the request
    $errors = $this->_getParam('error_handler'); 

    // $errors will be an object set as a parameter of the request object, 
    // type is a property
    switch ($errors->type) { 
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER: 
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION: 

      // 404 error -- controller or action not found 
      $this->getResponse()->setHttpResponseCode(404); 
      $this->view->message = 'Page not found'; 
      break; 
      default: 
      // application error 
      $this->getResponse()->setHttpResponseCode(500); 
      $this->view->message = 'Application error'; 
      break; 
    } 

    // pass the environment to the view script so we can conditionally 
    // display more/less information
    $this->view->env       = $this->getInvokeArg('env'); 

    // pass the actual exception object to the view
    $this->view->exception = $errors->exception; 

    // pass the request to the view
    $this->view->request   = $errors->request; 
  } 
}

?>
