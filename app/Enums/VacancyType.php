<?php

namespace App\Enums;

enum VacancyType: string
{
    case FULL_TIME = "full-time";
    case PART_TIME = "part-time";
    case CONTRACT = "contract";
    case INTERNSHIP = "internship";
    case FREELANCE = "freelance";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::FULL_TIME->value => 'tam ştat',
            self::PART_TIME->value => 'yarım ştat',
            self::CONTRACT->value => 'müqavilə',
            self::INTERNSHIP->value => 'təcrübəçi',
            self::FREELANCE->value => 'frilans',
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
