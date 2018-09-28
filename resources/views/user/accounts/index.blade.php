@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-around flex-wrap">
                        <button data-toggle="modal" data-target="#addNewPassword" class="btn btn-primary btn-rounded my-1">Add New Account</button>
                        <button class="btn btn-primary btn-rounded my-1">Manage My Account</button>
                    </div>
                </div>

                <div class="p-4" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125)">
                    <account-pane-searchbox></account-pane-searchbox>
                </div>

                <div class="card-body py-1">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">

                    @forelse ($accounts as $account)

                        <account-pane></account-pane>

                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left">
                                <h3>{{ $account->name }}</h3>
                                <div>
                                    <p class="text-muted mb-1">{{ $account->url }}</p>
                                    <p class="text-muted mb-1">{{ $account->username }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <button data-toggle="modal" data-target="#" title="Copy Password" class="btn btn-outline-primary btn-rounded mr-2 mb-1">Manage Account</button>
                                <button data-toggle="modal" data-target="#enterBasePassword" title="Copy Password" class="btn btn-outline-primary btn-rounded">Get Password</button>
                            </div>
                        </li> --}}

                    @empty

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h3>No Accounts Added</h3>
                        </li>

                    @endforelse

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Get Password Modal -->
<form action="#">
    <div class="modal fade" id="enterBasePassword" tabindex="-1" role="dialog" aria-labelledby="enterBasePassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Enter Master Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            @csrf
            <div class="form-group">
                <input type="hidden" name="account" value="facebook">
                <input type="password" class="form-control" id="basePassword" name="basePassword">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-rounded">Get Password</button>
        </div>
        </div>
    </div>
    </div>
</form>
<!-- /Get Password Modal -->

<!-- Add Account Modal -->
<form action="{{ route('accounts.store') }}" method="POST">
    <div class="modal fade" id="addNewPassword" tabindex="-1" role="dialog" aria-labelledby="addNewPassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            @csrf
            <div class="form-group">
                <label for="name">Account Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Facebook">
            </div>

            <div class="form-group">
                <label for="url">Account Url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="www.facebook.com">
            </div>

            <div class="form-group">
                <label for="username">Account Username or Email</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-rounded">Add New Account</button>
        </div>
        </div>
    </div>
    </div>
</form>
<!-- /Add Account Modal -->

@endsection

