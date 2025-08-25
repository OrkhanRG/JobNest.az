<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;

class UpdateCurrencyRatesFromCBA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update-cba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency exchange rates from Central Bank of Azerbaijan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = date('d.m.Y');
        $url = "https://www.cbar.az/currencies/{$today}.xml";

        $xmlContent = @simplexml_load_file($url);

        if (!$xmlContent) {
            $this->error("Could not load currency data from AMB");
            return;
        }

        foreach ($xmlContent->ValType as $valType) {
            foreach ($valType->Valute as $valute) {
                $code = (string) $valute['Code'];
                $rate = (float) str_replace(',', '.', $valute->Value);

                $currency = Currency::query()->where('code', strtoupper($code))->first();
                if ($currency) {
                    $currency->exchange_rate = $rate;
                    $currency->save();
                    $this->info("Updated: {$code} -> {$rate}");
                }
            }
        }

        $this->info("All currency rates updated from AMB.");
    }
}
