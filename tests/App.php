<?php

// TODO: Delete this file

require "../vendor/autoload.php";

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Luck;

$turn = TurnFactory::getInstance();

$turn->setNotation("d4,3d8+2,4d20+1*30");

echo "Running check to ensure luck outcome is variable";
for($i = 0; $i < 1000; $i++){
	echo "Roll Outcome: ";
	echo $turn->roll();
	echo PHP_EOL;

	echo "Luck: ";
	echo $turn->getLuck();
	echo PHP_EOL;
}