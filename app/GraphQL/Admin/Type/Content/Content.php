<?php

namespace App\GraphQL\Admin\Type\Content;

use GraphQL\Type\Definition\Type;
use App\Model\Content as ContentModel;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class Content extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContentAdmin',
        'description' => 'get all content',
        'model' => ContentModel::class, // define model for users type
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id()
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
            'user' => [
                'type' => GraphQL::type('UserAdmin'),
                'description' => 'A list of posts written by the user',

            ]
        ];

    }
}