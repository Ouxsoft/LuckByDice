DefaultLuckAdjustment
=====================

:Qualified name: ``Ouxsoft\LuckByDice\LuckAdjustment\DefaultLuckAdjustment``
:Extends: :class:`AbstractLuckAdjustment`

.. php:class:: DefaultLuckAdjustment

  .. php:method:: public getAdjustment ([]) -> int

    Update luck based on percentage of roll outcome

    :param float $rollPercent:
      Default: ``0.5``
    :returns: int -- 

  .. php:method:: public getMax () -> int

    Get max

    :returns: int -- 

  .. php:method:: public getMin () -> int

    Get min

    :returns: int -- 

  .. php:method:: public getName () -> string

    Get name of adjustment class

    :returns: string -- 

  .. php:method:: public getPhi () -> float

    Get Phi / The Golden Ratio

    :returns: float -- 

  .. php:method:: public run (int $currentLuck[, float $rollPercent]) -> int

    :param int $currentLuck:
    :param float $rollPercent:
      Default: ``0.5``
    :returns: int -- 

  .. php:method:: public setMax (int $max)

    Set max

    :param int $max:
    :returns: void

  .. php:method:: public setMin (int $min)

    Set min

    :param int $min:
    :returns: void

