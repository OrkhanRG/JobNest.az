<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = "0";
    case FEMALE = "1";
    case OTHER = "2";
    case PREFER_NOT_TO_SAY = "3";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::MALE->value => 'Kişi',
            self::FEMALE->value => 'Qadın',
            self::OTHER->value => 'Digər',
            self::PREFER_NOT_TO_SAY->value => 'Deməməyə üstünlük verir',
            default => null
        };
    }

    public function options(): array
    {
        return array_map(fn ($c) => [
            "value" => $c->value,
            "label" => self::getLabel($c->value)
        ], self::cases());
    }
}
