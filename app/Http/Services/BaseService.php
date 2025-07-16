<?php

namespace App\Http\Services;

use App\Constants\LoadLimit;
use Illuminate\Database\Eloquent\Builder;

class BaseService
{
    protected function getListWithCount(
        Builder $query,
        string $resourceClass,
        array $params = [],
        string $orderBy = 'id',
        string $direction = 'asc',
        bool $paginate = false,
        int $perPage = LoadLimit::DEFAULT
    ): array {
        if (isset($params['with']) && !!$params['with']) {
            $query->with($params['with']);
        }

        if (isset($params['filter']) && !!$params['filter']) {
            $query->filter($params['filter']);
        }

        $query->orderBy($orderBy, $direction);

        if ($paginate) {
            $result = $query->paginate($perPage);
            return [
                'list' => $resourceClass::collection($result->items()),
                'count' => $result->total(),
                'pagination' => [
                    'current_page' => $result->currentPage(),
                    'last_page' => $result->lastPage(),
                    'per_page' => $result->perPage(),
                ],
            ];
        } else {
            $result = $query->get();
            $total_count = $result->first()?->total_count ?? $result->count() ?? 0;

            $result->each(function ($item) {
                unset($item->total_count);
            });

            return [
                'list' => $resourceClass::collection($result),
                'count' => $total_count
            ];
        }
    }
}
