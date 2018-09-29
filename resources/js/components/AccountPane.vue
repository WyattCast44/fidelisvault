<template>

    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
        <div class="left">
            <h3>{{ name }}</h3>
            <div>
                <p class="text-muted mb-1">{{ url }}</p>
                <p class="text-muted mb-1">{{ username }}</p>
            </div>
        </div>
        <div class="d-flex">
            <button data-toggle="modal" data-target="#" title="Copy Password" class="btn btn-outline-primary btn-rounded mr-2">Manage Account</button>
            <button data-toggle="modal" :data-target="'#enterBasePassword' + name" title="Get Password" class="btn btn-outline-primary btn-rounded">Get Password</button>
        </div>
    </li>

</template>

<script>
export default {
  props: {
    name: String,
    url: String,
    username: String
  }
};
</script>
