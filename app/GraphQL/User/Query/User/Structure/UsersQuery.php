<?php

namespace App\GraphQL\User\Query\User\Structure;

use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\GraphQL\User\Query\User\Resolver\User;
use App\Policies\User\User\User as UserAuthorize;
use App\Validations\User\User\User as UserValidation;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'get user by id or email'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
        ];
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
        $endpoint = new User();
        return $endpoint->endpointResolver($args, $context, $resolveInfo, $getSelectFields);

    }

    /**
     * @param array $args
     * @return array
     */
    protected function rules(array $args = []): array
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
        $authorize = new UserAuthorize();
        return $authorize->readUserId();
    }
}