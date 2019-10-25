<?php

namespace App\GraphQL\User\Type\User\Content;

use GraphQL\Type\Definition\Type;
use App\Model\Content as ContentModel;
use Rebing\GraphQL\Support\Type as GraphQLType;

class Content extends GraphQLType
{
    protected $attributes = [
        'name' => 'Content',
        'description' => 'beLongsTo Content',
        'model' => ContentModel::class, // define model for users type
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::string()
            ],
            'user_id' => [
                'type' => Type::int()
            ],
            'subject' => [
                'type' => Type::string()
            ],
            'content' => [
                'type' => Type::string()
            ],
            'hashtag' => [
                'type' => Type::string()
            ],
            'like' => [
                'type' => Type::int()
            ],
            'dislike' => [
                'type' => Type::int()
            ],
            'status' => [
                'type' => Type::int()
            ]
        ];

    }
}