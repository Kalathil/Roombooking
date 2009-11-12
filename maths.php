<?php

class maths
{
	public function add($a, $b)
	{
		return $a+$b;
	}
//}
//class maths2
//{
	public function multiply($a, $b)
	{
		$maths = new maths();
		$product = 0;
		for($i=0; $i<$b;$i++) {
			$product = $this->add($product, $a);
		}

		return $product;
	}
}
