<?php

namespace App\Enums;

enum ApplicationMethod: string
{
    case INTERNAL = "internal";
    case EXTERNAL = "external";
    case EMAIL = "email";

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::INTERNAL->value => 'Sayt üzərindən',
            self::EXTERNAL->value => 'Xarici link ilə',
            self::EMAIL->value => 'E-mail ilə',
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
