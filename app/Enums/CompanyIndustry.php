<?php

namespace App\Enums;

enum CompanyIndustry: string
{
    case OIL_GAS = 'oil_gas';
    case ENERGY = 'energy';
    case TELECOM_IT = 'telecom_it';
    case BANK_FINANCE = 'bank_finance';
    case INSURANCE = 'insurance';
    case CONSTRUCTION = 'construction';
    case TRANSPORT_LOGISTICS = 'transport_logistics';
    case AGRICULTURE = 'agriculture';
    case FOOD_BEVERAGES = 'food_beverages';
    case RETAIL_WHOLESALE = 'retail_wholesale';
    case EDUCATION = 'education';
    case HEALTHCARE_PHARMA = 'healthcare_pharma';
    case TOURISM_HOSPITALITY = 'tourism_hospitality';
    case MEDIA_BROADCASTING = 'media_broadcasting';
    case GOVERNMENT_PUBLIC = 'government_public';
    case NON_PROFIT = 'non_profit';

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::OIL_GAS->value => 'Neft və Qaz (Oil & Gas)',
            self::ENERGY->value => 'Energetika (Elektrik, alternativ enerji, su)',
            self::TELECOM_IT->value => 'Telekommunikasiya və İT (Telecom & IT)',
            self::BANK_FINANCE->value => 'Bank və Maliyyə (Banking & Finance)',
            self::INSURANCE->value => 'Sığorta (Insurance)',
            self::CONSTRUCTION->value => 'Tikinti və İnşaat (Construction)',
            self::TRANSPORT_LOGISTICS->value => 'Nəqliyyat və Logistika (Transport & Logistics)',
            self::AGRICULTURE->value => 'Kənd Təsərrüfatı (Agriculture)',
            self::FOOD_BEVERAGES->value => 'Ərzaq və İçkilər (Food & Beverages)',
            self::RETAIL_WHOLESALE->value => 'Pərakəndə Satış / Ticarət (Retail & Wholesale)',
            self::EDUCATION->value => 'Təhsil (Education)',
            self::HEALTHCARE_PHARMA->value => 'Səhiyyə və Əczaçılıq (Healthcare & Pharmaceuticals)',
            self::TOURISM_HOSPITALITY->value => 'Turizm və Otelçilik (Tourism & Hospitality)',
            self::MEDIA_BROADCASTING->value => 'Media və Yayımçılıq (Media & Broadcasting)',
            self::GOVERNMENT_PUBLIC->value => 'Dövlət və İctimai Xidmətlər (Government & Public Services)',
            self::NON_PROFIT->value => 'Qeyri-kommersiya sektor (Non-Profit Sector, QHT-lər)'
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
