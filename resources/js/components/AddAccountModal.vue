<template>
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
</template>
