<?php

/*

TODO

{
    min 1
    roll 5
    max 6
}

json

GET LuckByDice/turn
{
    "luck" : 36,
    "notation" : "2d6+2*3,1d4",
    "algoritum" : "goldenRatio"
}
response:
{
    total: 56,
    min: 1,
    max: 233,
    notation: "2d6,1d5+1*2",
    collections: {
    1 : {
        notation: "",
                modifier: "2",
                multiplier: "3",
                dice_ids : {
            1,2,3
                }
            },
        2: {
        ...
    }
    },
    dice: {
    1 : {
        'collection_id' : 1,
            'sides' : '3',
            'min' : 1,
            'max' : 3
        }
    },
    outcome: {
    natural : {
        'dice_id' : 1, # if dice_id is null then lucky dice, there was a extra 3 sided dice in the cup.
            'collection_id' : 1,
            'value' : 4,
        }
    modified : {

    }
}
    luck: 32
}

charmOutcome(){
luckModifer = 23;
        foreach($dice)
}


}


*/