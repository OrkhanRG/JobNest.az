<?php

namespace App\Http\Services;

use App\Http\Resources\LanguageResource;
use App\Models\Language;
use App\Models\Permission;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class LanguageService extends BaseService
{
    use Loggable;

    protected Language $language;

    public function getAll($params = null): array
    {
        $query = Language::query();
        return $this->getListWithCount(
            $query,
            LanguageResource::class,
            [
                "filter" =>  $params
            ],
            "sort_order"
        );
    }

    public function getByCode(string $code): LanguageResource
    {
        return new LanguageResource(Language::query()
            ->where("code", $code)
            ->where("is_active", "1")
            ->first());
    }

    public function getById(int $id): LanguageResource
    {
        return new LanguageResource(Language::query()
            ->where("id", $id)
            ->where("is_active", "1")
            ->first());
    }

    public function create($data): ?Language
    {
        DB::beginTransaction();

        $insert_data = [
            "name" => $data["name"],
            "code" => slugify($data["code"], Language::class, null, "code", "-"),
            "native_name" => $data["native_name"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        try {
            $lang_query = Language::query();
            $insert_data["sort_order"] = ($lang_query->max("sort_order") ?? 0) + 1;
            $insert_data["is_default"] = $lang_query->newQuery()->where("is_default", "1")->first() ? "0" : "1";
            $language = Language::query()->create($insert_data);

            DB::commit();
            return $language;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "LanguageService@create");

            return null;
        }
    }

    public function setLanguage(Language $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->language) {
            return false;
        }

        $update_data = [
            "name" => $data["name"],
            "code" => slugify($data["code"], Language::class, $this->language->id, "code", "-"),
            "native_name" => $data["native_name"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        return $this->language->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->language) {
            return false;
        }

        return $this->language->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->language) {
            return false;
        }

        if (trim($data["key"]) === "is_default") {
            return $this->setOnlyDefault();
        }

        return $this->language->update([
            $data["key"] => $data["value"]
        ]);
    }

    private function setOnlyDefault(): bool
    {
        if (!$this->language) {
            return false;
        }

        DB::beginTransaction();

        try {
            if (
                !$this->language->update(['is_default' => "1"])
            ){
                DB::rollBack();
                return false;
            }

            if (
                !$this->language->newQuery()
                    ->where('id', '!=', $this->language->id)
                    ->update(['is_default' => "0"])
            ){
                DB::rollBack();
                return false;
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->logErrorToFile($e, "LanguageService@setOnlyDefault");
            return false;
        }
    }
}
