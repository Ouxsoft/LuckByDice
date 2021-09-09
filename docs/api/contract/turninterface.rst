TurnInterface
=============

:Qualified name: ``Ouxsoft\LuckByDice\Contract\TurnInterface``

.. php:interface:: TurnInterface

  .. php:method:: public __construct (Notation $notation, Cup $cup, Luck $luck[, string $expression])

    :param Notation $notation:
    :param Cup $cup:
    :param Luck $luck:
    :param string $expression:
      Default: ``null``

  .. php:method:: public __toString ()


  .. php:method:: public getCup ()


  .. php:method:: public getLimitMaxRoll ()


  .. php:method:: public getLimitMinRoll ()


  .. php:method:: public getLuck ()


  .. php:method:: public getMaxPotential ()


  .. php:method:: public getMinPotential ()


  .. php:method:: public getNotation ()


  .. php:method:: public roll ()


  .. php:method:: public setLimitMaxRoll (bool $limitMaxRoll)

    :param bool $limitMaxRoll:

  .. php:method:: public setLimitMinRoll (bool $limitMinRoll)

    :param bool $limitMinRoll:

  .. php:method:: public setLuck (int $luck)

    :param int $luck:

