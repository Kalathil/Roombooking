<?php
 /**
 * This file contains the Edit Profile form
 * 
 * @category Forms
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Edit profile form for displaying the details of the user for editing. 
 * 
 * @category Forms
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

class Default_Form_Editprofileform extends Zend_Form
{
    /** Displays the details of the user in a form to be edited and posts the data to Editprofileform controller.
	 * 
	 * @return NULL
	 * 
	 */
	public function init()
    {
        
    	$userdetails = new Default_Model_User();
    	$session = new Zend_Session_Namespace('user');
        $row = $userdetails->getUserDetails($session->user_id);
             
      
  		  	$this->setMethod('post');
        	$this->addElement(
        		'text', 'username', array(
            	'label'      => 'Username:',
        		'value'		 =>$row[vchUsername],
            	'required'   => true,
            	'filters'    => array('StringTrim'),
            	'validators' => array(
                'EmailAddress'))
        	);

            $this->addElement(
            	'text', 'password', array(
           		'label'      => 'Password:',
        		'value'		 =>$row[vchPassword],
            	'filters'    => array('StringTrim'),
            	'required'   => true
            	)
            );

       		$this->addElement(
       			'text', 'firstname', array(
            	'label'      => 'Firstname:',
       			'value'		 =>$row[vchFirstname],
            	'required'   => true,
       			'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
       		)));
         	
        	$this->addElement(
        		'text', 'lastname', array(
            	'label'      => 'Lastname:',
         		'value'		 => $row[vchLastname],
            	'required'   => true,
        		'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
       		)));
		
        	$this->addElement(
        		'text', 'place', array(
            	'label'      => 'Place:',
        		'value'		 =>$row[vchPlace],
            	'required'   => true,
        		'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
       			)));
       		
       		$this->addElement(
       			'submit', 'submit', array(
            	'ignore'   => true,
            	'label'    => 'Edit',)
       		);

        	
    	
    }
}