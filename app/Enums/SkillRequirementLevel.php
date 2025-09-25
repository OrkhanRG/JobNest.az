<?php

namespace App\Enums;

enum SkillRequirementLevel: string
{
    case REQUIRED = "required";
    case PREFERRED = "preferred";
    case NICE_TO_HAVE = "nice_to_have";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::REQUIRED->value => 'tələb olunur',
            self::PREFERRED->value => 'üstünlük verilir',
            self::NICE_TO_HAVE->value => 'olması xoşdur',
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
