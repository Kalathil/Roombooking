<?php
/**
 * This file contains the Index Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Index Controller for handling the request of login and redirecting to the homepage.
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class IndexController extends Zend_Controller_Action
{
    /** Displays the login form and posts the username and password for validation
     * 
     * @return id of the user logged in.
     */
	public function indexAction()
    {
        $request = $this->getRequest();
        $form    = new Default_Form_Loginform();
        if ($this->getRequest()->isPost()) {
        	if ($form->isValid($request->getPost())) {
        	 $user = new Default_Model_User(); 
        	 	 
		     $user->getByUserName($request->username);
		   
		     if($user->authenticateByPassword($request->password)) {
				$session = new Zend_Session_Namespace('user');
        	    $session->user_id=$user->getUserId();
        	    $this->_helper->redirector('homepage');
		     } else {
		     	$this->view->entries = 1;
		     }
		 }else {
		 	$this->view->form = $form;
		 }
		 
        }
		 
       	 $this->view->form = $form;
    }
    
    /** Displays the homepage with the list of rooms
     * 
     * @return details of the room 
     */
	public function homepageAction()
    {	
    	$session = new Zend_Session_Namespace('user');
        if($session->user_id) {
        	$room = new Default_Model_Room();
        	$this->view->entries = $room->getroomdetails();
        } else {
        	$this->_helper->redirector->gotoRoute( array (
       			'controller'=>''
       			));
        }
    }
    
}


