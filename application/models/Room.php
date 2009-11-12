<?php
 /**
 * This file contains the Room model
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Room model to handle requests and details with regard to rooms.
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class Default_Model_Room
{
	/** Retrieves the details of all the rooms to display in the homepage. 
	 * 
	 * @return the details of all the rooms
	 */
	public function getroomdetails()
    {
        $dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db);
		
		$sql = 'SELECT * FROM tblRoom ';
		$res= $db->fetchAll($sql);
		return $res;
	}
	
    
    /** Retrieves the details of all available rooms to display in the reserve room page. 
	 * 
	 * @return the details of all available rooms
	 */		
    public function reserveroomdetails()
    {
      	$dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db);
		$date=date("Y-m-d");
		$sql='SELECT * FROM tblRoom where intRoomId NOT IN (SELECT intRoomId from tblRoomAllocation WHERE dteBookingDate= \''.$date.'\')';
    	$res= $db->query($sql); 
    	return $res;
    }		
}		