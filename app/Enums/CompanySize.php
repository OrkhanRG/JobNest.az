<?php

namespace App\Enums;

enum CompanySize: string
{
    case ONE_TO_TEN = "0";
    case ELEVEN_FIFTY= "1";
    case FIFTY_ONE_TWO_HUNDRED = "2";
    case TWO_HUNDRED_ONE_FIVE_HUNDRED = "3";
    case FIVE_HUNDRED_ONE_THOUSAND = "4";
    case THOUSAND_PLUS = "5";

    public static function getLabel(string $value): ?string
    {
        return match($value) {
            self::ONE_TO_TEN->value => '1-10',
            self::ELEVEN_FIFTY->value => '11-50',
            self::FIFTY_ONE_TWO_HUNDRED->value => '51-200',
            self::TWO_HUNDRED_ONE_FIVE_HUNDRED->value => '201-500',
            self::FIVE_HUNDRED_ONE_THOUSAND->value => '501-1000',
            self::THOUSAND_PLUS->value => '1000+',
            default => null
        };
    }
}
