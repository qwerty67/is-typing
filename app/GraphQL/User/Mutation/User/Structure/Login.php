<?php

namespace App\GraphQL\User\Mutation\User\Structure;


use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type as GraphqlType;
use App\Policies\User\User\Login as LoginAuthorize;
use App\Validations\User\User\Login as LoginValidation;
use App\GraphQL\User\Mutation\User\Resolver\Login as LoginResolver;

class Login extends Mutation
{

    protected $attributes = [
        'name' => 'Login'
    ];

    /**
     * @return GraphqlType
     */
    public function type(): GraphqlType
    {
        return GraphQL::type('Login');
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'username' => [
                'name' => 'username',
                'type' => Type::nonNull(Type::string())
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string())
            ]

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
        $signUp = new LoginResolver();
        return $signUp->endpointResolver($args, $context, $resolveInfo, $getSelectFields);

    }

    public function rules(array $args = []): array
    {
        $validate = new LoginValidation();
        return $validate->setRules($args);
    }

    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $authorize = new LoginAuthorize();
        return $authorize->authorize($args);
    }
}