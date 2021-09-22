<?php
/**
 * $ php Game.php 2d10,6d6+2*1
 */

namespace Ouxsoft\LuckByDiceTests\Feature;

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Draw\Ascii;

$turn = TurnFactory::getInstance();
$draw = new Ascii();

$notation = !empty($argv[1]) ? $argv[1] : '10d6,1d2+12*2,3d3,d%';
$luck = !empty($argv[2]) ? $argv[2] : '0';
$turn->setNotation($notation);
$turn->setLuck($luck);

$roll = $turn->roll();
?>
<?php echo $draw->logo();?>

A cup with collections of similar dice was rolled and a total was computed.

Luck : <?php echo $turn->getLuck();?>

Cup <?php echo $turn->getNotation();?>
<?php echo $draw->scale($turn->getMinPotential(), $turn->getMaxPotential()) ?>
<?php echo $draw->cup($roll); ?>

<?php foreach ($turn->getCup() as $collection) : ?>

Collection: <?php echo $collection->getNotation(); ?>

<?php echo $draw->scale($collection->getMinOutcome(), $collection->getMaxOutcome()); ?>
<?php echo PHP_EOL; ?>
<?php echo $draw->collection($collection); ?>

<?php endforeach; ?>