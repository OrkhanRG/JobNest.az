<?php

namespace App\Enums;

enum EducationLevel: string
{

    case HIGH_SCHOOL = "high-school";
    case BACHELORS = "bachelors";
    case MASTERS = "masters";
    case PHD = "phd";
    case VOCATIONAL = "vocational";
    case NO_DEGREE = "no-degree";

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::HIGH_SCHOOL->value => 'orta təhsil',
            self::BACHELORS->value => 'bakalavr',
            self::MASTERS->value => 'magistr',
            self::PHD->value => 'doktorantura',
            self::VOCATIONAL->value => 'peşə təhsili',
            self::NO_DEGREE->value => 'təhsil tələb olunmur',
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
