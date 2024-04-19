<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case API_USER = 'api_user';

    public static function seedForUsers(self $value): int
    {
        return match ($value) {
            self::ADMIN => 1,
            self::USER => 2,
            self::API_USER => 3,
        };
    }
}
