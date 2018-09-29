<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user()->accounts->sortBy('name');
        return view('user.accounts.index', ['accounts' => $accounts]);
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
        return redirect()->route('user.accounts.index');
    }

    /**
     * API Method for builing the password
     */
    public function apiGetAccountPassword(Request $request)
    {
        return json_encode(Account::where([
            'user_id' => auth()->user()->id,
            'name' => 'Facebook',
            'username' => '5058353859'
        ])->exists());
    }
}
