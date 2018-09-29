<template>

    <div class="modal fade" :id="'getAccountPassword-' + id" tabindex="-1" role="dialog" aria-labelledby="getAccountPassword" aria-hidden="true">
        <form :action="action" method="POST">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Enter {{ name }} Master Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                         <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="name" :value="name">
                        <input type="hidden" name="username" :value="username">
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="off" value="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-rounded">Get Password</button>
                </div>
                </div>
            </div>
        </form>
    </div>

</template>

<script>
export default {
  props: {
    id: Number,
    action: String,
    name: String,
    username: String
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  }
};
</script>

