Notation
========

:Qualified name: ``Ouxsoft\LuckByDice\Notation``
:Implements: :interface:`NotationInterface`

.. php:class:: Notation

  .. php:method:: public __construct (Cup $cup)

    :class:`Notation` constructor.

    :param Cup $cup:

  .. php:method:: public __toString () -> Notation::get()

    :returns: :class:`Notation::get()` -- 

  .. php:method:: public get () -> string

    Get cup notation

    :returns: string -- "1d4+3*2,1d5,d5,10d5"

  .. php:method:: public getSeparator () -> string

    :returns: string -- 

  .. php:method:: public set (string $notation)

    Set cup notation

    :param string $notation:

  .. php:method:: public setSeparator ($separator)

    :param $separator:

  .. php:method:: private decode (string $expression)

    :param string $expression:

  .. php:method:: private encode () -> string

    :returns: string -- 

