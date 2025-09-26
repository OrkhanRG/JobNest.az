<?php

namespace App\Enums;

enum EducationLevel: string
{

    case HIGH_SCHOOL = "high-school";
    case HIGH_SCHOOL_TECHNICAL = "high-school-technical";
    case VOCATIONAL = "vocational";
    case BACHELORS = "bachelors";
    case MASTERS = "masters";
    case PHD = "phd";
    case NO_DEGREE = "no-degree";

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::HIGH_SCHOOL->value => 'Orta',
            self::HIGH_SCHOOL_TECHNICAL->value => 'Orta Texniki',
            self::VOCATIONAL->value => 'Peşə',
            self::BACHELORS->value => 'Ali',
            self::MASTERS->value => 'Magistr',
            self::PHD->value => 'Doktorantura',
            self::NO_DEGREE->value => 'Təhsil tələb olunmur',
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
