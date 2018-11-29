<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accounts = auth()->user()->accounts->sortBy('name');
        return view('user.accounts.index', ['accounts' => $accounts]);
    }

    public function account()
    {
        return view('user.account.edit');
    }
}
