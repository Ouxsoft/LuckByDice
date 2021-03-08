|logo|

Welcome to LuckByDice Documentation
=====================================

Dice rolls add an element of chance and risk to game engines. They can be used to determine whether events within
a game engine occur while still allowing skill progression and a skilled player to figure out their odds of performing
the necessary actions.

This library simulates turns taken while rolling dice. But adds an ebb and flow to the outcome using
a luck.

.. code-block:: php

    require '../vendor/autoload.php';

    use Ouxsoft\LuckByDice\Factory\TurnFactory;

    $turn = TurnFactory::getInstance();
    $turn->set("1d4,2d5,6d6+3,d5*2");
    echo $turn->roll();

    // based on the outcome luck increased (+1) or decreased (-1)
    echo $turn->getLuck();

    // our luck effects our next roll
    echo $turn->roll();

This graph shows 10,000 consecutive `10d10` LuckByDice rolls. Notice how changes in luck that impact outcome and vice versa.
|graph|

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
   
   project/dice-notation.rst
   project/luck.rst
   project/code-of-conduct.rst
   Classes <api.rst>

Indices and tables
==================

* :ref:`genindex`
* :ref:`search`

.. |logo| image:: https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/logo.png
  :width: 400
  :alt: LuckByDice

.. |graph| image:: https://raw.githubusercontent.com/ouxsoft/LuckByDice/main/docs/statistics.png
  :width: 400
  :alt: Statistics