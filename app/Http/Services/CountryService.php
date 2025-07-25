<?php

namespace App\Http\Services;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountryService extends BaseService
{
    use Loggable;

    protected Country $country;

    public function getAll($params = null): array
    {
        $query = Country::query();
        return $this->getListWithCount(
            $query,
            CountryResource::class,
            [
                "filter" =>  $params,
                "width" => "language"
            ],
            "short_name"
        );
    }

    public function create($data): ?Country
    {
        DB::beginTransaction();

        $insert_data = [
            "name" => $data["name"],
            "short_name" => Str::slug($data["short_name"], "_"),
            "phone_prefix" => $data["phone_prefix"],
            "lang_id" => $data["lang_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        try {
            $country = Country::query()->create($insert_data);

            DB::commit();
            return $country;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "CountryService@create");

            return null;
        }
    }

    public function setCountry(Country $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->country) {
            return false;
        }

        $update_data = [
            "name" => $data["name"],
            "short_name" => Str::slug($data["short_name"], "_"),
            "phone_prefix" => $data["phone_prefix"],
            "lang_id" => $data["lang_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        return $this->country->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->country) {
            return false;
        }

        return $this->country->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->country) {
            return false;
        }

        return $this->country->update([
            $data["key"] => $data["value"]
        ]);
    }
}
