<?php 
/**
 * This file contains the Logout Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Logout Controller for handling the request for logging out the user.
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class LogoutController extends Zend_Controller_Action
{
	/** Unsets the session values and redirects user to login page 
     * 
     * @return NULL
     */
	public function indexAction()
    {
		$session = new Zend_Session_Namespace('user');
       	unset($session->user_id);
       	$this->_helper->redirector->gotoRoute( array (
       			'controller'=>'index'
       			));
       		
       	
    }
}
