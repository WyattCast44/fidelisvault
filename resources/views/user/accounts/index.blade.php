@extends('user.layouts.index')

@section('page-content')

    <ul class="list-group list-group-flush">

        @forelse ($accounts as $account)

            <account-pane
                name="{{ $account->name }}"
                url="{{ $account->url }}"
                username="{{ $account->username }}"
            ></account-pane>

        @empty

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h3 style="margin:0;">No Accounts Added</h3>
            </li>

        @endforelse

    </ul>

@endsection

