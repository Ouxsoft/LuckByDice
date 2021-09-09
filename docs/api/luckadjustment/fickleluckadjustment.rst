FickleLuckAdjustment
====================

:Qualified name: ``Ouxsoft\LuckByDice\LuckAdjustment\FickleLuckAdjustment``
:Extends: :class:`AbstractLuckAdjustment`

.. php:class:: FickleLuckAdjustment

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

