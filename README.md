# LuckByDice

A library for simulating dice rolls using with luck written in PHP.

```php
<?php
$diceNotation = new Ouxsoft\LuckByDice\DiceNotation();
$diceNotation->set('2d6+1d8+1d5+2d4+d10x4+2');
$diceNotation->add('1d6');
$diceNotation->remove('1d8');
$diceNotation->get();

$diceSimulation = new Ouxsoft\LuckByDice\Simulator();
$diceSimulation->setLuck(223);
$outcome = $diceSimulation->parse();
```

total => 
[
    name => '1d4'd
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

Luck could be increased by items or skills. This Library does not take into account based luck and modifiers. It only returns the luck.