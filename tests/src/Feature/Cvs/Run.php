<?php
namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require __DIR__ . '/../../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

echo 'Building data.csv file ...';
$turn = TurnFactory::getInstance();

$turn->setNotation('10d10');

$fp = fopen(__DIR__ . '/data.csv', 'w');

// add column headings
$fields = [
    'Roll',
    'Min',
    'Max',
    'Total',
    'Luck',
    'Bonus'
];
fputcsv($fp, $fields);

// add rows
for($i = 1; $i <= 100000; $i++){
    $turn->roll();

    $fields = [
        $i,
        $turn->getMinPotential(),
        $turn->getMaxPotential(),
        $turn->getTotal(),
        $turn->getLuck(),
        $turn->getExtraBonus()
    ];
    fputcsv($fp, $fields);
}

fclose($fp);
echo 'Done.';
