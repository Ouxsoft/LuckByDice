<?php

/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ouxsoft\LuckByDice\Draw;

use Ouxsoft\LuckByDice\Collection;

/**
 * Class AsciiDraw
 * Aids in visualizing objects output to CLI
 * @package Ouxsoft\LuckByDice
 */
class Ascii
{
    /**
     * @return string
     */
    public function logo(): string
    {
        return <<<ASCII
     _                _   ______      ______  
    | |              | |  | ___ \     |  _  (_)
    | |    _   _  ___| | _| |_/ /_   _| | | |_  ___ ___
    | |   | | | |/ __| |/ / ___ \ | | | | | | |/ __/ _ \
    | |___| |_| | (__|   <| |_/ / |_| | |/ /| | (_|  __/
    \_____/\__,_|\___|_|\_\____/ \__, |___/ |_|\___\___|
                                  __/ |
                                 |___/
    ASCII;
    }

    /**
     * @param int $value the outcome for the cup
     * @return string
     */
    public function cup(int $value): string
    {
        $faceValue = str_pad((string) $value, 8, ' ', STR_PAD_BOTH);
        return <<<ASCII
                   ( (
                    ) )
                ..........
                |        |
          TOTAL |{$faceValue}|] 
                 \      /     
                  `----'

    ASCII;
    }

    /**
     * @param int $value
     * @param int $total
     * @param int $sides
     * @return string[]
     */
    public function dice(int $value, int $total, int $sides): array
    {
        $value = ($value == $total) ? '*' : $value;
        $value = str_pad((string) $value, 3, ' ', STR_PAD_BOTH);
        $total = str_pad((string) $total, 6, ' ', STR_PAD_BOTH);
        $sides = str_pad((string) $sides, 6, ' ', STR_PAD_BOTH);
        return [
            "    .+------+",
            "  .'$total.'|",
            " +---+--+'  |",
            " |      |$value|",
            " |$sides|   +",
            " |      | .' ",
            " +------+'   "
        ];
    }


    /**
     * @param Collection $collection
     * @return string
     */
    public function collection(Collection $collection): string
    {
        // build an array of dice to be combined line by line
        $drawnDice = [];
        foreach ($collection->getDice() as $die) {
            $drawnDice[] = $this->dice($die->getValue(), $die->getTotal(), $die->getSides());
        }

        $screenWidth = exec('tput cols');
        $dieHeight = count($drawnDice[0]);
        $diceWidth = strlen($drawnDice[0][0]);
        $output = '';

        for ($line = 0; $line < $dieHeight; $line++) {
            foreach ($drawnDice as $key => $drawnDie) {
                $output .= $drawnDie[$line];
            }
            $output .= PHP_EOL;
        }

        return $output;
    }

    /**
     * @param int $min
     * @param int $max
     * @return string
     */
    public function scale(int $min, int $max): string
    {
        return <<<ASCII
    
     <--{$min}-----------------------------------------------{$max}-->
        Min                                              Max
        
    ASCII;
    }
}
