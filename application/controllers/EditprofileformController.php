<?php 
/**
 * This file contains the Editprofile Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Editprofile Controller for handling the request for editing the user profile.
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class EditprofileformController extends Zend_Controller_Action
{
	/** Displays the edit profile form and posts the edited data to database.
     * 
     * @return NULL
     */
	public function indexAction()
    {
        $request = $this->getRequest();
        $form    = new Default_Form_Editprofileform();
        
        if ($this->getRequest()->isPost()) {
        	if($form->isValid($request->getPost())) {
        	$user = new Default_Model_User;
        	$session = new Zend_Session_Namespace('user');
        	$user->getUserDetails();
        	$data['username']=$request->username;
        	$data['password']=$request->password;
        	$data['firstname']=$request->firstname;
        	$data['lastname']=$request->lastname;
        	$data['place']=$request->place;
        	
        	$user->setUserDetails($data);
        	$user->update();
        	$this->view->entries=1;
		    } else {
		    	$this->view->form = $form;
		    }
        }
    	$this->view->form = $form;
    }
}

