Luck
====

:Qualified name: ``Ouxsoft\LuckByDice\Luck``
:Implements: :interface:`LuckInterface`

.. php:class:: Luck

  .. php:method:: public __construct ([])

    :class:`Luck` constructor.

    :param int $luck:
      Default: ``0``

  .. php:method:: public get () -> int

    :returns: int -- 

  .. php:method:: public getPhi () -> float

    Get Phi / The Golden Ratio

    :returns: float -- 

  .. php:method:: public set (int $luck)

    :param int $luck:

  .. php:method:: public update ([])

    Update luck based on percentage of roll outcome

    :param float $rollPercent:
      Default: ``0.5``

