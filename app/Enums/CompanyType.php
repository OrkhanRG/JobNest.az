<?php

namespace App\Enums;

enum CompanyType: string
{
    case MMC = 'mmc';
    case ASC = 'asc';
    case QSC = 'qsc';
    case INDIVIDUAL_ENTREPRENEUR = 'individual_entrepreneur';
    case COOPERATIVE = 'cooperative';
    case GOVERNMENT_ENTITY = 'government_entity';
    case NON_PROFIT = 'non_profit';

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::MMC->value => 'MMC (Məhdud Məsuliyyətli Cəmiyyət)',
            self::ASC->value => 'ASC (Açıq Səhmdar Cəmiyyəti)',
            self::QSC->value => 'QSC (Qapalı Səhmdar Cəmiyyəti)',
            self::INDIVIDUAL_ENTREPRENEUR->value => 'Fərdi Sahibkar',
            self::COOPERATIVE->value => 'Kooperativ',
            self::GOVERNMENT_ENTITY->value => 'Dövlət müəssisəsi',
            self::NON_PROFIT->value => 'Qeyri-kommersiya təşkilatı (QHT)'
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
