<?php

namespace App\Enums;

enum VacancyStatus: string
{

    case DRAFT = "draft";
    case PENDING = "pending";
    case ACTIVE = "active";
    case PAUSED = "paused";
    case EXPIRED = "expired";
    case FILLED = "filled";
    case REJECTED = "rejected";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::DRAFT->value => 'qaralama',
            self::PENDING->value => 'gözləmədə',
            self::ACTIVE->value => 'aktiv',
            self::PAUSED->value => 'dayandırılıb',
            self::EXPIRED->value => 'vaxtı bitib',
            self::FILLED->value => 'doldurulub',
            self::REJECTED->value => 'rədd edilib',
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
