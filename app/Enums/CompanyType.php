<?php

namespace App\Enums;

enum CompanyType: string
{
    case LLC = 'llc';
    case OJSC = 'ojsc';
    case CJSC = 'cjsc';
    case IE = 'ie';
    case STATE_ENTERPRISE = 'state_enterprise';

    case FOREIGN_COMPANY = 'foreign_company';
    case BRANCH_OFFICE = 'branch_office';
    case REP_OFFICE = 'representative_office';

    case NGO = 'ngo';
    case PUBLIC_UNION = 'public_union';
    case FOUNDATION = 'foundation';
    case COOPERATIVE = 'cooperative';

    case HOLDING = 'holding';
    case CONSORTIUM = 'consortium';
    case JOINT_VENTURE = 'joint_venture';
    case STARTUP = 'startup';

    case PUBLIC_LEGAL_ENTITY = 'public_legal_entity';
    case FARM_ENTERPRISE = 'farm_enterprise';
    case RELIGIOUS_ORGANIZATION = 'religious_organization';

    public static function getLabel(string $value): ?string
    {
        return match ($value) {
            self::LLC->value => 'Məhdud Məsuliyyətli Cəmiyyət (MMC)',
            self::OJSC->value => 'Açıq Səhmdar Cəmiyyəti (ASC)',
            self::CJSC->value => 'Qapalı Səhmdar Cəmiyyəti (QSC)',
            self::IE->value => 'Fərdi Sahibkar',
            self::STATE_ENTERPRISE->value => 'Dövlət Müəssisəsi',

            self::FOREIGN_COMPANY->value => 'Xarici Şirkət',
            self::BRANCH_OFFICE->value => 'Filial',
            self::REP_OFFICE->value => 'Nümayəndəlik',

            self::NGO->value => 'Qeyri-Hökumət Təşkilatı (QHT)',
            self::PUBLIC_UNION->value => 'İctimai Birlik',
            self::FOUNDATION->value => 'Fond',
            self::COOPERATIVE->value => 'Kooperativ',

            self::HOLDING->value => 'Holdinq Şirkəti',
            self::CONSORTIUM->value => 'Konsorsium',
            self::JOINT_VENTURE->value => 'Birgə Müəssisə',
            self::STARTUP->value => 'Startap',

            self::PUBLIC_LEGAL_ENTITY->value => 'Publik Hüquqi Şəxs',
            self::FARM_ENTERPRISE->value => 'Fermer Təsərrüfatı',
            self::RELIGIOUS_ORGANIZATION->value => 'Dini Təşkilat',

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
