<?php
#!/usr/local/bin/php
/**
 * $ php Game.php 2d10,6d6+2*1
 */

namespace Ouxsoft\LuckByDiceTests\Feature;

require __DIR__ . '/../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Draw\Ascii;

$turn = TurnFactory::getInstance();
$draw = new Ascii();

$notation = !empty($argv[1]) ? $argv[1] : '10d6,1d2+12*2,3d3,d%';
$luck = !empty($argv[2]) ? $argv[2] : '0';
$turn->notation->set($notation);
$turn->setLuck($luck);

do {
    $roll = $turn->roll();

    echo PHP_EOL .
        PHP_EOL .
        ' A cup with collections of similar dice was rolled and a total was computed' . PHP_EOL .
        ' ' . PHP_EOL .
        ' Luck : ' . $turn->getLuck() .
        PHP_EOL .
        PHP_EOL .
        ' Cup '. $turn->getNotation() . PHP_EOL .
        $draw->scale($turn->getMinPotential(),$turn->getMaxPotential()) .
        $draw->cup($roll);

    foreach($turn->getCup() as $collection) {
        echo PHP_EOL .
            'Collection: ' . $collection->getNotation() . PHP_EOL .
            $draw->scale($collection->getMinOutcome(), $collection->getMaxOutcome()) .
            $draw->collection($collection);
    }

    echo PHP_EOL .
        'Roll again? (y/n)?';

    $handle = fopen('php://stdin','r');
    $line = fgets($handle);
} while (trim($line) == 'y');
fclose($handle);
