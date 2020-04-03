<?php

namespace App\Http\Controllers\User;

use App\Account;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account as ResourcesAccount;
use App\User;
use Illuminate\Http\Request;

//DEPRECATED

class UserAccountController extends ApiController
{

    public function index(User $user)
    {
        $accounts = Account::all()->where('user_id', $user->id);
        return ResourcesAccount::collection($accounts);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user,Account $account)
    {
        $account = Account::all()->where('user_id', $user->id)->where('id',$account->id);
        if($account->isEmpty()){
            //todo return error response
            //return $this->errorResponse("no result",202);
        }
        return new ResourcesAccount($account);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
