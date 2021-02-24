|alt text|

Welcome to LuckByDice Documentation
=====================================

Dice rolls add an element of chance and risk to game engines. Dice roll outcome can be used to events occurring.
Even with a roll a good player can figure out their odds of performing the necessary actions. Note that a roll is
affected by the stat Luck and in return affect the stat Luck.

Formula:

Roll Outcome (x) = Round ((Random (0 – MaxRoll) + 1) * (Random (0 – Luck) *.01 + 1))


.. code-block:: php

    require '../vendor/autoload.php';

    use Ouxsoft\LuckByDice\Factory\TurnFactory;

    $turn = TurnFactory::getInstance();
    $turn->set("1d4,2d5,6d6+3,d5*2");
    echo $turn->roll();


Installation
------------

Get an instance of LuckByDice up and running in less than 5 minutes.

LuckByDice is available on Packagist.

Install with Composer:

.. code-block:: bash

    composer require ouxsoft/luckbydice

That's it. You're done! Please take the rest of the time to read our docs.

Contribute
----------

- Issue Tracker: https://github.com/ouxsoft/LuckByDice/issues
- Source Code: https://github.com/ouxsoft/LuckByDice

Navigation
==========

.. toctree::
   :maxdepth: 1
   :caption: Project Information
   
   Classes <api.rst>

Indices and tables
==================

* :ref:`genindex`
* :ref:`search`

.. |alt text| image:: https://github.com/ouxsoft/LuckByDice/raw/master/docs/logo.jpg