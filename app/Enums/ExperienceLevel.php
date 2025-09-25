<?php

namespace App\Enums;

enum ExperienceLevel: string
{

    case ENTRY = "entry";
    case JUNIOR = "junior";
    case MID = "mid";
    case SENIOR = "senior";
    case LEAD = "lead";
    case EXPERT = "expert";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::ENTRY->value => 'təcrübəsiz',
            self::JUNIOR->value => 'az təcrübəli',
            self::MID->value => 'orta təcrübəli',
            self::SENIOR->value => 'yüksək təcrübəli',
            self::LEAD->value => 'rəhbər',
            self::EXPERT->value => 'ekspert',
            default => null
        };
    }

    public static function options(): array
    {
        return array_map(fn ($c) => [
            "value" => $c->value,
            "label" => self::getLabel($c->value)
        ], self::cases());
    }
}
