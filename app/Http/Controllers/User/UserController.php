<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Resources\User as ResourcesUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{

    public function index()
    {
        $users = User::all();
        return ResourcesUser::collection($users);
    }

    public function show(User $user)
    {
        return new ResourcesUser($user);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ];

        $this->validate($request, $rules);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'verification_token' => User::generateVerificationCode(),
            'user_verification' => User::USER_VERIFICATION[0],
            'account_type' => User::ACCOUNT_TYPE[0],
            'user_type' => User::USER_TYPE[0]

        ]);
        return $this->showOne($newUser,201);
    }

    public function update(Request $request, User $user)
    {
        //TODO
    }

    public function checkUserCredentials(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:8',
        ];

        $this->validate($request, $rules);

        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                return $this->response("user exists",200);
            } else {
                return $this->response('The given data was invalid', 400);
            }
        }
        return $this->response('no user exists', 404);
    }

    public function getLoginCredentials(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|min:8',
        ];

        $this->validate($request, $rules);

        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                return new ResourcesUser($user);
            } else {
                return $this->response('The given data was invalid', 400);
            }
        }
        return $this->response('no user exists', 404);

    }
}
