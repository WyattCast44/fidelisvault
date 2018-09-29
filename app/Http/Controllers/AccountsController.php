<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user()->accounts->sortBy('name');
        return view('user.dashboard', ['accounts' => $accounts]);
    }

    public function store(Request $request)
    {
        /**
         * Validate form
         */
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'url' => 'nullable|string',
            'username' => 'nullable|string'
        ]);

        /**
         * Create the salt
         */
        $salt = Hash::make(str_random(16));

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
        return redirect()->route('user.dashboard');
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
}
