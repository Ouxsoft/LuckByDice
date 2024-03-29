# ![LuckByDice](https://raw.githubusercontent.com/Ouxsoft/LuckByDice/main/docs/logo.png)

[![CI](https://github.com/Ouxsoft/LuckByDice/actions/workflows/ci.yml/badge.svg)](https://github.com/Ouxsoft/LuckByDice/actions/workflows/ci.yml)
[![Code Quality](https://app.codacy.com/project/badge/Grade/08ce9a4f9d2041ed8d815ff6ad664242)](https://www.codacy.com/gh/Ouxsoft/LuckByDice/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ouxsoft/LuckByDice&amp;utm_campaign=Badge_Grade)
[![Code Coverage](https://img.shields.io/codecov/c/github/Ouxsoft/LuckByDice)](https://codecov.io/gh/Ouxsoft/LuckByDice)
[![Docs Status](https://readthedocs.org/projects/luckbydice/badge/?version=latest&style=flat)](https://readthedocs.org/projects/luckbydice)

[![Latest Stable Version](https://img.shields.io/packagist/v/Ouxsoft/LuckByDice.svg)](https://packagist.org/packages/Ouxsoft/LuckByDice)
[![PHP Versions Supported](https://img.shields.io/badge/php-7.3%20to%208.0-777bb3.svg?logo=php&logoColor=white&labelColor=555555)](https://api.travis-ci.com/Ouxsoft/LuckByDice.svg?branch=master&status=passed)
[![License](https://img.shields.io/badge/license-MIT-428f7e.svg?logo=open%20source%20initiative&logoColor=white&labelColor=555555)](https://github.com/Ouxsoft/LuckByDice/blob/master/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/Ouxsoft/LuckByDice.svg)](https://packagist.org/packages/Ouxsoft/LuckByDice)

## Installation

Install using [Composer](https://getcomposer.org/download/):
```shell script
$ composer require ouxsoft/luckbydice
```

## Basic Usage
```php
<?php

use Ouxsoft\LuckByDice\Factory\TurnFactory;

$turn = TurnFactory::getInstance();
$turn->setNotation('10d10,1d6+3*7,d%');
echo $turn->roll(); 

// we should be luckier with this next roll
$this->turn->setLuck(200);
echo $this->roll();
```

## About
LuckByDice is a PHP library for simulating dice rolls written in PHP. In addition to emulating standard 
dice rolls from dice notation, it can also emulate luck. 

Rolls made with luck enabled have a natural ebb and flow to roll outcomes. 
Rolls made with higher luck are more likely to roll higher values. 
Luck is well suited for use with character's luck stat, which may feature unnatural modification.

**CLI Test**

This shows running Turn test rolling a Cup with various Collections of Dice.

![CLI Test Example](https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/interactive-test.gif)

**Chart Test**

This graph illustrates 10,000 consecutive `10d10` rolls to aid in statistical analysis.

![Chart Test Example](https://raw.githubusercontent.com/Ouxsoft/LuckByDice/main/docs/statistics.png)

Notice how outcome impacts luck and vice versa.

### Documentation
*  [Dice Notation Examples](https://luckbydice.readthedocs.io/en/latest/project/dice-notation-examples.html)
*  [Glossary](https://luckbydice.readthedocs.io/en/latest/project/glossary.html)
    *  [Turn](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#turn)
    *  [Dice Notations](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#dice-notation)
    *  [Cup](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#cup)
    *  [Collection](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#collection)
    *  [Dice](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#dice)
    *  [Luck](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#luck)
    *  [Bonus](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#bonus)
    *  [Algorithms](https://luckbydice.readthedocs.io/en/latest/project/glossary.html#algorithms)
*  [Classes](https://luckbydice.readthedocs.io/en/latest/api.html)

### Author
Matthew Heroux<br />
See also the [list of contributors](https://github.com/Ouxsoft/LuckByDice/graphs/contributors) who participated in this project.

### Contributing
LuckByDice is open source software project. If you find a problem or want to discuss new features or improvements
create an issue, and/or if possible create a pull request.

For local package development use [Docker](https://www.docker.com/products/docker-desktop):

Build Standard container
```
git clone https://github.com/Ouxsoft/LuckByDice.git
cd LuckByDice
docker build --target standard --tag luckbydice:latest -f Dockerfile .
```

Build Test container
```
docker build --target test --tag luckbydice:latest -f Dockerfile .
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest composer install
```

Run Automated Unit Tests using local volume
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest composer test
```

Run Automated Benchmark Tests using local volume
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest ./vendor/bin/phpbench run tests/src/Benchmark --report=default
```

Run Manual CLI Feature Test using local volume 
```
docker run -it --mount type=bind,source="$(pwd)"/,target=/application/ luckbydice:latest php tests/src/Feature/Cli.php 1d10+4*2 0
```

Start test server available at [http://localhost/](http://localhost/)
```
docker run -it -p 80:80 --mount type=bind,source="$(pwd)"/,target=/application luckbydice:latest bash -c 'cd tests/src/Interactive && php -S 0.0.0.0:80'
```

Build Docs
```
docker build --target docs --tag luckbydice:docs-latest -f Dockerfile .
docker run -it --mount type=bind,source="$(pwd)"/docs,target=/app/docs luckbydice:docs-latest bash -c "doxygen Doxyfile && doxyphp2sphinx Ouxsoft::LuckByDice"
```

### Acknowledgement
Thanks to Zachary Whitcomb-Paulson for dice notation expertise.