<?php
namespace App\Structures\Abstracts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;

abstract class PolicyAbstract
{
    /**
     * @var string
     */
    protected $message = 'شما مجاز به انجام این عمل نمی باشید';

    /**
     * Return the denied message that is filled by the author of the policy
     * method.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Check the is authenticated.
     *
     * @throws AuthenticationException
     */
    protected function userMustBeAuthenticated()
    {
        if (!Auth::check()) {
            throw new AuthenticationException(
                'لطفا لاگین شوید!'
            );
        }
    }

    /**
     * Check the is authenticated.
     *
     * @throws AuthenticationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function adminMustBeAuthenticated()
    {
        $this->userMustBeAuthenticated();
        if (!Auth::user()->isAdmin()) {
            throw new AuthorizationException(
                $this->message
            );
        }
    }


    protected function hasAdminPermission(array $permissionIds)
    {
        $user = Auth::user();

        return $user->hasAdminPermission($permissionIds);
    }
}
