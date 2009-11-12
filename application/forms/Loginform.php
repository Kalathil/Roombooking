<?php
 /**
 * This file contains the Login form
 * 
 * @category Forms
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Login form for displaying the details of the user for editing. 
 * 
 * @category Forms
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class Default_Form_Loginform extends Zend_Form
{
    /** Displays the login form and posts username and password to the index controller
	 * 
	 * @return NULL
	 * 
	 */
	public function init()
    {
        $this->setMethod('post');
        $this->addElement(
        	'text', 'username', array(
            'label'      => 'Username:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array('EmailAddress'))
        );

        $this->addElement(
        	'password', 'password', array(
            'label'      => 'Password:',
            'required'   => true,
        	'filters'    => array('StringTrim')
            )
        );

        $this->addElement(
        	'submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',)
        );
		
    }
}


