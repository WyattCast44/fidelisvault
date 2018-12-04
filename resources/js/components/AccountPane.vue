<template>
  <li class="list-group-item pb-1">
    <div class="row">
      <div class="left col-md-6 col-xs-12">
        <h3>{{ name }}</h3>
        <div>
          <p class="text-muted mb-1">
            <a :href="fixedUrl" target="_blank">{{ fixedUrl }}</a>
          </p>
          <p class="text-muted mb-1">{{ username }}</p>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 d-flex align-items-center justify-content-end">
        <button
          data-toggle="collapse"
          :href="'#manageAccount-' + id"
          role="button"
          class="btn btn-outline-primary btn-rounded mr-2"
        >Manage Account</button>
        <button
          data-toggle="collapse"
          :href="'#getAccountPassword-' + id"
          role="button"
          class="btn btn-outline-primary btn-rounded mr-2"
        >Get Password</button>
      </div>
    </div>

    <div class="collapse my-3 w-100" :id="'manageAccount-' + id">
      <div class="card card-body">
        <form :action="updateUrl" method="POST">
          <input type="hidden" name="_token" :value="csrf">

          <div class="form-group">
            <label for="name">Account Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              :value="name"
              autocomplete="off"
              required
            >
          </div>

          <div class="form-group">
            <label for="url">Account Url</label>
            <input
              type="text"
              class="form-control"
              id="url"
              name="url"
              :value="url"
              autocomplete="off"
            >
          </div>

          <div class="form-group">
            <label for="username">Account Username or Email</label>
            <input
              type="text"
              class="form-control"
              id="username"
              name="username"
              :value="username"
              autocomplete="off"
              required
            >
          </div>

          <button class="btn mr-2 btn-primary btn-rounded">Save Changes</button>
        </form>
        <button
          class="btn btn-outline-danger btn-rounded"
          v-on:click="deleteAccount()"
        >Delete Account</button>
      </div>
    </div>

    <div class="collapse my-3 w-100" :id="'getAccountPassword-' + id">
      <div class="collapse-content">
        <div class="card card-body">
          <form @submit.prevent="retrivePassword()">
            <input type="hidden" name="_token" :value="csrf">

            <div class="form-group">
              <label for="name">Enter master account password</label>
              <input
                type="password"
                class="form-control"
                id="master_password"
                name="master_password"
                autocomplete="off"
                required
              >
            </div>

            <button class="btn btn-primary btn-rounded" type="submit">Get {{ name }} Password</button>
          </form>
        </div>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: {
    id: String,
    name: String,
    url: String,
    username: String,
    updateUrl: String,
    getAccountPasswordUrl: String
  },
  data() {
    return {
      fixedUrl: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  methods: {
    fixUrl() {
      if (!this.url.includes("http://") && !this.url.includes("https://")) {
        this.fixedUrl = "http://" + this.url;
      } else {
        this.fixedUrl = this.url;
      }
    },
    retrivePassword() {
      window.axios
        .post(this.getAccountPasswordUrl, {
          id: this.id
        })
        .then(response => {
          console.log(response.data);
        });
    },
    deleteAccount() {
      //   window.axios
      //     .post("home/accounts/destroy", {
      //       id: this.id
      //     })
      //     .then(response => {
      //       console.log(response.data);
      //     });
    }
  },
  created() {
    this.fixUrl();
  }
};
</script>
