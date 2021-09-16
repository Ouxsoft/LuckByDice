<?php
namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require __DIR__ . '/../../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

$turn = TurnFactory::getInstance();

if(isset($_POST['notation'])){
    $turn->notation->set($_POST['notation']);
}

if(isset($_POST['luck'])){
    $turn->setLuck($_POST['luck']);
}

$turn->roll();

$response = [
    'data' => [
        'total' => $turn->getTotal(),
        'min' => $turn->getMinPotential(),
        'max' => $turn->getMaxPotential(),
        'luck' => $turn->getLuck(),
        'bonus' => $turn->getExtraBonus(),
    ]
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
