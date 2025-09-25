<?php

namespace App\Enums;

enum WorkplaceType: string
{
    case ON_SITE = "on-site";
    case REMOTE = "remote";
    case HYBRID = "hybrid";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::ON_SITE->value => 'ofis',
            self::REMOTE->value => 'uzaqdan',
            self::HYBRID->value => 'hibrid',
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
