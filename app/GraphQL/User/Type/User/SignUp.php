<?php

namespace App\GraphQL\User\Type\User;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SignUp extends GraphQLType
{
    protected $attributes = [
        'name' => 'SignUp',
        'description' => 'SignUp',
        'model' => User::class, // define model for users type
    ];

    public function fields(): array
    {
        return [
            'result' => [
                'type' => Type::boolean()
            ],
            'message' => [
                'type' => Type::string()
            ],
        ];

    }
}