<template>
  <div>
    <input
      class="form-control me-2"
      type="search"
      placeholder="Entrer un terme de recherche"
      aria-label="Search"
      v-model="q"
    />

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <th scope="row">{{ user.id }}</th>
          <td>{{}}</td>
          <td>{{}}</td>
          <td>@ {{}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Users: [],
      q: "",
    };
  },

  methods: {
    getUsers() {
      axios
        .get("/api/user")
        .then((res) => (this.Users = res.data))
        .catch((error) => {});
    },
  },

  created: function () {
    this.getUsers();
  },
};
</script>
