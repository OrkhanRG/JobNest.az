<?php

namespace App\Http\Services;

use App\Constants\Status;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class CurrencyService extends BaseService
{
    use Loggable;

    protected Currency $currency;

    public function getAll($params = null): array
    {
        $query = Currency::query();
        return $this->getListWithCount(
            $query,
            CurrencyResource::class,
            [
                "filter" =>  $params
            ],
            "is_default",
            "DESC"
        );
    }

    public function getByCode(string $code): CurrencyResource
    {
        return new CurrencyResource(Currency::query()
            ->where("code", $code)
            ->where("is_active", Status::ACTIVE)
            ->first());
    }

    public function getById(int $id): CurrencyResource
    {
        return new CurrencyResource(Currency::query()
            ->where("id", $id)
            ->where("is_active", Status::ACTIVE)
            ->first());
    }

    public function create($data): ?Currency
    {
        DB::beginTransaction();

        $insert_data = [
            "code" => strtoupper(slugify($data["code"], Currency::class, null, "code", "-")),
            "name" => $data["name"],
            "symbol" => $data["symbol"],
            "is_active" => +$data["is_active"] ? Status::ACTIVE : Status::INACTIVE
        ];

        try {
            $insert_data["is_default"] = Currency::query()
                ->where("is_default", Status::ACTIVE)
                ->first() ? Status::INACTIVE : Status::ACTIVE;

            $currency = Currency::query()->create($insert_data);

            DB::commit();
            return $currency;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "CurrencyService@create");

            return null;
        }
    }

    public function setCurrency(Currency $Currency): self
    {
        $this->currency = $Currency;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->currency) {
            return false;
        }

        $update_data = [
            "code" => strtoupper(slugify($data["code"], Currency::class, $this->currency->id, "code", "-")),
            "name" => $data["name"],
            "symbol" => $data["symbol"],
            "is_active" => +$data["is_active"] ? Status::ACTIVE : Status::INACTIVE
        ];

        return $this->currency->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->currency) {
            return false;
        }

        return $this->currency->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->currency) {
            return false;
        }

        if (trim($data["key"]) === "is_default") {
            return $this->setOnlyDefault();
        }

        return $this->currency->update([
            $data["key"] => $data["value"]
        ]);
    }

    private function setOnlyDefault(): bool
    {
        if (!$this->currency) {
            return false;
        }

        DB::beginTransaction();

        try {
            if (
                !$this->currency->update(['is_default' => Status::ACTIVE])
            ){
                DB::rollBack();
                return false;
            }

            if (
                !$this->currency->newQuery()
                    ->where('id', '!=', $this->currency->id)
                    ->update(['is_default' => Status::INACTIVE])
            ){
                DB::rollBack();
                return false;
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->logErrorToFile($e, "CurrencyService@setOnlyDefault");
            return false;
        }
    }
}
