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
use Pimple\Container;

class ContainerFactory
{
    /**
     * @param AbstractFactoryInterface $abstractFactory
     * @return Container
     */
    public static function buildContainer(
        AbstractFactoryInterface $abstractFactory
    ): Container {
        $container = new Container();

        $container['diceNotation'] = $abstractFactory->makeDiceNotation($container);
        $container['luck'] = $abstractFactory->makeLuck($container);

        return $container;
    }
}
