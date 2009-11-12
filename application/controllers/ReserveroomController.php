 <?php
 /**
 * This file contains the Reserveroom Controller
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Reserveroom Controller for handling the request of reservation. 
 * 
 * @category Controller
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class ReserveroomController extends Zend_Controller_Action
{
	/** Displays the details of the rooms available for reservation
	 * 
	 * @return details of the room available.
	 * 
	 */
    public function indexAction()
    {	
    	 
       $this->view->entries =Default_Model_Room::reserveroomdetails();
        
    }
}
