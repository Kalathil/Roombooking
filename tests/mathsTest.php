<?php

require_once('../application/models/maths.php');

class mathsTest extends PHPUnit_Framework_TestCase
{
	public function testAdd()
	{
		$maths = new maths();
		$this->assertEquals(3, $maths->add(1,2));
		$this->assertEquals(2, $maths->add(0,2));
		$this->assertEquals(-2, $maths->add(0,-2));
	}

	public function testMultiply()
	{
		$mockMaths = $this->getMock('maths', array('add'));
		$mockMaths->expects($this->exactly(2))
		          ->method('add')
		          ->will($this->onConsecutiveCalls(3,6));
		$this->assertEquals(6, $mockMaths->multiply(3,2));
	}

	public function testMultiplyWithOne()
    {
        $mockMaths = $this->getMock('maths', array('add'));
        $mockMaths->expects($this->once())
                  ->method('add')
                  ->will($this->returnValue(3));
        $this->assertEquals(3, $mockMaths->multiply(3,1));
    }

//	public static function getAdditionValues($a, $b)
//	{
//		if (0 == $a && 3 == $b) {
//			return 3;
//		}
//		if (3 == $a && 3 == $b) {
//			return 6;
//		}
//	}
}
