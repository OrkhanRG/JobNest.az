<?php

namespace App\Enums;

enum SalaryType: string
{

    case HOURLY = "hourly";
    case WEEKLY = "weekly";
    case MONTHLY = "monthly";
    case YEARLY = "yearly";
    case FIXED = "fixed";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::HOURLY->value => 'saatda',
            self::WEEKLY->value => 'həftədə',
            self::MONTHLY->value => 'ayda',
            self::YEARLY->value => 'ildə',
            self::FIXED->value => 'sabit',
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
