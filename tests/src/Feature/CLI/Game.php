<?php
namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require '../../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

function drawCup($value){
    $faceValue = str_pad($value, 8, ' ', STR_PAD_BOTH);
    return <<<TEXT


     ( (
      ) )
  ..........
  |        |
  |$faceValue|]
   \      /     
    `----'


TEXT;
}
$turn = TurnFactory::getInstance();

$turn->notation->set('10d10*2,1d4');

$roll = $turn->roll();
echo drawCup($roll);

echo 'Luck : ' . $turn->getLuck() . PHP_EOL;
echo 'Cup : ' . PHP_EOL;
echo '- Notation : '. $turn->getNotation() . PHP_EOL;
echo '- Total Outcome: ' . $roll . PHP_EOL;
echo '- Min Potential: ' . $turn->getMinPotential() . PHP_EOL;
echo '- Max Potential: ' . $turn->getMaxPotential() . PHP_EOL;
echo '- Collection : ' . PHP_EOL;
foreach($turn->getLastRollCollection() as $outcome) {
    print_r($outcome) . PHP_EOL;
}