<?php 

require "../vendor/autoload.php";

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Luck;

$turn = TurnFactory::getInstance();

$turn->setNotation("1d4,3d8+2");

for($i = 0; $i < 100; $i++){
	echo "Roll Outcome: ";
	echo $turn->roll();
	echo PHP_EOL;

	echo "Luck: ";
	echo $turn->getLuck();
	echo PHP_EOL;
}
