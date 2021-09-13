Turn
====

:Qualified name: ``Ouxsoft\LuckByDice\Turn``
:Implements: :interface:`TurnInterface`

.. php:class:: Turn

  .. php:method:: public __construct (Notation $notation, Cup $cup, Luck $luck[, string $expression])

    :class:`Turn` constructor.

    :param Notation $notation:
    :param Cup $cup:
    :param Luck $luck:
    :param string $expression:
      Default: ``null``
    :returns: Turn::setByString()

  .. php:method:: public getCup () -> Cup

    Gets a :class:`Cup` containing all Collections of :class:`Dice`

    :returns: :class:`Cup` -- 

  .. php:method:: public getExtraBonus () -> int

    Get extra bonuses that could not be absorbed by dice. This could be used for determining critical, etc. in game engines, etc.

    :returns: int -- 

  .. php:method:: public getLuck () -> int

    Get :class:`Luck`

    :returns: int -- 

  .. php:method:: public getMaxPotential () -> int

    Get maximum potential of all Collections in :class:`Cup`

    :returns: int -- 

  .. php:method:: public getMinPotential () -> int

    Get minimum potential of all Collections in :class:`Cup`

    :returns: int -- 

  .. php:method:: public getNotation () -> string

    Get the dice notation for the entire cup

    :returns: string -- 

  .. php:method:: public getTotal () -> int

    Gets the Cups total which contains the outcome of all Collections of :class:`Dice`

    :returns: int -- 

  .. php:method:: public roll () -> int

    Roll each dice group, update luck, and return outcome with luck modifier applied

    :returns: int -- total

  .. php:method:: public setLuck (int $luck)

    Set :class:`Luck`

    :param int $luck:

