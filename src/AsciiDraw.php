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

namespace Ouxsoft\LuckByDice;

/**
 * Class AsciiDraw
 * Aids in visualizing objects output to CLI
 * @package Ouxsoft\LuckByDice
 */
class AsciiDraw
{

    /**
     * @param int $value the outcome for the cup
     * @return string
     */
    public function cup(int $value) : string
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
     * @param int $roll
     * @param int $sides
     * @return string[]
     */
    public function dice(int $roll, int $sides) : array
    {
        $sides = str_pad((string) $sides, 5, '_', STR_PAD_BOTH);
        $roll = str_pad((string) $roll, 5, ' ', STR_PAD_BOTH);
        return [
            "   .-----.",
            "  /$sides/|",
            " |     | |",
            " |$roll| |",
            " |_____|/ "
        ];
    }

    /**
     * @param array $dice
     * @return string
     */
    public function collection(array $dice) : string
    {

        $drawnDice = [];
        foreach($dice as $die){
            $drawnDice[] = $this->dice($die['roll'], $die['sides']);
        }

        $screenWidth = exec('tput cols');
        $dieHeight = count($drawnDice[0]);
        $diceWidth = strlen($drawnDice[0][0]);
        $output = '';

        for($line = 0; $line < $dieHeight; $line++){
            foreach($drawnDice as $key => $drawnDie){
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
    public function scale(int $min, int $max) : string
    {
        return <<<ASCII
    
     <--{$min}-----------------------------------------------{$max}-->
        Min                                              Max
    
    
    ASCII;
    }
}
