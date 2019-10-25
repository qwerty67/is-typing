<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rolesRelation()
    {
        return $this->belongsToMany(
            Role::class,
            'permission_role',
            'permission_id',
            'role_id'
        );
    }
}
