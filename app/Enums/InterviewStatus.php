<?php

namespace App\Enums;

enum InterviewStatus: string
{
    case SCHEDULED = "scheduled";
    case COMPLETED = "completed";
    case CANCELLED = "cancelled";
    case RESCHEDULED = "rescheduled";

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::SCHEDULED->value => 'planlaşdırılıb',
            self::COMPLETED->value => 'tamamlanıb',
            self::CANCELLED->value => 'ləğv edilib',
            self::RESCHEDULED->value => 'yenidən planlaşdırılıb',
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
