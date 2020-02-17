<?php
namespace BeeGame;

class GameModerator
{
	public $beeRegister 		= array();
	public $numDroneBee 		= 3;
	public $numWorkerBee 		= 5;
	public $QueenBee 			= 1;
	
	public function registerBeeForTheGame(Bee $bee)
	{
		$this->beeRegister[] = $bee;
	}
	
	public function selectRandomBee()
	{
		$numBee = count($this->beeRegister) - 1;
		$index = rand(0,$numBee);
		
		$selectedBee = $this->beeRegister[$index];
		
		if ($selectedBee instanceof Bee) {
			$selectedBee->hit();
		}
	}
	
	public function start()
	{
		$this->resetGame();
		for($i= 1; $i<=$this->numDroneBee; $i++){
			
			$this->registerBeeForTheGame(new \BeeGame\DroneBee());
		}
		
		for($n=1; $n<=$this->numWorkerBee; $n++){
			$this->registerBeeForTheGame(new \BeeGame\WorkerBee());
		}
		
		$this->registerBeeForTheGame(new \BeeGame\QueenBee());
	}
	
	public function resetGame()
	{	
		$this->beeRegister = array();
    }
	
	public function hitBee(Bee $beeObj)
	{
		$beeObj->deductHitPoints();
	}
}
