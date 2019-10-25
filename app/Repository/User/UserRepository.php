<?php

namespace App\Repository\User;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Database\Eloquent\Model;
use App\Structures\Abstracts\RepositoryAbstract;
use Intervention\Image\Exception\NotFoundException;
use App\Structures\Interfaces\Repository\UserInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserRepository implements UserInterface
{
    /**
     * @param $income
     * @return
     */
    public function findById($income)
    {
//            $user = DB::table('users')->where('id', $income['id'])->get();
//        $user = User::find($income['id']);
        $user = User::where('id', $income['id'])->get();

        return $user;

//        throw new NotFoundException('not found');

    }

    /**
     * @param $income
     * @return mixed
     */
    public function SignUp($income)
    {
        $user = new User();

        $user->name = $income['name'];
        $user->family = $income['family'];
        $user->username = $income['username'];
        $user->email = $income['email'];
        $user->password = bcrypt($income['password']);
        $user->job = $income['job'];
        $user->gender = $income['gender'];
        $user->description = $income['description'];
        $user->phone = $income['phone'];
        $user->city = $income['city'];

        $user->save();

        return [
            'result' => 'success',
            'message' => 'User created!!'
        ];
    }

    /**
     * @param $income
     * @return mixed
     */
    public function login($income)
    {
        $request = new Request();
        $credentials = request([$income['username'], $income['password']]);
//
//        if (!$token = auth()->attempt($credentials)) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }

//        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
//        $this->respondWithToken($token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);

//        return [
//            'result' => 'success',
//            'message' => 'Login success!!'
//        ];
    }

//    /**
//     * @param $token
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function respondWithToken($token)
//    {
//
//    }


    /**
     * @param $income
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllUser($income)
    {
        return User::all();

    }
}