<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';

    public function users()
    {
        $this->hasMany(User::class);
    }


    public function permissionsRelation()
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_role',
            'role_id',
            'permission_id'
        );
    }

    public function usersRelation()
    {
        return $this->belongsToMany(
            User::class,
            'user_roles',
            'role_id',
            'user_id'
        );
    }
}
