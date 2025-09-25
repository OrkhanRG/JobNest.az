<?php

namespace App\Enums;

enum SkillProficiencyLevel: string
{

    case BEGINNER = "beginner";
    case INTERMEDIATE = "intermediate";
    case ADVANCED = "advanced";
    case EXPERT = "expert";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::BEGINNER->value => 'başlanğıc səviyyə',
            self::INTERMEDIATE->value => 'orta səviyyə',
            self::ADVANCED->value => 'irəli səviyyə',
            self::EXPERT->value => 'ekspert səviyyə',
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
