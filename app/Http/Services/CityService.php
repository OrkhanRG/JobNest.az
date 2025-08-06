<?php

namespace App\Http\Services;

use App\Http\Resources\CityResource;
use App\Models\City;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CityService extends BaseService
{
    use Loggable;

    protected City $city;

    public function getAll($params = null): array
    {
        $query = City::query();
        return $this->getListWithCount(
            $query,
            CityResource::class,
            [
                "filter" =>  $params,
                "with" => ["language", "country"]
            ],
            "lang_id"
        );
    }

    public function create($data): ?City
    {
        DB::beginTransaction();

        $insert_data = [
            "name" => $data["name"],
            "short_name" => $data["short_name"],
            "region_code" => $data["region_code"],
            "lang_id" => $data["lang_id"],
            "country_id" => $data["country_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        try {
            $city = City::query()->create($insert_data);

            DB::commit();
            return $city;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "CityService@create");

            return null;
        }
    }

    public function setCity(City $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->city) {
            return false;
        }

        $update_data = [
            "name" => $data["name"],
            "short_name" => $data["short_name"],
            "region_code" => $data["region_code"],
            "lang_id" => $data["lang_id"],
            "country_id" => $data["country_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        return $this->city->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->city) {
            return false;
        }

        return $this->city->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->city) {
            return false;
        }

        return $this->city->update([
            $data["key"] => $data["value"]
        ]);
    }
}
