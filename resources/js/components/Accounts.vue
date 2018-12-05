<template>
  <!-- card -->
  <div class="card">
    
    <!-- Navigation -->
    <div class="card-header">
        <div class="d-flex justify-content-around flex-wrap">
            <button data-toggle="modal" data-target="#addNewPassword" class="btn btn-primary btn-rounded my-1">Add New Account</button>
            <a class="btn btn-primary btn-rounded my-1" href="#">Manage My Account</a>
        </div>
    </div>
    
    <!-- Search Pane -->
    <div class="p-4" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125)">
      <input type="text" class="form-control" placeholder="Search accounts..." v-model="searchTerm">
    </div>

    <!-- Accounts -->
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li
          class="list-group-item pb-2"
          v-for="account in filteredAccounts"
          v-bind:key="account.id"
        >
          <!-- Account Pane -->
          <div class="row">
            <div class="left col-md-6 col-xs-12">
              <h3>{{ account.name }}</h3>
              <div>
                <p class="text-muted mb-1">
                  <a :href="fixUrl(account.url)" target="_blank">{{ fixUrl(account.url) }}</a>
                </p>
                <p
                  style="cursor: pointer"
                  class="text-muted mb-1 d-block"
                  v-clipboard:copy="account.username"
                >{{ account.username }}</p>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 d-flex align-items-center justify-content-end">
              <button
                data-toggle="collapse"
                :href="'#manageAccount-' + account.id"
                role="button"
                class="btn btn-outline-primary btn-rounded mr-2"
              >Manage Account</button>
              <button
                data-toggle="collapse"
                :href="'#getAccountPassword-' + account.id"
                role="button"
                class="btn btn-outline-primary btn-rounded mr-2"
              >Get Password</button>
            </div>
          </div>
          <!-- Manage Account Dropdown -->
          <div class="collapse my-3 w-100" :id="'manageAccount-' + account.id">
            <div class="card card-body">
              <form @submit.prevent="updateAccount(account)">
                <!-- <input type="hidden" name="id" :value="account.id" autocomplete="off" required> -->
                <div class="form-group">
                  <label for="name">Account Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    v-model="account.name"
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
                    v-model="account.url"
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
                    v-model="account.username"
                    autocomplete="off"
                    required
                  >
                </div>
                <button class="btn mr-2 btn-primary btn-rounded">Save Changes</button>
                <button class="btn btn-outline-danger btn-rounded" v-on:click.stop="deleteAccount(account)">Delete Account</button>
              </form>
            </div>
          </div>
          <!-- Get Account Password Dropdown-->
          <div class="collapse my-3 w-100" :id="'getAccountPassword-' + account.id">
            <div class="collapse-content">
              <div class="card card-body">
                <form>
                  <input type="hidden" name="_token">

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

                  <button
                    class="btn btn-primary btn-rounded"
                    type="submit"
                  >Get {{ account.name }} Password</button>
                </form>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- #card -->
</template>

<script>
export default {
  data() {
    return {
      accounts: [],
      searchTerm: ""
    };
  },
  created() {
    this.fetchAccounts();
  },
  methods: {
    fetchAccounts() {
      let vm = this;
      let accounts_url = "/accounts";
      window.axios.get(accounts_url).then(response => {
        this.accounts = Object.values(response.data);
      });
    },
    fixUrl(url) {
      if (!url.includes("http://") && !url.includes("https://")) {
        return "http://" + url;
      } else {
        return url;
      }
    },
    updateAccount(account) {
      window.axios
        .post("/accounts/update", {
          id: account.id,
          name: account.name,
          url: account.url,
          username: account.username
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    deleteAccount(account) {
        console.log(account.id);
        window.axios
        .post("/accounts/delete", {
          id: account.id,
        })
        .then(res => {
            this.fetchAccounts();
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  computed: {
    filteredAccounts: function() {
        return this.accounts.filter(account => {
          if (account.name.match(new RegExp(this.searchTerm, "gi"))) {
            return true;
          } else {
            return false;
          }
        });
    }
  }
};
</script>
