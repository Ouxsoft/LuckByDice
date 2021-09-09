Luck
====

:Qualified name: ``Ouxsoft\LuckByDice\Luck``
:Implements: :interface:`LuckInterface`

.. php:class:: Luck

  .. php:method:: public __construct ([])

    :class:`Luck` constructor.

    :param int $luck:
      Default: ``0``

  .. php:method:: public disable ()

    Disable luck


  .. php:method:: public enable ()

    Enable luck


  .. php:method:: public get () -> int

    :returns: int -- 

  .. php:method:: public getActiveStatus () -> bool

    Get whether enabled or disabled

    :returns: bool -- 

  .. php:method:: public getAdjustment () -> string

    Get name of selected adjustment algorithm

    :returns: string -- 

  .. php:method:: public getApplicablePercent () -> float

    Get applicable luck as random percentage based on current luck

    :returns: float -- 

  .. php:method:: public modify (int $number) -> int

    Modifies a number based on current luck

    :param int $number:
    :returns: int -- 

  .. php:method:: public set (int $luck)

    :param int $luck:

  .. php:method:: public setAdjustment ([])

    Set the luck adjustment algorithm

    :param int $algorithm:
      Default: ``0``

  .. php:method:: public update ([])

    Update luck based on percentage of roll outcome

    :param float $rollPercent:
      Default: ``0.5``

