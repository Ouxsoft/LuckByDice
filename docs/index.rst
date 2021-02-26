|logo|

Welcome to LuckByDice Documentation
=====================================

Dice rolls add an element of chance and risk to game engines. They can be used to determine whether events occurring
withing a game engine while allowing a skilled player to figure out their odds of performing the necessary actions.

This library simulates turns taken rolling dice. But in addition, it features a concept of luck that is modified by
and modifies the roll outcome. Thereby simulating both the natual elusivity and ebb and flow of luck itself.

Formulas:

.. code-block:: txt

    Roll Outcome (x) = Round ((Random (0 – MaxRoll) + 1) * (Random (0 – Luck) *.01 + 1))
    Luck Increases when Roll Outcome Percentage >= (1 / &phi;);
    Luck Decreases when Roll Outcome Percentage <= (1 - (1 / &phi;))

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

   project/code-of-conduct.rst
   Classes <api.rst>

Indices and tables
==================

* :ref:`genindex`
* :ref:`search`

.. |logo| image:: https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/logo.png
  :width: 400
  :alt: LuckByDice