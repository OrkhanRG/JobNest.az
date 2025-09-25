<?php

namespace App\Enums;

enum InterviewType: string
{
    case PHONE = "phone";
    case VIDEO = "video";
    case IN_PERSON = "in-person";
    case GROUP = "group";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::PHONE->value => 'telefon',
            self::VIDEO->value => 'video',
            self::IN_PERSON->value => 'şəxsən',
            self::GROUP->value => 'qrup',
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
