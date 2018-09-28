<template>

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

</template>

<script>
export default {};
</script>

