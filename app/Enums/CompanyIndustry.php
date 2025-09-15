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
    case MINING = 'mining';
    case TEXTILE = 'textile';
    case CHEMICAL = 'chemical';
    case DEFENSE = 'defense';
    case CARPET_MAKING = 'carpet_making';
    case WINE_MAKING = 'wine_making';
    case METALLURGY = 'metallurgy';
    case MACHINERY = 'machinery';
    case AUTOMOTIVE = 'automotive';
    case SHIPPING = 'shipping';
    case MANUFACTURING = 'manufacturing';
    case CONSULTING = 'consulting';
    case REAL_ESTATE = 'real_estate';
    case MARKETING_ADVERTISING = 'marketing_advertising';
    case LEGAL = 'legal';
    case HR_RECRUITMENT = 'hr_recruitment';
    case BEAUTY_COSMETICS = 'beauty_cosmetics';
    case ENTERTAINMENT = 'entertainment';
    case SPORTS_FITNESS = 'sports_fitness';
    case FURNITURE = 'furniture';
    case FASHION_APPAREL = 'fashion_apparel';
    case ECOMMERCE = 'ecommerce';
    case SOFTWARE_DEVELOPMENT = 'software_development';
    case CYBERSECURITY = 'cybersecurity';
    case TELECOMMUNICATIONS = 'telecommunications';
    case RESEARCH_DEVELOPMENT = 'research_development';
    case EVENT_MANAGEMENT = 'event_management';
    case ARCHITECTURE_DESIGN = 'architecture_design';
    case ENVIRONMENTAL = 'environmental';
    case WASTE_MANAGEMENT = 'waste_management';
    case PRINTING_PACKAGING = 'printing_packaging';
    case JEWELRY = 'jewelry';
    case ART_CULTURE = 'art_culture';
    case AEROSPACE = 'aerospace';
    case UTILITIES = 'utilities';
    case IMPORT_EXPORT = 'import_export';

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
            self::NON_PROFIT->value => 'Qeyri-kommersiya sektor (Non-Profit Sector, QHT-lər)',
            self::MINING->value => 'Mədənçilik Sənayesi (Mining Industry)',
            self::TEXTILE->value => 'Toxuculuq Sənayesi (Textile Industry)',
            self::CHEMICAL->value => 'Kimya Sənayesi (Chemical Industry)',
            self::DEFENSE->value => 'Müdafiə Sənayesi (Defense Industry)',
            self::CARPET_MAKING->value => 'Xalçaçılıq (Carpet Making)',
            self::WINE_MAKING->value => 'Şərabçılıq (Wine Making)',
            self::METALLURGY->value => 'Metallurgiya (Metallurgy)',
            self::MACHINERY->value => 'Maşınqayırma (Machinery)',
            self::AUTOMOTIVE->value => 'Avtomobil Sənayesi (Automotive Industry)',
            self::SHIPPING->value => 'Gəmiçilik (Shipping)',
            self::MANUFACTURING->value => 'İstehsalat (Manufacturing)',
            self::CONSULTING->value => 'Konsaltinq Xidmətləri (Consulting Services)',
            self::REAL_ESTATE->value => 'Daşınmaz Əmlak (Real Estate)',
            self::MARKETING_ADVERTISING->value => 'Marketinq və Reklam (Marketing & Advertising)',
            self::LEGAL->value => 'Hüquq Xidmətləri (Legal Services)',
            self::HR_RECRUITMENT->value => 'İnsan Resursları və İşə Qəbul (HR & Recruitment)',
            self::BEAUTY_COSMETICS->value => 'Gözəllik və Kosmetika (Beauty & Cosmetics)',
            self::ENTERTAINMENT->value => 'Əyləncə Sənayesi (Entertainment)',
            self::SPORTS_FITNESS->value => 'İdman və Fitness (Sports & Fitness)',
            self::FURNITURE->value => 'Mebel Sənayesi (Furniture Industry)',
            self::FASHION_APPAREL->value => 'Moda və Geyim (Fashion & Apparel)',
            self::ECOMMERCE->value => 'Elektron Ticarət (E-commerce)',
            self::SOFTWARE_DEVELOPMENT->value => 'Proqram Təminatı (Software Development)',
            self::CYBERSECURITY->value => 'Kiber Təhlükəsizlik (Cybersecurity)',
            self::TELECOMMUNICATIONS->value => 'Telekommunikasiya (Telecommunications)',
            self::RESEARCH_DEVELOPMENT->value => 'Tədqiqat və İnkişaf (R&D)',
            self::EVENT_MANAGEMENT->value => 'Tədbirlərin Təşkili (Event Management)',
            self::ARCHITECTURE_DESIGN->value => 'Memarlıq və Dizayn (Architecture & Design)',
            self::ENVIRONMENTAL->value => 'Ətraf Mühit Xidmətləri (Environmental Services)',
            self::WASTE_MANAGEMENT->value => 'Tullantıların İdarə Edilməsi (Waste Management)',
            self::PRINTING_PACKAGING->value => 'Çap və Qablaşdırma (Printing & Packaging)',
            self::JEWELRY->value => 'Zərgərlik (Jewelry)',
            self::ART_CULTURE->value => 'İncəsənət və Mədəniyyət (Art & Culture)',
            self::AEROSPACE->value => 'Aerokosmik Sənaye (Aerospace)',
            self::UTILITIES->value => 'Kommunal Xidmətlər (Utilities)',
            self::IMPORT_EXPORT->value => 'İdxal və İxrac (Import & Export)',
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
