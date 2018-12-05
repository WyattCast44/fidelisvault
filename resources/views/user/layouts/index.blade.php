@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8" v-cloak>
            <accounts></accounts>
        </div>
    </div>
</div>

@include('user.partials.add-account-modal')

@endsection

