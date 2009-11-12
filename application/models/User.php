<?php
 /**
 * This file contains the User model
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */

/**
 * User model to handle requests and details with regard to user.
 * 
 * @category Models
 * @package  Project1
 * @author   sreenathk <sreenathk@qburst.com>
 * @license  http://www.zend.com/  sreenathk
 * @link     sreenathk
 */
class Default_Model_User
{
	protected $UserName;
	protected $Password;
	protected $UserId;
	protected $Firstname;
	protected $Lastname;
	protected $Place;
	
		
	/** Gets the user details from database for particular username. 
	 * 
	 * @return details of the user.
	 */
    public function getbyUserName($username)    
    {	
    	$dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db);
		
    	$sql = 'SELECT * FROM tblUser WHERE vchUsername=\''.$username.'\'';
		$res = $db->fetchAll($sql);
		$row = array_shift($res);
		
		$this->UserName=$row['vchUsername'];
		$this->Password=$row['vchPassword'];
		$this->UserId=$row['intUserId'];
		$this->Firstname=$row['vchFirstname'];
		$this->Lastname=$row['vchLastname'];
		$this->Place=$row['vchPlace'];
	
    }
    
    /**
     * 
     */
    public function returnuserdetails()
    {
    	$data['firstname']=$this->Firstname;
    	$data['lastname']=$this->Lastname;
    	$data['place']=$this->Place;
    	$data['username']=$this->UserName;
    	$data['password']=$this->Password;
    	return $data;
    }
    
    /** Validates the user login by checking the password entered by user and the one in database. 
	 * 
	 * @return the id of the user.
	 */
    public function authenticateByPassword($password1)
    {	
    	if($password1 == $this->getPassword()) {
    		return 1;
    	} else {
    		return 0;
    	}
    }
    
    /** Return the password which has been set in the function getbyUserName.
     * 
     *  @return the password.
     */
    public function getPassword() 
    {
    	return $this->Password;
    }
    
    /** Gets the user id of the particular user.
	 * 
	 * @return the id of the user.
	 */
    public function getUserId()
    {
    	return $this->UserId;
    }
    
	/** Gets the user details to display in the edit profile form. 
	 * 
	 * @return the details of the user from tblUser table.
	 */
    public function getUserDetails($user_id)
    {
    	$dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db);
				
		$sql = 'SELECT * FROM tblUser where intUserId=\''.$user_id.'\'';
		$res= $db->fetchAll($sql);	
		$row = array_shift($res);
		$this->UserName=$row[vchUsername];
		$this->Password=$row[vchPassword];
		$this->Firstname=$row[vchFirstname];
		$this->Lastname=$row[vchLastname];
		$this->Place=$row[vchPlace];
		
		return $row;
	}	
	
	/** Sets the user details by assigning to a particular object.
	 * 
	 *   @return NULL.
	 */
	public function setUserDetails($data)
	{
		$this->UserName=$data['username'];
		$this->Password=$data['password'];
		$this->Firstname=$data['firstname'];
		$this->Lastname=$data['lastname'];
		$this->Place=$data['place'];
	}
	
	/**Sets the user details to the respective variables.
	 * 
	 *  @return the data which is set to the variables 
	 */
    public function returnsetUserDetails()
    {
    	$data['firstname']=$this->Firstname;
    	$data['lastname']=$this->Lastname;
    	$data['place']=$this->Place;
    	$data['username']=$this->UserName;
    	$data['password']=$this->Password;
    	return $data;
    }
	
	/** Updates the user details after the user edits it in the edit profile section. 
	 * 
	 * @return NULL.
	 */
    public function update()
    {
      	$dbConfig = new Zend_Config_Ini('../application/configs/database.ini', 'general');
		$db = Zend_Db::factory($dbConfig->db); 
		$session = new Zend_Session_Namespace('user');
		$sql = 'UPDATE tblUser SET vchUsername=\''.$this->UserName.'\',
				   vchPassword=\''.$this->Password.'\',
				   vchFirstname=\''.$this->Firstname.'\',
				   vchLastname=\''.$this->Lastname.'\',
				   vchPlace=\''.$this->Place.'\' WHERE intUserId=\''.$session->user_id.'\'';
		$res= $db->query($sql);
	}		
  
}
    