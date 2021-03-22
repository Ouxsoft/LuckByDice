<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDiceTests\Unit;

use Ouxsoft\LuckByDice\LuckAdjustment\DefaultLuckAdjustment;
use PHPUnit\Framework\TestCase;

class DefaultLuckAdjustmentTest extends TestCase
{
    private $luckAdjustment;

    public function setUp(): void
    {
        $this->luckAdjustment = new DefaultLuckAdjustment;
    }

    public function tearDown(): void
    {
        unset($this->luckAdjustment);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::getPhi
     */
    public function testGetPhi()
    {
        $phi = $this->luckAdjustment->getPhi();
        $this->assertEquals(1.6180339887499, $phi);
    }

}
