<?php

namespace App\Enums;

enum SubCategory: string
{
    case FORMAL = 'Formal';
    case CASUAL = 'Casual';
    case SPORTS = 'Sports';

    public static function petSubCategories(): array
    {
        return ['Dogs', 'Cats', 'Other'];
    }
}
