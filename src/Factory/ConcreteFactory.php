<?php
/*
 * This file is part of the LivingMarkup package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ouxsoft\LuckByDice\Factory;

use Ouxsoft\LuckByDice\Contract\AbstractFactoryInterface;
use Ouxsoft\LuckByDice\DiceExpression;
use Ouxsoft\LuckByDice\DiceNotation;

use Pimple\Container;

class ConcreteFactory implements AbstractFactoryInterface
{
    public function makeNotationParser(Container &$container): NotationParser
    {
        return new NotationParser();
    }

    public function makeExpression(Container &$container): ExpressionParser
    {
        return new ExpressionParser($container['notationParser']);
    }

    public function makeLuck(Container &$container): Luck
    {
        return new Luck();
    }
}
