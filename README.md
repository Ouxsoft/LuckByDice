# LuckByDice

A library for simulating luck based dice rolls written in PHP.

```php
<?php
$similator = new Ouxsoft\LuckByDice\Factory\Simulator::getInstance();
$similator->notation->set('2d6+1d8+1d5+2d4+d10x4+2');
$similator->notation->add('1d6');
$similator->notation->remove('1d8');
$similator->notation->get();

$simulator->luck->set(223);
$outcome = $simulator->run();
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