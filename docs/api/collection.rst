Collection
==========

:Qualified name: ``Ouxsoft\LuckByDice\Collection``
:Implements: :interface:`CollectionInterface`

.. php:class:: Collection

  .. php:method:: public __construct (int $amount, int $sides, int $modifier, int $multiplier)

    DiceGroup constructor.

    :param int $amount:
    :param int $sides:
    :param int $modifier:
    :param int $multiplier:

  .. php:method:: public count () -> int

    :returns: int -- 

  .. php:method:: public getMaxOutcome () -> int

    Get max potential of outcome

    :returns: int -- 

  .. php:method:: public getModifier () -> int

    :returns: int -- 

  .. php:method:: public getMultiplier () -> int

    :returns: int -- 

  .. php:method:: public getOutcomePercent () -> float

    Compute percent outcome of previous roll

    :returns: float -- 

  .. php:method:: public getSides () -> int

    :returns: int -- 

  .. php:method:: public roll () -> int

    Roll each dice for total then add modifier and apply multiplier

    :returns: int -- 

