@if (session('status'))
    <div class="alert alert-success" role="alert" style="position: fixed; top: 40px; right: 35px;">
        {{ session('status') }}
    </div>
@endif
