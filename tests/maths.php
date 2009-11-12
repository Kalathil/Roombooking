<?php

class maths
{	protected $num;
	public function add($a, $b)
	{
		$this->num= $a+$b;
		return $this->num;
	}
//}
//class maths2
//{
	public function multiply($a, $b)
	{
		//$maths = new maths();
		$product = 0;
		for($i=0; $i<$b;$i++) {
			//$product = $this->add($product, $a);
			$product=$this->num;
		}

		return $product;
	}
}
