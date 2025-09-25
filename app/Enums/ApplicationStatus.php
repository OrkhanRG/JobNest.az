<?php

namespace App\Enums;

enum ApplicationStatus: string
{

    case PENDING = "pending";
    case REVIEWED = "reviewed";
    case SHORTLISTED = "shortlisted";
    case INTERVIEW_SCHEDULED = "interview_scheduled";
    case INTERVIEW_COMPLETED = "interview_completed";
    case REJECTED = "rejected";
    case HIRED = "hired";
    case WITHDRAW = "withdraw";
    case ON_HOLD = "on_hold";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::PENDING->value => 'gözləmədə',
            self::REVIEWED->value => 'baxılıb',
            self::SHORTLISTED->value => 'qısa siyahıya alınıb',
            self::INTERVIEW_SCHEDULED->value => 'müsahibə planlaşdırılıb',
            self::INTERVIEW_COMPLETED->value => 'müsahibə tamamlanıb',
            self::REJECTED->value => 'rədd edilib',
            self::HIRED->value => 'işə götürülüb',
            self::WITHDRAW->value => 'geri çəkilib',
            self::ON_HOLD->value => 'gözləmədə saxlanılıb',
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
