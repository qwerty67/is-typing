<?php

namespace App\GraphQL\User\Mutation\User\Structure;


use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use App\Policies\User\User\SignUp as SignUpAuthorize;
use App\Validations\User\User\SignUp as SignUpValidation;
use App\GraphQL\User\Mutation\User\Resolver\SignUp as SignUpResolver;

class SignUp extends Mutation
{

    protected $attributes = [
        'name' => 'SignUp'
    ];

    /**
     * @return GraphqlType
     */
    public function type(): GraphqlType
    {
        return GraphQL::type('SignUp');
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'family' => [
                'name' => 'family',
                'type' => Type::nonNull(Type::string())
            ],
            'username' => [
                'name' => 'username',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string())
            ],
//            'avatar' => [
//                'name' => 'name',
//                'type' => Type::nonNull(Type::string())
//            ],
            'phone' => [
                'name' => 'phone',
                'type' => Type::nonNull(Type::string())
            ],
            'gender' => [
                'name' => 'gender',
                'type' => Type::nonNull(Type::int())
            ],
            'city' => [
                'name' => 'city',
                'type' => Type::nonNull(Type::string())
            ],
            'job' => [
                'name' => 'job',
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'name' => 'description',
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
        $signUp = new SignUpResolver();
        return $signUp->endpointResolver($args, $context, $resolveInfo, $getSelectFields);

    }

    public function rules(array $args = []): array
    {
        $validate = new SignUpValidation();
        return $validate->setRules($args);
    }

    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $authorize = new SignUpAuthorize();
        return $authorize->authorize($args);
    }
}