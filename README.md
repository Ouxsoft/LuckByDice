<p align="center"><img src="https://raw.githubusercontent.com/Ouxsoft/LuckByDice/main/docs/logo.png" alt="LuckByDice"/></p>

[![Build Status](https://api.travis-ci.com/Ouxsoft/luckbydice.svg?branch=main&status=passed)](https://travis-ci.com/github/Ouxsoft/LuckByDice)
[![Code Quality](https://app.codacy.com/project/badge/Grade/08ce9a4f9d2041ed8d815ff6ad664242)](https://www.codacy.com/gh/Ouxsoft/LuckByDice/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ouxsoft/LuckByDice&amp;utm_campaign=Badge_Grade)
[![Code Coverage](https://img.shields.io/codecov/c/github/Ouxsoft/LuckByDice)](https://codecov.io/gh/Ouxsoft/LuckByDice)
[![Docs Status](https://readthedocs.org/projects/luckbydice/badge/?version=latest&style=flat)](https://readthedocs.org/projects/luckbydice)

[![Latest Stable Version](https://img.shields.io/packagist/v/Ouxsoft/LuckByDice.svg)](https://packagist.org/packages/Ouxsoft/LuckByDice)
[![PHP Versions Supported](https://img.shields.io/badge/php-7.3%20to%208.0-777bb3.svg?logo=php&logoColor=white&labelColor=555555)](https://api.travis-ci.com/Ouxsoft/LuckByDice.svg?branch=master&status=passed)
[![License](https://img.shields.io/badge/license-MIT-428f7e.svg?logo=open%20source%20initiative&logoColor=white&labelColor=555555)](https://github.com/Ouxsoft/LuckByDice/blob/master/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/Ouxsoft/LuckByDice.svg)](https://packagist.org/packages/Ouxsoft/LuckByDice)

## Installation

### Via Composer
Install with [Composer](https://getcomposer.org/download/):
```shell script
composer require ouxsoft/luckbydice
```

## About
A library for simulating luck based dice rolls based on dice notations written in PHP.

<img src="https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/interactive-test.gif" width="600" alt="CLI Test Example"/>

This graph shows 10,000 consecutive `10d10` LuckByDice rolls. Notice how outcome impacts luck and vice versa.
<p align="center"><img src="https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/statistics.png" alt="statistics"/></p>

## Documentation
Read our docs for usage [luckbydice.readthedocs.io](https://luckbydice.readthedocs.io).

## Contributing
LuckByDice is an open source project. If you find a problem or want to discuss new features or improvements
please create an issue, and/or if possible create a pull request.

For local package development use [Docker](https://www.docker.com/products/docker-desktop):
```
# Build test container
docker build --target test --tag luckbydice:latest -f Dockerfile .

# Run Interactive test
docker run -it luckbydice:latest tests/src/Interactive/Game.php 4d6+3*2,d4*2,d8

# Run Unit tests
docker run -it --mount type=bind,source="$(pwd)"/,target=/app luckbydice:latest composer test

# Build Docs
docker build --target docs --tag luckbydice:docs-latest -f Dockerfile .
docker run -it --mount type=bind,source="$(pwd)"/docs,target=/app/docs luckbydice:docs-latest bash -c "doxygen Doxyfile && doxyphp2sphinx Ouxsoft::LuckByDice"
```
