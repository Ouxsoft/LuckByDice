<?php

namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require __DIR__ . '/../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

$turn = TurnFactory::getInstance();

if (isset($_POST['notation'])) {
    $turn->setNotation($_POST['notation']);
}

if (isset($_POST['luck'])) {
    $turn->setLuck($_POST['luck']);
}

$iterations = isset($_POST['iterations']) ? $_POST['iterations'] : 1;

$response = [
    'data' => []
];

for ($i = 1; $i <= $iterations; $i++) {
    $turn->roll();

    $response['data'][] = [
        'total' => $turn->getTotal(),
        'min' => $turn->getMinPotential(),
        'max' => $turn->getMaxPotential(),
        'luck' => $turn->getLuck(),
        'bonus' => $turn->getExtraBonus(),
    ];
}

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
