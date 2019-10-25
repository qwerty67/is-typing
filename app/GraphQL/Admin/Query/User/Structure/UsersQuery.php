<?php

namespace App\GraphQL\Admin\Query\User\Structure;

use Closure;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Policies\Admin\User\User as UserAuthorize;
use App\Validations\Admin\User\User as UserValidation;
use App\GraphQL\Admin\Query\User\Resolver\User as UserResolver;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'A query of get all users'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('UserAdmin'));
    }

    // arguments to filter query
    public function args(): array
    {
        return [];
    }

    /**
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return mixed
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $resolve = new UserResolver();

        return $resolve->endpointResolver($args, $context, $resolveInfo, $getSelectFields);
    }

    /**
     * @param array $args
     * @return array
     */
    public function rules(array $args = []): array
    {
        $validate = new UserValidation();

        return $validate->setRules($args);
    }

    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $validate = new UserAuthorize();

        return $validate->authorize();
    }
}