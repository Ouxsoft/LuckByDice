Collection
==========

:Qualified name: ``Ouxsoft\LuckByDice\Collection``
:Implements: :interface:`CollectionInterface`

.. php:class:: Collection

  .. php:method:: public __construct (int $amount, int $sides[, int $modifier, int $multiplier])

    :class:`Collection` constructor.

    :param int $amount:
    :param int $sides:
    :param int $modifier:
      Default: ``1``
    :param int $multiplier:
      Default: ``1``

  .. php:method:: public count () -> int

    :returns: int -- 

  .. php:method:: public getDice () -> array

    Gets an array containing :class:`Dice`

    :returns: array -- 

  .. php:method:: public getMaxOutcome () -> int

    Get max potential of outcome

    :returns: int -- 

  .. php:method:: public getMaxPotential () -> int

    Get the maximum potential of a collections
Takes into account maximum outcome, modifier, and multiplier

    :returns: int -- 

  .. php:method:: public getMinOutcome () -> int

    Get min potential of outcome

    :returns: int -- 

  .. php:method:: public getMinPotential () -> int

    Get the minimum potential of a collections
Takes into account minimal outcome, modifier, and multiplier

    :returns: int -- 

  .. php:method:: public getModifier () -> int

    :returns: int -- 

  .. php:method:: public getMultiplier () -> int

    :returns: int -- 

  .. php:method:: public getNotation () -> string

    Get the notation for the collection

    :returns: string -- 

  .. php:method:: public getOutcomePercent () -> float

    Compute percent outcome of previous roll
Convert dice outcomes to percent outcomes. :class:`Dice` outcomes start counting at one. This formula works by starting the counts at 0. Example using 1d4: 1/4 = 0/3; 2/4 = 1/3; 3/4 = 2/3; 4/4 = 3/3

    :returns: float -- 

  .. php:method:: public getSides () -> int

    :returns: int -- 

  .. php:method:: public getTotal () -> int

    Gets total value of :class:`Collection` with modifier and multipier applied

    :returns: int -- 

  .. php:method:: public getValue () -> int

    Get value of rolled dice without modifier or multiplier

    :returns: int -- 

  .. php:method:: public roll () -> int

    Roll each dice and returns Total

    :returns: int -- 

