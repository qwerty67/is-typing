<?php

namespace App\GraphQL\Admin\Type\User;


use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UsersType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Users',
        'description' => 'A type',
        'model' => User::class, // define model for users type
    ];

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id()
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'family' => [
                'type' => Type::string(),
            ],
            'username' => [
                'type' => Type::string(),
            ],
            'avatar' => [
                'type' => Type::string(),
            ],
            'phone' => [
                'type' => Type::string(),
            ],
            'city' => [
                'type' => Type::string(),
            ],
            'job' => [
                'type' => Type::string(),
            ],
            'description' => [
                'type' => Type::string(),
            ],
            'gender' => [
                'type' => Type::int(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ],
            'role_id' => [
                'type' => Type::int(),
            ],
            'setting' => [
                'type' => Type::string(),
            ],
            'email_verified_at' => [
                'type' => Type::string(),
            ],
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}