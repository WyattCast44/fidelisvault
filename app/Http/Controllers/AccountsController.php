<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() 
    {
        return view('user.layouts.index');
    }

    public function checkIfValid(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required|string|min:3',
            'url' => 'nullable|string',
            'username' => 'nullable|string'
        ]);
    }

    public function index()
    {
        $accounts = auth()->user()->accounts->sortBy('name');
        return $accounts;
    }

    public function store(Request $request)
    {
        /**
         * Validate form
         */
        $this->checkIfValid($request);

        /**
         * Create the salt
         */
        $salt = str_random(8);

        /**
         * Build the account
         */
        $account = new Account;
        $account->user_id = auth()->user()->id;
        $account->name = $request->get('name');
        $account->url = $request->get('url');
        $account->username = $request->get('username');
        $account->salt = $salt;
        $account->save();

        /**
         * Redirect back to dashboard
         */
        return back()->with('status', 'Account added!');
    }

    public function generatePassword(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $account = Account::where([
            'user_id' => auth()->user()->id,
            'name' => $request->get('name'),
            'username' => $request->get('username')
        ])->get()->first();

        $salt = $account->salt;

        $password = crypt($request->get('password'), $salt);

        return $password;
    }

    public function update(Request $request)
    {
        $this->checkIfValid($request);

        $account = Account::where([
            'id' => $request->get('id'),
            'user_id' => auth()->user()->id
        ])->firstOrFail();

        $account->name = $request->get('name');
        $account->url = $request->get('url');
        $account->username = $request->get('username');
        $account->save();

        return $account;
    }

    public function retrivePassword(Request $request)
    {
        return $request->input('id');
    }

    public function destroy(Request $request)
    {
        $account = Account::where([
            'id' => $request->get('id'),
            'user_id' => auth()->user()->id
        ])->firstOrFail();

        $account->delete();

        return 200;
    }
}
