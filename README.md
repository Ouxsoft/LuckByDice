# LuckByDice

A library for simulating dice rolls with luck written in PHP.

$simulation = new Ouxsoft\LuckByDice\Simulator();

// dice is both the singular and plural form
$simulation->addDice('1d4','1d5','2d4');
$simulation->addDice('1d4');


$simulation->setLuck(223);
$outcome = $simulation->run();

new LuckyByDice\Dice

total => 3
[
    name => '1d4'
    slides => 4
    outcome => 3
]

$simulation->run();

$simulation->getLastOutcome();
$turn->getOutcomeByDice();
getLuckModifier();
getLuckBase();
getLuck();

luckMin luckMax
luckBase


## Luck

Luck could be granted by items. Library does not take into account based luck and modifiers. It only returns the luck.