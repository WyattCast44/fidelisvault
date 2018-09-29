@extends('user.layouts.index')

@section('page-content')

    <ul class="list-group list-group-flush">

        @php
            $count = 1;
        @endphp

        @forelse ($accounts as $account)

            <account-pane
                id={{ $count }}
                name="{{ $account->name }}"
                url="{{ $account->url }}"
                username="{{ $account->username }}"
            ></account-pane>

            <password-modal
                id={{ $count }}
                action={{ route('user.accounts.generatePassword') }}
                name="{{ $account->name }}"
                username="{{ $account->username }}"
            ></password-modal>

            @php
                $count = $count + 1;
            @endphp

        @empty

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h3 class="m-0 text-muted">No Accounts Added</h3>
            </li>

        @endforelse

    </ul>

@endsection

