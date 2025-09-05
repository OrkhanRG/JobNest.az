<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Models\Company;
use App\Models\SocialLink;
use App\Models\User;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class SocialLinkService extends BaseService
{
    use Loggable;

    protected User $user;

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function create(array $data): bool
    {
        if (!$this->user) {
            return false;
        }

        $model = match(true) {
            hasRole(App::ROLE_CANDIDATE) => $this->user->candidate,
            hasRole(App::ROLE_COMPANY) => $this->user->company,
            default => null
        };

        if (!$model) {
            return false;
        }

        $social_links = [
            "facebook" => $data["facebook"] ?? null,
            "twitter" => $data["twitter"] ?? null,
            "linkedin" => $data["linkedin"] ?? null,
            "whatsapp" => $data["whatsapp"] ?? null,
            "instagram" => $data["instagram"] ?? null,
            "youtube" => $data["youtube"] ?? null,
        ];

        try {
            DB::beginTransaction();

            $model->socialLinks()->delete();
            $insert_data = [];
            foreach ($social_links as $platform => $url) {
                if (!empty($url)) {
                    $insert_data[] = [
                        'platform' => $platform,
                        'url' => $url,
                        'linkable_id' => $model->id,
                        'linkable_type' => get_class($model),
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }

            if (!empty($insert_data)) {
                SocialLink::query()->insert($insert_data);
            }

            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "SocialLinkService@create");
            return false;
        }
    }
}
