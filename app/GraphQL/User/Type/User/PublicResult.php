<?php

namespace App\GraphQL\User\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PublicResult extends GraphQLType
{
    protected $attributes = [
        'name' => 'PublicResult',
        'description' => 'beLongsTo Content',
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