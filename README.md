# LuckByDice

A library for simulating luck based dice rolls written in PHP.

```php
<?php

require '../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

$turn = TurnFactory::getInstance();
$turn->set("1d4,2d5,6d6+3,d5*2");
echo $turn->roll();

# outputs example 72
```

## Luck

Luck could be increased by items or skills. This Library does not take into account based luck and modifiers. It only returns the luck.