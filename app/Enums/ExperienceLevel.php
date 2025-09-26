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
            self::ENTRY->value => 'Təcrübəsiz',
            self::JUNIOR->value => 'Yeni Başlayan (Junior)',
            self::MID->value => 'Orta Səviyyə (Mid-level)',
            self::SENIOR->value => 'Yüksək Səviyyə (Senior)',
            self::LEAD->value => 'Rəhbər (Lead)',
            self::EXPERT->value => 'Ekspert',
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
