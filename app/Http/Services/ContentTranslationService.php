<?php

namespace App\Http\Services;

use App\Http\Resources\ContentTranslationResource;
use App\Models\ContentTranslation;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContentTranslationService extends BaseService
{
    use Loggable;

    protected ContentTranslation $content_translation;

    public function getAll($params = null): array
    {
        $query = ContentTranslation::query();
        return $this->getListWithCount(
            $query,
            ContentTranslationResource::class,
            [
                "filter" =>  $params,
                "with" => "language"
            ],
            "id",
            "desc"
        );
    }

    public function create($data): ?ContentTranslation
    {
        DB::beginTransaction();

        $insert_data = [
            "key" => Str::slug($data["key"], "_"),
            "group" => $data["group"],
            "value" => $data["value"],
            "lang_id" => $data["lang_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        try {
            $content_translation = ContentTranslation::query()->create($insert_data);

            DB::commit();
            return $content_translation;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "ContentTranslationService@create");

            return null;
        }
    }

    public function setContentTranslation(ContentTranslation $content_translation): self
    {
        $this->content_translation = $content_translation;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->content_translation) {
            return false;
        }

        $update_data = [
            "key" => Str::slug($data["key"], "_"),
            "group" => $data["group"],
            "value" => $data["value"],
            "lang_id" => $data["lang_id"],
            "is_active" => +$data["is_active"] ? "1" : "0"
        ];

        return $this->content_translation->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->content_translation) {
            return false;
        }

        return $this->content_translation->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->content_translation) {
            return false;
        }

        return $this->content_translation->update([
            $data["key"] => $data["value"]
        ]);
    }
}
