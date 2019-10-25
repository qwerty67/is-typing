<?php


namespace App\GraphQL\User\Type\User\Content;

use App\Model\Owner;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OwnerContent extends GraphQLType
{

    protected $attributes = [
        'name' => 'OwnerContent',
        'description' => 'beLongsTo Content',
        'model' => Owner::class, // define model for users type
    ];

    public function fields(): array
    {
        return [
            'user_id' => [
                'type' => Type::int()
            ],
            'content_id' => [
                'type' => Type::int()
            ],
        ];

    }
}