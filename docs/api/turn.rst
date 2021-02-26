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

  .. php:method:: public getLuck () -> int

    Get :class:`Luck`

    :returns: int -- 

  .. php:method:: public getNotation () -> string

    Get cup notation

    :returns: string -- "1d4+3*2,1d5,d5,10d5"

  .. php:method:: public roll () -> int

    Roll each dice group, update luck, and return outcome

    :returns: int -- total

  .. php:method:: public setLuck (int $luck)

    Set :class:`Luck`

    :param int $luck:

  .. php:method:: public setNotation (string $notation)

    Set cup notation

    :param string $notation:

