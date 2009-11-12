<?php
/**
 * This file contains the Onreservation Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Onreservation Controller for handling reservation of rooms by saving details to database. 
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class OnreservationController extends Zend_Controller_Action
{
	/** Saves the details of the reservation to the database.
     * 
     * @return details of reservation.
     */
    public function indexAction()
    {	
        $session = new Zend_Session_Namespace('user');
        if($session->user_id) {
        	$this->view->entries = Default_Model_Reserveroom::reserveroom($this->_request->data,$session->user_id);
        } else {
        	$this->_helper->redirector->gotoRoute( array (
       			'controller'=>'index'
       			));
        }
        
    }
    
}
