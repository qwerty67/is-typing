<?php

namespace App\GraphQL\Admin\Mutation\Content\Structure;


use Closure;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use App\Policies\Admin\Content\UpdateStatus as UpdateStatusAuth;
use App\Validations\Admin\Content\UpdateStatus as UpdateStatusVal;
use App\GraphQL\Admin\Mutation\Content\Resolver\UpdateStatus as ContentResolver;

class UpdateStatus extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateStatus'
    ];

    /**
     * @return GraphqlType
     */
    public function type(): GraphqlType
    {
        return GraphQL::type('PublicResult');
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::id())
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::nonNull(Type::int())
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
        $update = new ContentResolver();

        return $update->endpointResolver($args, $context, $resolveInfo, $getSelectFields);
    }

    /**
     * @param array $args
     * @return array
     */
    public function rules(array $args = []): array
    {
        $rule = new UpdateStatusVal();

        return $rule->setRules($args);
    }


    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $auth = new UpdateStatusAuth();

        return $auth->authorize($args);
    }
}