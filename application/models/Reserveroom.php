<?php
 /**
 * This file contains the Reserveroom model
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * Reserveroom model to handle reservation details.
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class Default_Model_Reserveroom
{
	/** Inserts the reservation details into the table tblRoomAllocation. 
	 * 
	 * @return NULL
	 */
	public function reserveroom($roomid,$user_id)
    {
    
		$dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db);
			
		$date=date("Y-m-d");
		$sql='SELECT * FROM tblRoomAllocation WHERE dteBookingDate=\''.$date.'\' AND intUserId=\''.$user_id.'\'';
		$ret=$db->fetchAll($sql);
		$num=count($ret);
		if ($num=='0') {
		 $sql='INSERT INTO tblRoomAllocation (intRoomId,dteBookingDate,intUserId) VALUES (\''.$roomid.'\',\''.$date.'\',\''.$user_id.'\')';
		 $res= $db->query($sql);
		 return $roomid;
		} else {
			return 0;
		} 
		
	}		
	
	
}