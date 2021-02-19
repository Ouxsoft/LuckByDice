Turn
====

:Qualified name: ``Ouxsoft\LuckByDice\Turn``

.. php:class:: Turn

  .. php:method:: public __construct (Parser $parser, Cup $cup[, string $expression])

    Expression constructor.

    :param Parser $parser:
    :param Cup $cup:
    :param string $expression:
      Default: ``null``
    :returns: Turn::setByString()

  .. php:method:: public __toString () -> string

    :returns: string -- 

  .. php:method:: public roll () -> int

    Roll each dice group and total

    :returns: int -- 

  .. php:method:: public set (string $expression)

    :param string $expression:

