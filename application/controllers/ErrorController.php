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

//
//	ErrorController
class ErrorController extends Zend_Controller_Action 
{
   public function errorAction() 
    { 
        $errors = $this->_getParam('error_handler');

        switch ($errors->type) { 
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER: 
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION: 
 
                // 404 error -- controller or action not found 
                $this->getResponse()->setHttpResponseCode(404); 
                $this->view->message = "Page not found"; 
                break; 
            default: 
                // application error 
                $this->getResponse()->setHttpResponseCode(500); 
                $this->view->message = "Application error"; 
                break; 
        } 
 
        $this->view->env       = $this->getInvokeArg("env"); 
        $this->view->exception = $errors->exception; 
        $this->view->request   = $errors->request; 
    } 
}

