<?php
/**
 * This file contains the Error Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Error Controller for handling invalid page requests.
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class ErrorController extends Zend_Controller_Action
{
    /** Displays the error messages depending on the nature of exception.
     * 
     * @return NULL
     */
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        
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
        
        $this->view->exception = $errors->exception;
        $this->view->request   = $errors->request;
    }


}

