<?php
namespace BeeGame;

class DroneBee extends Bee
{
	public $hitPoints = 50;
	public $hitDeductablePoints = 12;
	
	public function reset()
	{
		$this->hitPoints = 50;
	}
}
