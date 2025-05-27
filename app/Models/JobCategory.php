<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class JobCategory extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "description",
        "icon",
        "is_active",
        "parent_id"
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(JobCategory::class, "parent_id")->with("children");
    }

    #[Scope]
    public function filter($query, array $params)
    {
        $query->doesntHave("parent")->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (!!$params["with"]) {
            $with = is_array($params["with"]) ? $params["with"] : [$params["with"]];
            $withRelations = [];

            foreach ($with as $relation) {
                if ($relation === 'children') {
                    $withRelations['children'] = function ($query) use ($params) {
                        if (isset($params['is_active']) && in_array($params['is_active'], ['0', '1'])) {
                            $query->where('is_active', $params['is_active']);
                        }

                        if ($params["keyword"]) {
                            $query->where('name', 'like', '%' . $params["keyword"] . '%')
                                ->orWhere('slug', 'like', '%' . $params["keyword"] . '%')
                                ->orWhere('description', 'like', '%' . $params["keyword"] . '%');
                        }
                    };
                } else {
                    $withRelations[] = $relation;
                }
            }

            $query->with($withRelations);
        }

        if ($params["keyword"]) {
            $query = $query->where(function ($q) use ($params) {
                $q->where('name', 'like', '%' . $params["keyword"] . '%')
                    ->orWhere('slug', 'like', '%' . $params["keyword"] . '%')
                    ->orWhere('description', 'like', '%' . $params["keyword"] . '%');
            })->orWhereHas("children", function ($childQ) use ($params) {
                $childQ->where('name', 'like', '%' . $params["keyword"] . '%')
                    ->orWhere('slug', 'like', '%' . $params["keyword"] . '%')
                    ->orWhere('description', 'like', '%' . $params["keyword"] . '%');
            });
        }

        if (in_array($params["is_active"], ["0", "1"])) {
            $query->where("is_active", $params["is_active"]);
        }

        if ($params["limit"]) {
            $query = $query->limit($params["limit"]);
        }

        if ($params["offset"]) {
            $query = $query->offset($params["offset"]);
        }

        return $query->orderBy("id", "desc")->get();
    }
}
