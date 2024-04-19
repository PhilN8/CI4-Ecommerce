<?php

namespace App\Enums;

enum Category: string
{
    case MEN = 'Men';
    case WOMEN = 'Women';
    case CHILDREN = 'Children';
    case PETS = 'Pets';

    public static function seed(): array
    {
        return [
            ['category_name' => self::MEN->value],
            ['category_name' => self::WOMEN->value],
            ['category_name' => self::CHILDREN->value],
            ['category_name' => self::PETS->value],
        ];
    }
}
