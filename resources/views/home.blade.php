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
                    <input type="text" class="form-control" placeholder="Search...">
                </div>

                <div class="card-body py-1">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left">
                                <h3>Facebook</h3>
                                <div>
                                    <p class="text-muted mb-1">www.facebook.com</p>
                                    <p class="text-muted mb-1">wyatt.castaneda@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button data-toggle="modal" data-target="#enterBasePassword" title="Copy Password" class="btn btn-outline-primary btn-rounded">Get Password</button>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left">
                                <h3>Instagram</h3>
                                <div>
                                    <p class="text-muted mb-1">www.instagram.com</p>
                                    <p class="text-muted mb-1">wyattcastaned44</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button data-toggle="modal" data-target="#enterBasePassword" title="Copy Password" class="btn btn-outline-primary btn-rounded">Get Password</button>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left">
                                <h3>Github</h3>
                                <div>
                                    <p class="text-muted mb-1">www.github.com</p>
                                    <p class="text-muted mb-1">wyattcast44</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button data-toggle="modal" data-target="#enterBasePassword" title="Copy Password" class="btn btn-outline-primary btn-rounded">Get Password</button>
                            </div>
                        </li>

                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left">
                                <h3>Github</h3>
                                <p class="text-muted mb-1">www.github.com</p>
                            </div>
                            <div class="d-flex">
                                <button title="Copy Password" class="btn btn-link"><i data-feather="clipboard"></i></button>
                                <button title="Show Password" class="btn btn-link"><i data-feather="eye"></i></button>
                                <button title="Launch in new tab" class="btn btn-link"><i data-feather="external-link"></i></button>
                            </div>
                        </li> --}}

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

<!-- Add Password Modal -->

<form action="#">
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
                <label for="accountName">Account Name</label>
                <input type="text" class="form-control" id="accountName" name="accountName" placeholder="Facebook">
            </div>

            <div class="form-group">
                <label for="accountUrl">Account Url</label>
                <input type="text" class="form-control" id="accountUrl" name="accountUrl" placeholder="www.facebook.com">
            </div>

            <div class="form-group">
                <label for="accountLogin">Account Username or Email</label>
                <input type="text" class="form-control" id="accountLogin" name="accountLogin">
            </div>

            <div class="form-group">
                <label for="accountMasterPassword">Master Password For This Account</label>
                <input type="password" class="form-control" id="accountMasterPassword" name="accountMasterPassword">
            </div>

            <div class="form-group">
                <label for="accountMasterPassword_confirm">Confirm Master Password For This Account</label>
                <input type="password" class="form-control" id="accountMasterPassword_confirm" name="accountMasterPassword_confirm">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-rounded">Add New Password</button>
        </div>
        </div>
    </div>
    </div>
</form>

<!-- /Add Password Modal -->

@endsection

