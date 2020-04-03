<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\Admin;
use App\Client;
use App\Company;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Account as ResourcesAccount;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AccountController extends ApiController
{
    public function index()
    {
        return ResourcesAccount::collection(Account::all());
    }

    public function store(Request $request)
    {
        $rules = [
            User::FIRST_NAME => 'required',
            User::LAST_NAME => 'required',
            User::PHONE => 'required',
            User::ADDRESS => 'required',
            'user_type' => 'required',
            Account::USER_NAME => 'required',
            Account::EMAIL => 'required|email|unique:accounts',
            Account::PASSWORD => 'required|min:6',
            //Account::REMEMBER_ME => 'required',
            //Account::GOOGLE_ACCOUNT => 'required',
            //Account::FACEBOOK_ACCOUNT => 'required',

            //Company::NAME => $request->user_type == USER::ADMIN ? 'required' : null,
            //  Company::DESCRIPTION => $userType == USER::ADMIN ? 'required' : null,
            //  Company::BRANCH_OF => $userType == USER::ADMIN ? 'required' : null,
            //  Company::LOCATION => $userType == USER::ADMIN ? 'required' : null,
        ];

        $this->validate($request, $rules);

        $newUser = User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME => $request->last_name,
            User::PHONE => $request->phone,
            User::ADDRESS => $request->address,
        ]);
        //here you need to handle if the user enter a google or facebook account.
        $newAccount = Account::create([
            Account::UESR_ID => $newUser->id,
            Account::USER_NAME => $request->user_name,
            Account::EMAIL => $request->email,
            Account::PASSWORD => bcrypt($request->password),
            Account::FACEBOOK_ACCOUNT => 0,
            Account::GOOGLE_ACCOUNT => 0,
            Account::VERIFICATION_TOKEN => Account::generateVerificationCode(),
        ]);
        //user_type in this inst. refers to user_type key passed in the body of POST request.
        if (isset($request->user_type)) {
            $userType = $request->user_type;
            if ($userType == User::CLIENT) {
                $client = Client::create([Client::USER_ID => $newUser->id]);
            } elseif ($userType == User::EMPLOYEE) {
                //here we need to handle this case
            } elseif ($userType == User::ADMIN) {
                $admin = Admin::create([Admin::USER_ID => $newUser->id]);
            }
        }

        return new ResourcesAccount($newAccount);

    }

    public function show(Account $account)
    {
        return new ResourcesAccount($account);
    }

    /**
     * @param Request $request
     * @param Account $account
     */
    public function update(Request $request, Account $account)
    {
        if ($request->has('user_name')) {
            $account->user_name = $request->user_name;
        }
        if ($request->has('email')) {
            $this->validate($request, ['email' => 'email | unique:accounts']);
            $account->email = $request->email;
            //TODO we need to verify the account throughout sending an email
        }
        if ($request->has('password')) {
            //todo we need first to get the original password not the hashed one. then we need to hash the new password
            $account->password = $request->password;
            //TODO we need to verify the account throughout sending an email
        }
        if ($account->isClean()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }
        $account->save();
        return new ResourcesAccount($account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Account $account
     * @return ResourcesAccount
     * @throws \Exception
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return new ResourcesAccount($account);
    }
}
