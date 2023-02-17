<template>
  <div class="row mx-1">
    <div class="container my-2">
      <AlertErrors :form="form" message="Veuillez vérifier les erreurs suivantes:"></AlertErrors>
      <div v-if="choice=='manual' && form.successful">
        <AlertSuccess :form="form" message="Une escorte ajoutée avec succès" />
      </div>
      <div v-if="choice=='auto' && form.successful">
        <AlertSuccess :form="form">
          <h5>{{ girls_names.length + ' escortes ajoutées avec succès' }}</h5>
          
          <ul v-if="girls_names.length <= 0" class="list-group bg-transparent">
            <li class="list-group-item bg-transparent" v-for="girl_name in girls_names" v-bind:key="girl_name.id">{{ girl_name.Name }}</li>
          </ul>
        </AlertSuccess>
      </div>
      
      <!-- <div v-if="form.progress" class="progress mx-2" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <div :class="'progress-bar w-'+form.progress.percentage" >{{ form.progress.percentage }}%</div>
      </div>
      <div v-if="form.progress">Progress: {{ form.progress.percentage }}%</div> -->
    </div>
    
    <div v-if="!form.successful" class="row m-2 text-center">
        <div class="col">
            <button @click="choice='auto'" type="button" class="btn btn-primary" :disabled="choice=='auto'?true:false">
                AUTOMATIQUE
            </button>
        </div>
        <div class="col">
            <button @click="choice='manual', getPrenom()" :disabled="choice=='manual'?true:false" type="button" class="btn btn-primary">
                MANUEL
            </button>
        </div>
    </div>
    <div v-else class="row m-2 text-center">
        <div class="col">
            <reload-button-component></reload-button-component>
        </div>
    </div>
      
    <div v-if="choice == 'auto' && !form.successful" class="card-body">
      <h4 class="text-center">
        <small class="text-muted">Génération Automatique</small>
         <button class="btn btn-outline-secondary btn-sm ml-2" type="button" @click="girls_names=[];girls=[]">
            <i class="bi bi-arrow-clockwise"></i>
        </button>
      </h4>
      <div v-if="girls_names.length <= 0" class="row">
        <form v-if="girls_names" action="" @submit.prevent="getGirls(nbr)">
          
          <div v-if="generate_girls" class="alert alert-warning" role="alert">
            Ooooops!!! <br> {{ girls_names.length }} escortes disponibles pour génération automatique. <br> Il faut générer manuellement!
          </div>
          <div class="row mb-3">
              <label for="nbr" class="col-md-4 col-form-label text-md-end">Nombres d'escortes à générer (min=1, max=15)</label>
              <div class="col-md-6">
                  <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                      <input id="nbr" type="number" required min="1" max="15" class="form-control" v-model="nbr">
                  </div>
              </div>
          </div>
          <div class="row mb-3">
              <label for="abonnes" class="col-md-4 col-form-label text-md-end">Nombres d'abonnés par escorte (min=30, max=200)</label>
              <div class="col-md-6">
                  <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                      <input id="abonnes" type="number" required min="30" step="5" max="200" class="form-control" v-model="abonnes">
                  </div>
              </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    GENERER
                </button>
            </div>
          </div>
        </form>
      </div>
      <div v-if="girls_names.length >= 1" class="row">
        <div v-if="girls_names.length >= 1" class="container text-center">
          <h6 class="mb-1">{{ girls_names.length }}+ escortes disponibles actuellement pour génération automatique</h6>
          <form action="" @submit.prevent="storeEscorts()">
            <Button :form="form" class="btn btn-success">ENREGISTRER {{ girls_names.length }} ESCORTES MAINTENANT</Button>
          </form>
        </div>
        <div v-if="girls_names.length > 0" class="container-fluid my-2">
          <ul class="list-group">
            <li v-for="girl_name in girls_names" v-bind:key="girl_name.id" class="list-group-item"> 
              <h6 v-if="girls[girl_name.Name] && girls[girl_name.Name]['images']">{{girl_name.Name +" -- "+girls[girl_name.Name]['images_count']+" photos"}}</h6>
              <div v-if="girls[girl_name.Name]" class="row">
                <div v-for="(value, index) in girls[girl_name.Name].images" v-bind:key="index" class="col-2">
                  <img :src="'/storage/attachments/escorts/'+girl_name.Name+'/'+value">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div v-if="choice == 'manual' && !form.successful" class="card-body">
      <h4 class="text-center">
        <small class="text-muted">Génération Manuelle</small>
      </h4>
      <div class="card-body">
        <form action="" enctype="multipart/form-data" @submit.prevent="storeEscorts()">
            <div id="step1">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nom d\'utilisateur</label>
                    <div v-if="choice=='auto' && form.successful">
                          <HasError :form="form" field="names" />
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input id="name" type="text" class="form-control text-lowercase" v-if="name" v-model="name.Name" required aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" @click="getPrenom()">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>
                        <HasError :form="form" field="password" />
                    <div class="col-md-6">
                        <div class="input-group">
                            <i class="bi bi-key input-group-text"></i>
                            <input id="password" type="password" class="form-control"  v-model="form.password" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmer Mot de passe</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <i class="bi bi-key-fill input-group-text"></i>
                            <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" required>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div id="step2">
                <div class="row mb-3">
                  <label for="abonnes_indiv" class="col-md-4 col-form-label text-md-end">Nombres d'abonnés pour {{name.Name}} (min=30, max=200)</label>
                  <div class="col-md-6">
                      <div class="input-group">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                          <input id="abonnes_indiv" type="number" required min="30" step="5" max="200" class="form-control" v-model="abonnes">
                      </div>
                  <HasError :form="form" field="abonnes" />
                  </div>
              </div>
                <div class="row mb-3">
                    <label for="photos" class="col-md-4 col-form-label text-md-end">Photos</label>
                    <div class="col-md-6">
                      <div class="flex-col mb-4">
                      <div
                        class="input-group"
                        @click="showFilesPicker()"
                      >
                        <button type="button" class="input-group-text">
                          <i class="bi bi-images input-group-text"></i>
                        </button>
                        <input
                          style="cursor: pointer"
                          type="text"
                          v-bind:value="
                            files.length == 0
                              ? 'Sélect. photos (Aucun fichier choisi)'
                              : files.length + ' photo(s) sélectionée(s)'
                          "
                          readonly
                          placeholder="Sélectionnez fichiers"
                          class="form-control bg-gray-200 border border-0"
                        />
                      </div>
                      <input
                        type="file"
                        multiple
                        ref="files"
                        class="d-none"
                        v-on:change="onFilesChange"
                        accept="image/jpg,image/png,image/jpeg"
                      />
                      <HasError :form="form" field="files" />
                      <div v-html="getFilesNames()" class="filesNames"></div>
                    </div>
                        <!-- <div class="input-group">
                            <i class="bi bi-images input-group-text"></i>
                            <input class="form-control" name="files[]" id="photos" required type="file" multiple>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <Button :form="form" class="btn btn-primary">INSCRIRE</Button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      choice: null,
      abonnes: 0,
      nbr: null,
      generate_girls: false,
      girls_names: [],
      girls: [],
      files: [],
      name: null,
      form: new Form({
        way: null,
        abonnes: 0,
        names: [],
        password: 'password',
        password_confirmation: 'password',
        girls_images: [],
        files: [],
      }),
      formErrors: null,
      success: null,
      fail: null,
    };
  },

  methods: {
    getGirls(nbr) {
      this.girls = [];
      axios
        .get("/admin/escorts/get-girls/" + nbr)
        .then((response) => {
          this.girls_names = response.data.girls_names;
          this.girls = response.data.girls;
          if(this.girls_names.length > 0)
            this.generate_girls = false;
          else
            this.generate_girls = true;
            console.log(response.data)
        })
        .catch((error) => console.log(error));
    },
    getPrenom() {
      axios
        .get("/admin/escorts/get-prenom/1/")
        .then((response) => {
          this.name = response.data.prenom;
        })
        .catch((error) => console.log(error));
    },
    showFilesPicker() {
      this.$refs.files.click();
    },
     getFilesNames() {
      let filesName = [];
      if (this.files.length > 0) {
        for (let file of this.files) {
          filesName.push(file.name);
        }
      }
      return filesName.join("<br/>");
    },
    onFilesChange(event) {
      this.files = event.target.files;
    },
    async storeEscorts() {
      this.form.reset();
      this.form.way = this.choice;
      this.form.abonnes = this.abonnes;
      this.form.files = this.files;
      this.form.girls_images = this.girls;
      if (this.form.way == 'auto' && this.girls_names.length > 0){
        for(let girl_name of this.girls_names){
          this.form.names.push(girl_name.Name);
        }
      }
      if(this.form.way == 'manual' && this.name != null)
        this.form.names.push(this.name.Name);
      console.log(this.form);
      const response = this.form.post('/admin/escorts');
      console.log(response);
    },
  },

  created: function () {
    this.girls = [];
    this.girls_names = [];
  },
};
</script>
