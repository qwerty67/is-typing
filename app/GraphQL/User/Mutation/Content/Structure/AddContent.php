<?php

namespace App\GraphQL\User\Mutation\Content\Structure;


use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use App\Policies\User\Content\AddContent as AddContentAuthorization;
use App\Validations\User\Content\AddContent as AddContentValidation;
use App\GraphQL\User\Mutation\Content\Resolver\AddContent as AddContentResolver;

class AddContent extends Mutation
{

    protected $attributes = [
        'name' => 'AddContent'
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type('PublicResult');
    }

    public function args(): array
    {
        return [
            'Content' => [
                'name' => 'content',
                'type' => Type::nonNull(Type::string())
            ],
            'subject' => [
                'name' => 'subject',
                'type' => Type::nonNull(Type::string())
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int()
            ],
            'hashtag' => [
                'name' => 'hashtag',
                'type' => Type::string()
            ],
//            'like' => [
//                'name' => 'like',
//                'type' => Type::int()
//            ],
//            'dislike' => [
//                'name' => 'dislike',
//                'type' => Type::int()
//            ],
            'status' => [
                'name' => 'status',
                'type' => Type::int()
            ],
//            'owner' => [
//                'name' => 'OwnerContent',
//                'type' => Type::nonNull(Type::listOf(GraphQL::type('OwnerContent')))
//            ]
        ];
    }

    /**
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return mixed
     * @throws \Exception
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $AddContent = new AddContentResolver();
        return $AddContent->endpointResolver($args, $context, $resolveInfo, $getSelectFields);

    }

    /**
     * @param array $args
     * @return array
     */
    public function rules(array $args = []): array
    {
        $validate = new AddContentValidation();
        return $validate->setRules($args);
    }

    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $authorize = new AddContentAuthorization();
        return $authorize->authorize($args);
    }
}