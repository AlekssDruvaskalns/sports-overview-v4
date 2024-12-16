<?php

return [
    'basketball' => [
        'Position' => [
            'Point Guard (PG)',
            'Shooting Guard (SG)',
            'Small Forward (SF)',
            'Power Forward (PF)',
            'Center (C)',
        ],
        'Draft Info' => [
            'Draft Year' => 'numeric',
            'Draft Round' => 'numeric',
            'Draft Pick Number' => 'numeric',
        ],
        'Team/Club' => 'string',
    ],

    'boxing' => [
        'Stance' => [
            'Orthodox',
            'Southpaw',
            'Switch-hitter',
        ],
        'Dominant Hand' => [
            'Right-handed',
            'Left-handed',
            'Ambidextrous',
        ],
        'Weight Class' => [
            'Flyweight',
            'Lightweight',
            'Middleweight',
            'Heavyweight',
        ],
        'Professional Record' => [
            'Wins (W)' => 'numeric',
            'Losses (L)' => 'numeric',
            'Draws (D)' => 'numeric',
            'Knockouts (KOs)' => 'numeric',
        ],
        'Current Titles' => 'string',
    ],

    'mma' => [
        'Stance' => [
            'Orthodox',
            'Southpaw',
            'Switch-hitter',
        ],
        'Dominant Hand' => [
            'Right-handed',
            'Left-handed',
            'Ambidextrous',
        ],
        'Weight Class' => [
            'Flyweight',
            'Lightweight',
            'Middleweight',
            'Heavyweight',
        ],
        'Professional Record' => [
            'Wins (W)' => 'numeric',
            'Losses (L)' => 'numeric',
            'Draws (D)' => 'numeric',
            'Knockouts (KOs)' => 'numeric',
        ],
    ],

    'football' => [
        'Playing Position(s)' => [
            'Goalkeeper (GK)',
            'Defender (CB, LB, RB, etc.)',
            'Midfielder (CM, CAM, CDM, etc.)',
            'Forward (CF, LW, RW, etc.)',
        ],
        'Preferred Foot' => [
            'Right',
            'Left',
            'Ambidextrous',
        ],
        'Club' => 'string',
    ],
];
