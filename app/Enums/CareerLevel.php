<?php

namespace App\Enums;

enum CareerLevel: string
{
    case STUDENT = "0";
    case ENTRY = "1";
    case EXPERIENCED = "2";
    case MANAGER = "3";
    case SENIOR_MANAGER = "4";
    case EXECUTIVE = "5";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::STUDENT->value => 'Tələbə',
            self::ENTRY->value => 'Giriş',
            self::EXPERIENCED->value => 'Təcrübəli',
            self::MANAGER->value => 'Menecer',
            self::SENIOR_MANAGER->value => 'Baş menecer',
            self::EXECUTIVE->value => 'İcraçı',
            default => null
        };
    }
}
