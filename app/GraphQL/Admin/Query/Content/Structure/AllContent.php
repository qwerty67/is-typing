<?php

namespace App\GraphQL\Admin\Query\Content\Structure;

use App\Model\Content;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Mod;
use PhpParser\Node\Expr\Cast\Object_;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Policies\Admin\Content\Content as ContentAuthorize;
use App\Validations\Admin\Content\Content as ContentValidation;
use App\GraphQL\Admin\Query\Content\Resolver\Content as ContentResolver;

class AllContent extends Query
{
    protected $attributes = [
        'name' => 'ContentAdmin',
        'description' => 'A query of get all contents'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('ContentAdmin'));
    }

    // arguments to filter query
    public function args(): array
    {
        return [];
    }


    /**
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return array
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        $resolve = new ContentResolver();
//
        return $resolve->endpointResolver($args, $context, $resolveInfo, $getSelectFields());
    }

    /**
     * @param array $args
     * @return array
     */
    public function rules(array $args = []): array
    {
        $validate = new ContentValidation();

        return $validate->setRules($args);
    }

    /**
     * @param array $args
     * @return bool
     */
    public function authorize(array $args): bool
    {
        $validate = new ContentAuthorize();

        return $validate->authorize();
    }
}