<template>
    <div>
        <div class="row">
            <div class="col-3" style="text-align: right;">
                <div class="btn btn-outline-success" v-if="this.keyword && Users.length > 0">
                    {{ Users.length }} utilisteur(s) trouvé(s)
                </div>
                <div class="btn btn-outline-secondary" v-if="this.keyword && Users.length == 0">
                    Aucun utilisteur trouvé
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <input class="form-control me-2" type="search" placeholder="Entrer un terme de recherche" v-model="keyword">
                </div>
                <div class="row m-2">
                    <div class="list-group" v-if="this.keyword && Users.length > 0">
                        <h6>Cliquez sur un élément pour accéder au profil</h6>
                        <a :href="user.role_id==3 ? '/girls/' + user.name + '/' + user.id : '#' + user.id" class="list-group-item list-group-item-action"  v-for="user in Users" :key="user.id">
                            #{{user.id}} _ <span class="text-uppercase">{{user.name}}</span>
                            <span class="text-muted fs-6 text-nowrap bg-light mx-4 px-2" >{{user.email}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["fromPage"],
    data() {
        return {
            keyword: null,
            Users: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword, fromPage: this.fromPage } })
                .then(res => this.Users = res.data)
                .catch((error) => console.log(error));
        }
    },
    created: function () {
        console.log(this.fromPage)
  },
}
</script>