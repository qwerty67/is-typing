<?php

namespace App\Structures\Abstracts;

use Illuminate\Database\Eloquent\Builder;


abstract class  RepositoryAbstract
{

    /**
     * Build query over entity and graph filter type.
     *
     * @param $entity
     * @param array $filter
     * @param array $filterCallback
     * @param array $sortCallback
     *
     * @return Builder
     */
    protected function getEloquentBuilder(
        $entity,
        array $filter,
        array $filterCallback = [],
        array $sortCallback = []
    )
    {
        if (is_array($filter) && isset($filter['filters'])) {
            $entityModel = $this->queryFilters($entity, $filter['filters'], $filterCallback);
        } else {
            $entityModel = $entity::query();
        }

        if (isset($filter['sort'])) {
            $field = $filter['sort']['field'];

            if (isset($sortCallback[$field])) {
                $sortCallback[$field]($entityModel, $filter['sort']);
            } else {
                $entityModel->orderBy($filter['sort']['field'], $filter['sort']['dir']);
            }

        }

        if (isset($filter['limit'])) {
            $entityModel->limit($filter['limit']);
        } else {
            $entityModel->limit(50);
        }

        if (isset($filter['offset'])) {
            $entityModel->offset($filter['offset']);
        }

        return $entityModel;
    }

    /**
     * Add filters to built query.
     *
     * @param $entity
     * @param $filters
     * @param $callback
     *
     * @return Builder
     */
    private function queryFilters($entity, $filters, $callback): Builder
    {
        /** @var Builder $query */
        $query = $entity::query();

        if ($filters) {
            $query->where(function ($q) use ($entity, $filters, $callback) {
                foreach ($filters as $filter) {
                    if (isset($callback[$filter['field']])) {
                        if ($callback[$filter['field']] instanceof \Closure) {
                            $callback[$filter['field']]($q, $filter);
                            continue;
                        }
                    }

                    $field = $entity::tfn($filter['field']);
                    $value = null;

                    if (array_key_exists('value', $filter)) {
                        $value = $filter['value'];
                    }

                    $q = $this->appendFilterToQuery($q, $filter['op'], $field, $value);
                }
            });
        }

        return $query;
    }

    /**
     * Append query regarding to its filter type.
     *
     * @param Builder $query
     * @param $operator
     * @param $field
     * @param $value
     *
     * @return $this|\Illuminate\Database\Query\Builder|static
     */
    private function appendFilterToQuery(Builder $query, $operator, $field, $value)
    {
        switch (strtoupper($operator)) {
            case 'IS':
                return $query->whereNull($field);

            case 'IS NOT':
                return $query->whereNotNull($field);

            case 'IN':
                return $query->whereIn($field, explode(',', $value));

            case 'NOT IN':
                return $query->whereNotIn($field, explode(',', $value));

            case 'LIKE':
                return $query->where($field, 'like', '%' . str_replace('%', null, $value) . '%');

            default:
                return $query->where($field, $operator, $value);
        }
    }
}
