@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <!-- Navigation -->
                <div class="card-header">
                    <div class="d-flex justify-content-around flex-wrap">
                        <button data-toggle="modal" data-target="#addNewPassword" class="btn btn-primary btn-rounded my-1">Add New Account</button>
                        <a class="btn btn-primary btn-rounded my-1" href="{{ route('user.account.edit') }}">Manage My Account</a>
                    </div>
                </div>
                <!-- /Navigation -->

                <!-- Search Box -->
                <div class="p-4" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125)">
                    <account-pane-searchbox></account-pane-searchbox>
                </div>
                <!-- /Search Box -->

                <!-- Contents Container -->
                <div class="card-body py-1">

                    @yield('page-content')

                </div>

                @include('user.partials.add-account-modal')

            </div>
        </div>
    </div>
</div>

@endsection

