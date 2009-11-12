<?php

require_once ('../application/models/User.php');
require_once ('../application/models/Room.php');
require_once ('../application/models/Reserveroom.php');
require_once ('../tests/bootstrap.php');


class Default_Model_UserTest extends PHPUnit_Framework_TestCase
{

	public function setUp()
    {
        $this->bootstrap=array($this, 'appBootstrap');
        Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_NonPersistent());
        parent::setUp();
    }
	
    public function appBootstrap()
    {
        Application::setup();
    }
    
    public function tearDown()
    {
        Zend_Auth::getInstance()->clearIdentity();
    }
	
  	

	public function testAuthenticateByPassword()
	{  
	   	 $users = $this->getMock('Default_Model_User', array('getPassword'));
    		
		 $users->expects($this->once())
		 		->method('getPassword')
		 		->will($this->returnValue('qburst'));
		 		
		$this->assertEquals(1, $users->authenticateByPassword('qburst'));
	}
	
	public function testGetUserDetails()
	{
		$user=new Default_Model_User;
		$data['vchUsername']='kalathil@qburst.com';
		$data['vchPassword']='qburst';
		$data['vchFirstname']='Sreenath';
		$data['vchLastname']='Kalathil';
		$data['vchPlace']='Trivandrum';
		$data['intUserId']='3';
		$this->assertEquals($data,$user->getUserDetails(3));
		
	}

	public function testGetroomdetails()
	{	
		$data['intRoomId']='2';
		$data['vchRoomname']='Room 2';	
		$room=new Default_Model_Room;
		$this->assertArrayHasKey('5',$room->getroomdetails());
		$this->assertContains($data,$room->getroomdetails());
	}

	public function testReturnuserdetails()
	{	

		$data['firstname']='Sreenath';
		$data['lastname']='Kalathil';
		$data['place']='Trivandrum';
    	$data['username']='kalathil@qburst.com';
    	$data['password']='qburst';
		$user=new Default_Model_User;
		$user->getbyUserName('kalathil@qburst.com');
		$this->assertEquals($data,$user->returnuserdetails()); 		
	
	}
	
	public function testReserveroomdetails()
	{	$data['intRoomId']='2';
		$data['vchRoomname']='Room 2';	
		$room=new Default_Model_Room;
		
		$this->assertContains($data,$room->reserveroomdetails());
		
	}	
	
	public function testSetUserDetails()
	{
		$user=new Default_Model_User;
		$data['firstname']='Sreenath';
		$data['lastname']='Kalathil';
		$data['place']='Trivandrum';
    	$data['username']='kalathil@qburst.com';
    	$data['password']='qburst';
		$user->setUserDetails($data);
		$this->assertEquals($data,$user->returnsetUserDetails());
	}
	
	
}