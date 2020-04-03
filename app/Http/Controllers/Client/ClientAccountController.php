<?php

namespace App\Http\Controllers\Client;

use App\Account;
use App\Client;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Client as ResourcesClient;
use Illuminate\Http\Request;

class ClientAccountController extends ApiController
{

    public function index(Client $client)
    {
        $accounts = Account::all()->where('user_id',$client->user_id);
        return ResourcesClient::collection($accounts);
    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client,Account $account)
    {
        $account = Account::all()->where('user_id',$client->user_id)->where('id',$account->id);
        //handle empty list TODO
        return new ResourcesClient($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
