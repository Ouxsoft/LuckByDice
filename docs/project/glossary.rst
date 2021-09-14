.. _glossary:

Glossary
++++++++++++++++++++++++++++++++++++

Turn
==========
A Turn rolls a Cup containing a Collection of Dice

Dice Notation
=============
A dice notation is a string used to represent a Cup of dice.

Cup
=============
A Cup holds and allows iteration of one ore more Collection of dice.

Collection
=============
A Collection resides inside a Cup and contains one or more Dice with same amount of sides.
A Collection also features a modifier and a multiplier for the roll outcome.

Dice
=============
A dice has two or more sides.
A dice can be roll.
A dice features a value after rolling.

Luck
=============
Luck simulates both the natual elusivity and ebb and flow of the concept of luck itself.

Luck is modified by and modifies the Dice's value.

.. code-block:: pseudo

    Roll Outcome (x) = Round ((Random (0 – MaxRoll) + 1) * (Random (0 – Luck) *.01 + 1))

It is more probable that dice roll outcomes will increase when luck increases.

.. code-block:: pseudo

    Luck Increases when Roll Outcome Percentage >= (1 / &phi;);

It is more probable that dice roll outcomes will decrease when luck decreases.

.. code-block:: pseudo

    Luck Decreases when Roll Outcome Percentage <= (1 - (1 / &phi;))

A Dice's outcome may not exceed the sides of the dice no matter how lucky the player.
A 6 sided dice will never yield 7. At most it may yield 6. At least it may yield 1.


Bonus
=============
If applicable luck is higher than dice can absorb that value is represented as a
bonus.
A bonus is just a number which displays how much of a luck modifier could not be absorbed into dice because
they were already at max value.
Bonuses can be used for game engine to categorize the roll as a "Critical Hit", "Critical Hit x2", etc. if desired.


Algorithms
=============
Algorithms are used to calculate luck.
