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

  .. php:method:: public __toString () -> string

    :returns: string -- 

  .. php:method:: public getCup () -> Cup

    Gets a :class:`Cup` containing all Collections

    :returns: :class:`Cup` -- 

  .. php:method:: public getLimitMaxRoll ()

    Get whether a limit is set on max roll


  .. php:method:: public getLimitMinRoll ()

    Get whether a limit is set on min roll


  .. php:method:: public getLuck () -> int

    Get :class:`Luck`

    :returns: int -- 

  .. php:method:: public getMaxPotential () -> int

    Get maximum potential of all collections in cup

    :returns: int -- 

  .. php:method:: public getMinPotential () -> int

    Get minimum potential of all collections in cup

    :returns: int -- 

  .. php:method:: public getNotation () -> string

    :returns: string -- 

  .. php:method:: public roll () -> int

    Roll each dice group, update luck, and return outcome with luck modifier applied

    :returns: int -- total

  .. php:method:: public setLimitMaxRoll (bool $limitMaxRoll)

    Set whether outcome modified by luck can exceed max dice potential

    :param bool $limitMaxRoll:

  .. php:method:: public setLimitMinRoll (bool $limitMinRoll)

    Set whether outcome modified by luck can exceed max dice potential

    :param bool $limitMinRoll:

  .. php:method:: public setLuck (int $luck)

    Set :class:`Luck`

    :param int $luck:

