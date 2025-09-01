<?php

namespace App\Http\Services;

use App\Http\Resources\JobCategoryTranslationResource;
use App\Models\JobCategoryTranslation;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class JobCategoryTranslationService extends BaseService
{
    use Loggable;

    protected JobCategoryTranslation $jobCategoryTranslation;

    public function getAll($params = null): array
    {
        $query = JobCategoryTranslation::query();
        return $this->getListWithCount(
            $query,
            JobCategoryTranslationResource::class,
            [
                "filter" =>  $params,
                "with" => ["language", "category"]
            ],
            "job_category_id",
            "desc"
        );
    }

    public function create($data): ?JobCategoryTranslation
    {
        DB::beginTransaction();

        $insert_data = [
            "lang_id" => $data["lang_id"],
            "job_category_id" => $data["job_category_id"],
            "name" => $data["name"],
            "description" => $data["description"],
            "seo_title" => $data["seo_title"],
            "seo_description" => $data["seo_description"],
            "seo_keywords" => $data["seo_keywords"]
        ];

        try {
            $jobCategoryTranslation = JobCategoryTranslation::query()->create($insert_data);

            DB::commit();
            return $jobCategoryTranslation;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "JobCategoryTranslationService@create");

            return null;
        }
    }

    public function setJobCategoryTranslation(JobCategoryTranslation $jobCategoryTranslation): self
    {
        $this->jobCategoryTranslation = $jobCategoryTranslation;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->jobCategoryTranslation) {
            return false;
        }

        $update_data = [
            "lang_id" => $data["lang_id"],
            "job_category_id" => $data["job_category_id"],
            "name" => $data["name"],
            "description" => $data["description"],
            "seo_title" => $data["seo_title"],
            "seo_description" => $data["seo_description"],
            "seo_keywords" => $data["seo_keywords"]
        ];

        return $this->jobCategoryTranslation->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->jobCategoryTranslation) {
            return false;
        }

        return $this->jobCategoryTranslation->delete() ;
    }
}
