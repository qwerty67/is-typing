<?php

namespace App;

use App\Model\Content;
use App\Model\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;


//\TCG\Voyager\Models\User
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
//        'password',
        'family',
        'username',
        'email',
        'avatar',
        'phone',
        'gender',
        'job',
        'description',
        'city',
        'setting',
        'role_id',
        'created_at',
        'updated_at',
//        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        $this->belongsTo(Role::class);
    }

    public function rolesRelation()
    {
        return $this->belongsToMany(
            Role::class,
            'user_roles',
            'user_id',
            'role_id'
        );
    }

    public function contentsRelation()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['user not found'], '404');
            }
            return $user->id;

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['Token Expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['Token Invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['Token Absent'], $e->getStatusCode());

        }
    }


}
