#!/usr/bin/php
<?php
/**
 * $ php Game.php 2d10,6d6+2*1
 */

namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require '../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

function drawCup($value){
    $faceValue = str_pad($value, 8, ' ', STR_PAD_BOTH);
    return <<<TEXT
               ( (
                ) )
            ..........
            |        |
      TOTAL |$faceValue|] 
             \      /     
              `----'


TEXT;
}

function drawDice($roll, $sides){
    $sides = str_pad($sides, 5, '_', STR_PAD_BOTH);
    $roll = str_pad($roll, 5, ' ', STR_PAD_BOTH);
    return [
        "   .-----.",
        "  /$sides/|",
        " |     | |",
        " |$roll| |",
        " |_____|/ "
    ];
}

function drawCollection($dice){

    $drawnDice = [];
    foreach($dice as $die){
        $drawnDice[] = drawDice($die['roll'], $die['sides']);
    }

    $screenWidth = exec('tput cols');
    $dieHeight = count($drawnDice[0]);
    $diceWidth = strlen($drawnDice[0][0]);
    $output = '';

    for($line = 0; $line < $dieHeight; $line++){
        foreach($drawnDice as $key => $drawnDie){
            $output .= $drawnDie[$line];
        }
        $output .= PHP_EOL;
    }

    return $output;
}

function drawScale($min, $max)
{
    return <<<TEXT

 <--{$min}-----------------------------------------------{$max}-->
    Min                                              Max


TEXT;
}

$turn = TurnFactory::getInstance();

$notation = !empty($argv[1]) ? $argv[1] : '10d6,1d2+12*2,3d3,d%';
$turn->notation->set($notation);

$roll = $turn->roll();

echo PHP_EOL . PHP_EOL;
echo ' Rolling Cup Full of Dice!' . PHP_EOL;
echo ' ' . PHP_EOL;
echo ' Luck : ' . $turn->getLuck() . PHP_EOL . PHP_EOL;
echo ' Cup '. $turn->getNotation() . PHP_EOL;
echo drawScale($turn->getMinPotential(),$turn->getMaxPotential());
echo drawCup($roll);

foreach($turn->getLastRollCollection() as $collection) {
    echo PHP_EOL;
    echo ' Collection (' . count($collection['dice']) . 'd' . $collection['sides'] . '+' . $collection['modifier'] .
        ')*' . $collection['multiplier'] . PHP_EOL;
    echo drawScale($collection['min'], $collection['max']);
    echo drawCollection($collection['dice']);
}

echo PHP_EOL;