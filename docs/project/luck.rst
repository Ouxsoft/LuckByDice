.. _luck:

Luck
++++++++++++++++++++++++++++++++++++

Luck is modified by and modifies the roll outcome. Thereby simulating both the natual elusivity and ebb and flow of
the concept of luck itself.

Dice rolls may exceed intended limits because luck is applied afterwards and this should be taken into account
when using library. For example a 1d6 dice roll may result in an outcome of 8 depending on luck. The game engine
must take this into account. Roll checks should use a greater than equal symbol.
This could also allow for the game engine to categorize the roll as a "Critical Hit", "Critical Hit x2", etc.

Formulas:

Luck Increases when Roll Outcome Percentage >= (1 / &phi;);

Luck Decreases when Roll Outcome Percentage <= (1 - (1 / &phi;))

Roll Outcome (x) = Round ((Random (0 – MaxRoll) + 1) * (Random (0 – Luck) *.01 + 1))
