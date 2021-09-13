.. _luck:

Luck
++++++++++++++++++++++++++++++++++++

Luck is modified by and modifies the roll outcome. Thereby simulating both the natual elusivity and ebb and flow of
the concept of luck itself.

No matter how lucky the player, a Dice's outcome may not exceed the sides of the dice. Meaning a 6 sided dice will never
yield 7; at most it may yield 7 and at least it may yield 1.

Bonus:

Luck modifies the outcome of the dice. If luck is higher than dice can absorb that value is represented as a
bonus. A bonus is just a number which displays how much of a luck modifier could not be absorbed into dice because
they were already at max value. Bonuses can be used for game engine to categorize the roll as a "Critical Hit",
"Critical Hit x2", etc. if desired.


Algorithms:

Algorithms for luck can vary. But the default luck is based on a the follow:

Luck Increases when Roll Outcome Percentage >= (1 / &phi;);

Luck Decreases when Roll Outcome Percentage <= (1 - (1 / &phi;))

Roll Outcome (x) = Round ((Random (0 – MaxRoll) + 1) * (Random (0 – Luck) *.01 + 1))

