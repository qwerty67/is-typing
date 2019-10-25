<?php

namespace App\GraphQL\User\Type\User\User;


use GraphQL\Type\Definition\Type;
use App\GraphQL\User\Query\User\Resolver\User;
use Rebing\GraphQL\Support\Type as GraphQLType;

class Login extends GraphQLType
{
    protected $attributes = [
        'name' => 'Login',
        'description' => 'Login user',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'access_token' => [
                'type' => Type::string()
            ],
            'token_type' => [
                'type' => Type::string()
            ],
            'expires_in' => [
                'type' => Type::string()
            ],
        ];
    }
}