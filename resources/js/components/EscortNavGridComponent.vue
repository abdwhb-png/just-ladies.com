<template>
  <div class="h-full">
    <nav
      class="h-12 flex items-end pb-2 sticky md:static md:top-0 bg-white z-10 border-b md:border-0 md:pb-4 border-gray-600 justify-center"
      style="top: 56px"
    >
      <ul class="w-full md:max-w-xs grid grid-cols-3 gap-1 px-4">
        <li class="mx-6 text-center">
          <a
            href="#profile"
            id="profileBtn"
            title="profile"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 1), showHide(0)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 1 }"
            ><i aria-hidden="true" class="fak fa-c-medias"></i
          ></a>
        </li>

        <!-- <li class="mx-6 text-center"><a href="#stories" id="stories" title="stories" class="focus:outline-none text-2xl" v-on:click="selected = 2, showHide(1)" :class="{'text-gray-700 hover:text-gray-800':selected != 2}"><i aria-hidden="true" class="fak fa-c-story"></i></a></li> -->

        <li class="mx-6 text-center">
          <a
            href="#infos"
            id="infosBtn"
            title="infos"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 4), showHide(3)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 4 }"
            ><i aria-hidden="true" class="fak fa-c-contract"></i
          ></a>
        </li>

        <li class="mx-6 text-center">
          <a
            href="#services"
            id="servicesBtn"
            title="services"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 5), showHide(4)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 5 }"
            ><i aria-hidden="true" class="fak fa-c-services"></i
          ></a>
        </li>
      </ul>
    </nav>

    <div id="tabs" class="overflow-hidden pb-4 md:pb-0">
      <div class="h-full relative">
        <section id="profile" v-if="tabs[0].tabValue == 'true'">
          <div class="row my-2 mx-1">
            <div class="col">
              <button
                type="button"
                class="btn-primary mini"
                data-bs-toggle="modal"
                data-bs-target="#galleryModal"
              >
                <span>Ajouter des photos</span>
              </button>
              <!-- Add gallery images Modal -->
              <div
                class="modal fade"
                id="galleryModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal__header" id="exampleModalLabel">Gallerie</h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <form
                      action=""
                      enctype="multipart/form-data"
                      @submit.prevent="updateGallery()"
                    >
                      <div class="modal-body">
                        <div v-if="galleryForm.successful" class="h-full">
                          <AlertSuccess :form="galleryForm" message="Nouveles photos ajoutées à la gallerie avec succès" />
                        </div>
                        <div v-else class="h-full">
                          <AlertErrors :form="galleryForm" message="Vérifiez les erreurs suivantes: "></AlertErrors>
                          <div class="flex flex-col h-full justify-between">
                            <div class="mb-4">
                              <div class="fle">
                                <label for="publics" class="legend mb-2">Sélectionnez les photos</label>
                                  <HasError :form="galleryForm" field="files" />
                                <div class="flex-col mb-4">
                                  <div
                                    class="input-group input-group-lg"
                                    @click="showFilesPicker()"
                                  >
                                    <button type="button" class="input-group-text">
                                      <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    </button>
                                    <input
                                      style="cursor: pointer"
                                      type="text"
                                      v-bind:value="
                                        files.length == 0
                                          ? 'Sélectionnez vos photos'
                                          : files.length + ' photo(s) sélectionée(s)'
                                      "
                                      readonly
                                      placeholder="Sélectionner fichiers"
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
                                  <div v-html="getFilesNames()" class="filesNames"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button v-if="galleryForm.successful"
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal" @click.prevent="reloadPage()"
                        >
                          Fermer
                        </button>
                        <button v-else
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                        >
                          Fermer
                        </button>
                        <Button :form="galleryForm" :disabled="galleryForm.successful?true:false" class="btn btn-primary">Enregistrer</Button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
              <button
                data-bs-toggle="modal"
                data-bs-target="#profilePicModal"
                class="mini btn-primary me-md-2"
                type="button"
              >
                Photo de profil
              </button>
              <!-- Add profil Pic Modal -->
              <div
                class="modal fade"
                id="profilePicModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog" style="max-width: 700px;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal__header" id="exampleModalLabel">
                        Photo de profil
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <form
                      action=""
                      enctype="multipart/form-data"
                    >
                      <div class="modal-body">
                        <div class="h-full">
                          <div class="flex flex-col h-full justify-between">
                            <div class="mb-4">
                              <div class="fle">
                                <label for="publics" class="legend mb-2"
                                  >Sélectionnez une photo dans votre gallerie</label
                                >
                                <div class="row">
                                  <div class="text-bg-dark col-2 card" v-for="image in gallery" v-bind:key="image.id">
                                    <img :src="'/storage/' + image.image_path" class="card-img img-fluid" :alt="image.image_name">
                                    <div class="card-img-overlay">
                                     <button type="button" @click.prevent="updtProfilePic(image.image_path)" class="btn btn-warning btn-sm">Sélectionner</button>
                                    </div>
                                  </div>
                                </div>
                                <br>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                        >
                          Fermer
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <AlertSuccess :form="galleryForm" message="Nouveles photos ajoutées à la gallerie avec succès. Réactualisez la page pour afficher les modifications." />
          <div
            class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-0.252 md:gap-2 md:p-1"
          >
            <div
              v-for="image in gallery"
              v-bind:key="image.id"
              class="inline-block relative"
            >
              <a :href="
                  '/' +
                  escortName +
                  '/' +
                  escortId +
                  '/gallery/' +
                  '#gallery-item-' +
                  image.id
                ">
                <div
                  class="relative flex overflow-hidden w-full pb-default-ratio md:rounded transform transition-all duration-300 hover:scale-102"
                >
                  <img
                    :src="'/storage/' + image.image_path"
                    :alt="image.image_name"
                    class="w-full h-full absolute flex-shrink-0 object-cover bg-overlay girl-thumbnail-image"
                  />
                  <div class="absolute inset-0"></div>
                </div>
              </a>
              <button
                type="button"
                @click="deleteGalleryImage(image.id)"
                class="btn btn-danger my-1"
              >
                Supprimer
              </button>
            </div>
          </div>
          <div class="inline-block w-full px-4 my-7 clear-both md:flex md:justify-center">
            <button class="btn-primary big with-icon modalBtn">
              <span class="w-5 mr-2"></span> <span>Contacte-moi</span>
              <i aria-hidden="true" class="ml-2 fak fa-c-phone justify-self-end"></i>
            </button>
          </div>
        </section>
        <!-- <section id="stories" v-if="tabs[1].tabValue == 'true'">
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-0.252 md:gap-2 md:p-1">
                        <div class="inline-block relative">
                            <div class="relative flex overflow-hidden w-full pb-default-ratio md:rounded transform transition-all duration-300 hover:scale-102 cursor-pointer"><img src="https://www.bemygirl.ch/images/placeholder.png" data-url="/storage/video/ZvIYIPo2OFDtD7C7KclbF0eM8ljLsq2DPzhoqhvF.jpg" alt="daphne-escort-genève-ZvIYIPo2OFDtD7C7KclbF0eM8ljLsq2DPzhoqhvF.jpg" class="w-full h-full absolute flex-shrink-0 object-cover bg-gray-100">
                                <div class="absolute bottom-2 right-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-white text-black text-sm"><i aria-hidden="true" class="fak fa-c-video"></i></span></div>
                                <div class="absolute inset-0"></div>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block w-full px-4 my-7 clear-both md:flex md:justify-center"><button class="btn-primary big with-icon modalBtn"><span class="w-5 mr-2"></span> <span>Contacte-moi</span> <i aria-hidden="true" class="ml-2 fak fa-c-phone justify-self-end"></i></button></div>
                </section> -->
        <section id="infos" v-if="tabs[3].tabValue == 'true'">
          <div
            class="gap-6 md:max-w-xl md:mx-auto px-4 my-2 clear-both md:justify-center"
          >
            <button
              type="button"
              class="btn-primary mini"
              data-bs-toggle="modal"
              data-bs-target="#infosModal"
            >
              <span>Modifier cette partie</span>
            </button>
            <AlertSuccess :form="infosForm" message="Nouvelles informations enregistrées avec succès." />
            <!-- Modal -->
            <div
              class="modal fade"
              id="infosModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <form action="" @submit.prevent="updateInfos()">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal__header" id="exampleModalLabel">Informations</h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div v-if="infosForm.successful" class="h-full">
                          <AlertSuccess :form="infosForm" message="Nouvelles informations enregistrées avec succès." />
                        </div>
                      <div v-else class="h-full">
                        <AlertErrors :form="infosForm" message="Vérifiez les erreurs suivantes: "></AlertErrors>
                        <div class="flex flex-col h-full justify-between">
                          <div class="mb-4">
                            <div class="fle">
                              <label for="language" class="legend mb-2"
                                >Langues parlées</label
                              >
                              <div class="flex-col mb-4">
                                <div
                                  v-on:click="
                                    infosForm.lang_fr
                                      ? (infosForm.lang_fr = 0)
                                      : (infosForm.lang_fr = 1),
                                      gestLang()
                                  "
                                  :class="{ 'bg-gray-400': infosForm.lang_fr == 1 }"
                                  class="bg-gray-100 inline-block mb-1 text-gray-900 py-1 px-2 rounded text-sm font-thin mr-2"
                                >
                                  <input
                                    class="bg-gray-100 text-gray-500 mr-1 rounded"
                                    type="checkbox"
                                    v-model="langFrCheckbox"
                                  />
                                  <input
                                    type="hidden"
                                    v-model="infosForm.lang_fr"
                                    name="lang_fr"
                                  />
                                  <span class="">Français</span>
                                </div>
                                <div
                                  v-on:click="
                                    infosForm.lang_en
                                      ? (infosForm.lang_en = 0)
                                      : (infosForm.lang_en = 1),
                                      gestLang()
                                  "
                                  :class="{ 'bg-gray-400': infosForm.lang_en == 1 }"
                                  class="bg-gray-100 inline-block mb-1 text-gray-900 py-1 px-2 rounded text-sm font-thin mr-2"
                                >
                                  <input
                                    class="bg-gray-100 text-gray-500 mr-1 rounded"
                                    type="checkbox"
                                    v-model="langEnCheckbox"
                                  />
                                  <input
                                    type="hidden"
                                    v-model="infosForm.lang_en"
                                    name="lang_en"
                                  />
                                  <span class="">Anglais</span>
                                </div>
                                <div
                                  v-on:click="
                                    infosForm.lang_es
                                      ? (infosForm.lang_es = 0)
                                      : (infosForm.lang_es = 1),
                                      gestLang()
                                  "
                                  :class="{ 'bg-gray-400': infosForm.lang_es == 1 }"
                                  class="bg-gray-100 inline-block mb-1 text-gray-900 py-1 px-2 rounded text-sm font-thin mr-2"
                                >
                                  <input
                                    class="bg-gray-100 text-gray-500 mr-1 rounded"
                                    type="checkbox"
                                    v-model="langEsCheckbox"
                                  />
                                  <input
                                    type="hidden"
                                    v-model="infosForm.lang_es"
                                    name="lang_es"
                                  />
                                  <span class="">Espagnol</span>
                                </div>
                                <div
                                  v-on:click="
                                    infosForm.lang_de
                                      ? (infosForm.lang_de = 0)
                                      : (infosForm.lang_de = 1),
                                      gestLang()
                                  "
                                  :class="{ 'bg-gray-400': infosForm.lang_de == 1 }"
                                  class="bg-gray-100 inline-block mb-1 text-gray-900 py-1 px-2 rounded text-sm font-thin mr-2"
                                >
                                  <input
                                    class="bg-gray-100 text-gray-500 mr-1 rounded"
                                    type="checkbox"
                                    v-model="langDeCheckbox"
                                  />
                                  <input
                                    type="hidden"
                                    v-model="infosForm.lang_de"
                                    name="lang_de"
                                  />
                                  <span class="">Allemand</span>
                                </div>
                              </div>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="height" class="legend mb-2">Taille - cm</label>
                              <HasError :form="infosForm" field="height" />
                              <select
                                name="height"
                                id="height"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.height"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in heightOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="age" class="legend mb-2">Age - années</label>
                              <HasError :form="infosForm" field="age" />
                              <select
                                name="age"
                                id="age"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.age"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in ageOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="eyes" class="legend mb-2">Yeux - couleur</label>
                              <HasError :form="infosForm" field="eyes" />
                              <select
                                name="eyes"
                                id="eyes"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.eyes"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in eyesOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="weight" class="legend mb-2">Poids - kg</label>
                              <HasError :form="infosForm" field="weight" />
                              <select
                                name="weight"
                                id="weight"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.weight"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in weightOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="hair" class="legend mb-2">Cheveux</label>
                              <HasError :form="infosForm" field="hair" />
                              <select
                                name="hair"
                                id="hair"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.hair"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in hairOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="pubic_hair" class="legend mb-2">Maillot</label>
                              <HasError :form="infosForm" field="pubic_hair" />
                              <select
                                name="pubic_hair"
                                id="pubic_hair"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.pubic_hair"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in pubicHairOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="breasts" class="legend mb-2">Poitrine</label>
                              <HasError :form="infosForm" field="breasts" />
                              <select
                                name="breasts"
                                id="breasts"
                                required=""
                                class="form-input h-10"
                                v-model="infosForm.breasts"
                              >
                                <option value="0" disabled>-</option>
                                <option
                                  v-for="(value, index) in breastsOptions"
                                  v-bind:key="index"
                                  :value="value"
                                >
                                  {{ value }}
                                </option>
                              </select>
                            </div>
                            <div class="flex flex-col mb-4">
                              <label for="about" class="legend mb-2"
                                >A propos (5000)</label
                              >
                              <HasError :form="infosForm" field="about" />
                              <textarea
                                id="about"
                                name="about"
                                class="form-input h-flex"
                                placeholder="A propos"
                                rows="3"
                                maxlength="5000"
                                v-model="infosForm.about"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                                              <button v-if="infosForm.successful"
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal" @click.prevent="reloadPage()"
                        >
                          Fermer
                        </button>
                      <button v-else
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Fermer
                      </button>
                      <Button :form="infosForm" :disabled="infosForm.successful?true:false" class="btn btn-primary">Enregistrer</Button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div
            class="p-4 bg-gray-100 grid grid-cols-4 items-center justify-items-center gap-6 md:rounded-lg md:max-w-xl md:mx-auto"
          >
            <div class="text-center flex flex-col items-center">
              <a href="#" class="flex flex-col items-center text-center"
                ><i aria-hidden="true" class="fak fa-c-country text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  <span v-show="infosForm.lang_fr"> Français </span>
                  <span v-show="infosForm.lang_en"> Anglais </span>
                  <span v-show="infosForm.lang_es"> Espagnol </span>
                  <span v-show="infosForm.lang_de"> Allemand </span>
                </span>
              </a>
            </div>
            <div class="text-center flex flex-col items-center">
              <i aria-hidden="true" class="fak fa-c-rule text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ infosForm.height }} cm </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i aria-hidden="true" class="fak fa-c-birthday text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ infosForm.age }} ans </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i aria-hidden="true" class="fak fa-c-show text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ infosForm.eyes }}</span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i aria-hidden="true" class="fak fa-c-weight text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ infosForm.weight }} kg </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <a
                href="https://www.bemygirl.ch/fr/escorts/cheveux-chatains-clairs"
                class="flex flex-col items-center text-center"
                ><i aria-hidden="true" class="fak fa-c-hairs text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1"> {{ infosForm.hair }} </span></a
              >
            </div>
            <div class="text-center flex flex-col items-center">
              <a
                href="https://www.bemygirl.ch/fr/escorts/epile"
                class="flex flex-col items-center text-center"
                ><i aria-hidden="true" class="fak fa-c-legs text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ infosForm.pubic_hair }}
                </span></a
              >
            </div>
            <div class="text-center flex flex-col items-center">
              <a
                href="https://www.bemygirl.ch/fr/escorts/moyenne-poitrine"
                class="flex flex-col items-center text-center"
                ><i aria-hidden="true" class="fak fa-c-breast text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ infosForm.breasts }}
                </span></a
              >
            </div>
          </div>
          <div class="max-w-prose md:mx-auto p-4 text-sm my-4">
            <span id="" class="font-semibold">A propos: </span>
            <em v-if="!aboutEscort()">(vide)</em><br />
            <div v-if="aboutEscort()">{{ infosForm.about }}</div>
            <div v-else>
              Veuillez renseigner toute information sur vous que vous jugez utile de
              partager!
            </div>
          </div>
          <div class="inline-block w-full px-4 my-7 clear-both md:flex md:justify-center">
            <button class="btn-primary big with-icon modalBtn">
              <span class="w-5 mr-2"></span> <span>Contacte-moi</span>
              <i aria-hidden="true" class="ml-2 fak fa-c-phone justify-self-end"></i>
            </button>
          </div>
        </section>
        <section id="services" v-if="tabs[4].tabValue == 'true'">
          <div class="md:max-w-xl mx-auto">
            <div class="p-4 border-b border-gray-600">
              <h2 class="font-bold text-tiny md:text-lg mb-2">Services</h2>
              <div
                class="gap-6 md:max-w-xl md:mx-auto px-4 my-2 clear-both md:justify-center"
              >
                <button
                  type="button"
                  class="btn-primary mini"
                  data-bs-toggle="modal"
                  data-bs-target="#servicesModal"
                >
                  <span>Modifier cette partie</span>
                </button>
                <div
                  class="alert alert-success my-2"
                  role="alert"
                  style="
                    border-left: 14px solid rgb(85, 181, 109) !important;
                    display: none;
                  "
                ></div>
                <AlertSuccess :form="servicesForm" message="Nouveaux services enregistrés avec succès." />
                <!-- Modal -->
                <div
                  class="modal fade"
                  id="servicesModal"
                  tabindex="-1"
                  aria-hidden="true"
                >
                  <div class="modal-dialog">
                    <form action="" @submit.prevent="updateServices()">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal__header" id="exampleModalLabel">Services</h1>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <div v-if="servicesForm.successful" class="h-full">
                          <AlertSuccess :form="servicesForm" message="Nouveaux services enregistrés avec succès." />
                        </div>
                          <div v-else class="h-full">
                            <AlertErrors :form="servicesForm" message="Vérifiez les erreurs suivantes: "></AlertErrors>
                            <div class="flex flex-col h-full justify-between">
                              <div class="mb-4">
                                <div class="fle">
                                  <label for="language" class="legend mb-2"
                                    >Services proposés</label
                                  >
                                  <HasError :form="servicesForm" field="newServices" />
                                  <div class="flex-col mb-4">
                                    <div
                                      v-for="allService in allServices"
                                      v-bind:key="allService.index"
                                      v-on:click="
                                        allService.value
                                          ? (allService.value = 'false')
                                          : (allService.value = 'true'),
                                          reloadServices(allService.index)
                                      "
                                      :class="{
                                        'bg-gray-400': allService.value == 'true',
                                      }"
                                      class="bg-gray-100 inline-block mb-1 text-gray-900 py-1 px-2 rounded text-sm font-thin mr-2"
                                    >
                                      <input
                                        class="bg-gray-100 text-gray-500 mr-1 rounded"
                                        type="checkbox"
                                        v-model="allService.value"
                                      />
                                      <input
                                        v-if="allService.value == 'true'"
                                        type="hidden"
                                        name=""
                                        :value="allService.index"
                                      />
                                      <span class="">{{ allService.index }}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div v-show="infosForm.lang_fr" class="flex flex-col mb-4">
                                <label for="lang_fr_maitrise" class="legend mb-2"
                                  >Niveau Français</label
                                >
                                <HasError :form="servicesForm" field="lang_fr_maitrise" />
                                <select
                                  name="lang_fr_maitrise"
                                  id="lang_fr_maitrise"
                                  required=""
                                  class="form-input h-10"
                                  v-model="servicesForm.lang_fr_maitrise"
                                >
                                  <option
                                    v-for="langageMaitriseOption in langageMaitriseOptions"
                                    v-bind:key="langageMaitriseOption.index"
                                    :value="langageMaitriseOption.index"
                                    v-bind:disabled="
                                      langageMaitriseOption.index == '0' ? true : false
                                    "
                                  >
                                    {{ langageMaitriseOption.value }}
                                  </option>
                                </select>
                              </div>
                              <div v-show="infosForm.lang_en" class="flex flex-col mb-4">
                                <label for="lang_en_maitrise" class="legend mb-2"
                                  >Niveau Anglais</label
                                >
                                <HasError :form="servicesForm" field="lang_en_maitrise" />
                                <select
                                  name="lang_en_maitrise"
                                  id="lang_en_maitrise"
                                  required=""
                                  class="form-input h-10"
                                  v-model="servicesForm.lang_en_maitrise"
                                >
                                  <option
                                    v-for="langageMaitriseOption in langageMaitriseOptions"
                                    v-bind:key="langageMaitriseOption.index"
                                    :value="langageMaitriseOption.index"
                                    v-bind:disabled="
                                      langageMaitriseOption.index == '0' ? true : false
                                    "
                                  >
                                    {{ langageMaitriseOption.value }}
                                  </option>
                                </select>
                              </div>
                              <div v-show="infosForm.lang_es" class="flex flex-col mb-4">
                                <label for="lang_es_maitrise" class="legend mb-2"
                                  >Niveau Espagnol</label
                                >
                                <HasError :form="servicesForm" field="lang_es_maitrise" />
                                <select
                                  name="lang_es_maitrise"
                                  id="lang_es_maitrise"
                                  required=""
                                  class="form-input h-10"
                                  v-model="servicesForm.lang_es_maitrise"
                                >
                                  <option
                                    v-for="langageMaitriseOption in langageMaitriseOptions"
                                    v-bind:key="langageMaitriseOption.index"
                                    :value="langageMaitriseOption.index"
                                    v-bind:disabled="
                                      langageMaitriseOption.index == '0' ? true : false
                                    "
                                  >
                                    {{ langageMaitriseOption.value }}
                                  </option>
                                </select>
                              </div>
                              <div v-show="infosForm.lang_de" class="flex flex-col mb-4">
                                <label for="lang_de_maitrise" class="legend mb-2"
                                  >Niveau Allemand</label
                                >
                                <HasError :form="servicesForm" field="lang_de_maitrise" />
                                <select
                                  name="lang_de_maitrise"
                                  id="lang_de_maitrise"
                                  required=""
                                  class="form-input h-10"
                                  v-model="servicesForm.lang_de_maitrise"
                                >
                                  <option
                                    v-for="langageMaitriseOption in langageMaitriseOptions"
                                    v-bind:key="langageMaitriseOption.index"
                                    :value="langageMaitriseOption.index"
                                    v-bind:disabled="
                                      langageMaitriseOption.index == '0' ? true : false
                                    "
                                  >
                                    {{ langageMaitriseOption.value }}
                                  </option>
                                </select>
                              </div>
                              <div class="flex flex-col mb-4">
                                <label for="mobility" class="legend mb-2">Mobilité</label>
                                <HasError :form="servicesForm" field="mobility" />
                                <select
                                  name="mobility"
                                  id="mobility"
                                  required=""
                                  class="form-input h-10"
                                  v-model="servicesForm.mobility"
                                >
                                  <option
                                    v-for="(value, index) in mobilityOptions"
                                    v-bind:key="index"
                                    :value="value"
                                  >
                                    {{ value }}
                                  </option>
                                </select>
                              </div>
                              <div class="fle">
                                <label for="language" class="legend mb-2">Tarifs</label>
                                <HasError :form="servicesForm" field="tarif30M" />
                                <HasError :form="servicesForm" field="tarif1H" />
                                <HasError :form="servicesForm" field="tarif1N" />
                                <HasError :form="servicesForm" field="tarif1W" />
                                <div class="flex-col mb-4">
                                  <div class="row mb-1 text-gray-900 mr-1">
                                    <span class="col-3">30 Minutes : </span>
                                    <input
                                      class="form-input h-10 col-9"
                                      type="text"
                                      v-model="servicesForm.tarif30M"
                                      name="30M"
                                    />
                                  </div>
                                  <div class="row mb-1 text-gray-900 mr-1">
                                    <span class="col-3">1 Heure : </span>
                                    <input
                                      class="form-input h-10 col-9"
                                      type="text"
                                      v-model="servicesForm.tarif1H"
                                      name="30M"
                                    />
                                  </div>
                                  <div class="row mb-1 text-gray-900 mr-1">
                                    <span class="col-3">1 Nuit : </span>
                                    <input
                                      class="form-input h-10 col-9"
                                      type="text"
                                      v-model="servicesForm.tarif1N"
                                      name="1N"
                                    />
                                  </div>
                                  <div class="row mb-1 text-gray-900 mr-1">
                                    <span class="col-3">1 Week-end : </span>
                                    <input
                                      class="form-input h-10 col-9"
                                      type="text"
                                      v-model="servicesForm.tarif1W"
                                      name="1W"
                                    />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                                                  <button v-if="servicesForm.successful"
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal" @click.prevent="reloadPage()"
                        >
                          Fermer
                        </button>
                          <button v-else
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                          >
                            Fermer
                          </button>
                          <Button :form="servicesForm" :disabled="servicesForm.successful?true:false" class="btn btn-primary">Enregistrer</Button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div
                v-for="(value, index) in servicesTab"
                v-bind:key="index"
                v-show="value != ''"
                class="inline-block mb-1 mr-1 bg-gray-300 text-gray-900 py-1 px-2 rounded text-sm font-thin"
              >
                <a href="#">{{ value }}</a>
              </div>
            </div>
            <div class="p-4 border-b border-gray-600">
              <h2 class="font-bold text-tiny md:text-lg my-2">Langues</h2>
              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                <div v-show="infosForm.lang_fr" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Français
                  </span>
                  <div v-html="langageMaitrise(servicesForm.lang_fr_maitrise)"></div>
                </div>
                <div v-show="infosForm.lang_es" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Espagnol
                  </span>
                  <div v-html="langageMaitrise(servicesForm.lang_es_maitrise)"></div>
                </div>
                <div v-show="infosForm.lang_en" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Anglais
                  </span>
                  <div v-html="langageMaitrise(servicesForm.lang_en_maitrise)"></div>
                </div>
                <div v-show="infosForm.lang_de" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Allemand
                  </span>
                  <div v-html="langageMaitrise(servicesForm.lang_de_maitrise)"></div>
                </div>
              </div>
            </div>
            <div class="pt-4 px-4">
              <div class="pb-4 border-b border-gray-600">
                <div class="flex justify-between items-center">
                  <h2 class="font-bold text-tiny md:text-lg my-2">
                    Tarifs &amp; Horaires
                  </h2>
                  <span class="text-gray-700 text-sm"> {{ servicesForm.mobility }} </span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      30 Minutes
                    </span>
                    <span class="text-tiny font-thin">
                      {{ servicesForm.tarif30M }}.-
                    </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Heure
                    </span>
                    <span class="text-tiny font-thin">
                      {{ servicesForm.tarif1H }}.-
                    </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Nuit
                    </span>
                    <span class="text-tiny font-thin">
                      {{ servicesForm.tarif1N }}.-
                    </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Week-end
                    </span>
                    <span class="text-tiny font-thin">
                      {{ servicesForm.tarif1W }}.-
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-4">
              <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Lundi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Mardi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Mercredi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Jeudi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Vendredi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Samedi</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
                <div class="inline-block mb-4">
                  <div class="block text-gray-700 font-semibold text-xxs">Dimanche</div>
                  <span class="text-tiny font-thin"> 24/24 </span>
                </div>
              </div>
            </div>
            <div
              class="inline-block w-full px-4 my-7 clear-both md:flex md:justify-center"
            >
              <button class="btn-primary big with-icon modalBtn">
                <span class="w-5 mr-2"></span> <span>Contacte-moi</span>
                <i aria-hidden="true" class="ml-2 fak fa-c-phone justify-self-end"></i>
              </button>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
            escortInfos: {
              type: String,
               required: true,
            },
            escortId:{
              type: String,
               required: true,
            },
            escortName:{
              type: String,
               required: true,
            },
        },
  data() {
    return {
      selected: 1,
      response: null,
      resposeTitle: "",
      tabs: [
        { tabId: "isProfile", tabValue: "false" },
        { tabId: "isStories", tabValue: "false" },
        { tabId: "isPaidContent", tabValue: "false" },
        { tabId: "isInfos", tabValue: "false" },
        { tabId: "isServices", tabValue: "false" },
      ],

      eyesOptions: ["Bleu", "Brun Clair", "Brun", "Vert", "Noisette", "Autre"],
      hairOptions: ["Noir", "Blond", "Châtain", "Châtain-Clair", "Roux", "Autre"],
      pubicHairOptions: ["Epilé", "Taillé", "Poilu"],
      breastsOptions: ["XXL", "Grosse", "Moyenne", "Petite", "Naturelle"],
      user_id: window.escortInfos.user_id,
      gallery: window.gallery,
      files: [],
      file: [],
      stories: null,
      langFrCheckbox: null,
      langEnCheckbox: null,
      langEsCheckbox: null,
      langDeCheckbox: null,
      heightOptions: [],
      ageOptions: [],
      weightOptions: [],

      langageMaitriseHtml: null,

      langageMaitriseOptions: [
        { index: "0", value: "-" },
        { index: "1", value: "Basique" },
        { index: "2", value: "Moyen" },
        { index: "3", value: "Bon" },
      ],
      mobilityOptions: ["Reçoit", "Se déplace", "Reçoit & Se déplace"],
      servicesTab: [],
      allServices: [
        { index: "69", value: "false" },
        { index: "Cunnilingus", value: "false" },
        { index: "Fellation protégée", value: "false" },
        { index: "Fellation naturelle", value: "false" },
        { index: "Anal", value: "false" },
        { index: "Éjaculation corporelle", value: "false" },
        { index: "Lesbo show", value: "false" },
        { index: "Embrasse", value: "false" },
        { index: "GFE", value: "false" },
        { index: "Massage érotique", value: "false" },
        { index: "Massage sur table", value: "false" },
        { index: "Massage tantrique", value: "false" },
        { index: "Massage prostatique", value: "false" },
        { index: "Sex toys", value: "false" },
        { index: "Striptease", value: "false" },
        { index: "Voyage", value: "false" },
        { index: "Restaurant", value: "false" },
        { index: "Massage 4 mains", value: "false" },
        { index: "BDSM", value: "false" },
        { index: "Massage aux huiles", value: "false" },
        { index: "Massage naturiste", value: "false" },
        { index: "Gode ceinture", value: "false" },
        { index: "Fétichisme", value: "false" },
        { index: "+ 2 hommes", value: "false" },
        { index: "Douche dorée", value: "false" },
        { index: "Jeu de rôles", value: "false" },
        { index: "Soumission (légère)", value: "false" },
      ],
      //forms
      galleryForm: new Form({
        files: [],
        stories: null,
      }),
      profilePicForm: new Form({
        file_path: "",
      }),
      infosForm: new Form({
        from: "infos",
        lang_fr: window.escortInfos.lang_fr,
        lang_en: window.escortInfos.lang_en,
        lang_es: window.escortInfos.lang_es,
        lang_de: window.escortInfos.lang_de,
        height: window.escortInfos.height,
        age: window.escortInfos.age,
        eyes: window.escortInfos.eyes,
        weight: window.escortInfos.weight,
        hair: window.escortInfos.hair,
        pubic_hair: window.escortInfos.pubic_hair,
        breasts: window.escortInfos.breasts,
        about: window.escortInfos.about,
      }),
      servicesForm: new Form({
        from: "services",
        lang_fr_maitrise: window.escortInfos.lang_fr_maitrise,
        lang_en_maitrise: window.escortInfos.lang_en_maitrise,
        lang_es_maitrise: window.escortInfos.lang_es_maitrise,
        lang_de_maitrise: window.escortInfos.lang_de_maitrise,
        mobility: window.escortInfos.mobility,
        tarif30M: window.escortInfos.tr_30M,
        tarif1H: window.escortInfos.tr_1H,
        tarif1N: window.escortInfos.tr_1N,
        tarif1W: window.escortInfos.tr_1W,
        services: window.escortInfos.services,
        newServices: "",
      }),
    };
  },

  methods: {
    aboutEscort() {
      if (!this.infosForm.about) {
        return false;
      } else {
        return true;
      }
    },
    showHide(idx) {
      for (let i = 0; i < 5; i++) {
        if (i != idx) {
          if (this.tabs[i].tabValue != "false") {
            this.tabs[i].tabValue = "false";
          }
        } else {
          this.tabs[i].tabValue = "true";
          this.response = false;
        }
      }
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
    // onFileChange(event) {
    //   this.file = event.target.files[0];
    // },
    async updateGallery() {
      this.galleryForm.reset();
      this.galleryForm.files = this.files;
      this.galleryForm.stories = 0;
      const response = this.galleryForm.post("escort/" + this.user_id + "/gallery");
      console.log(response);
    },
    async updtProfilePic(image_path){
      this.profilePicForm.reset();
      this.profilePicForm.file_path = image_path;
      const response = this.profilePicForm.post("escort/profilepic/" + this.user_id);
      console.log(response);
      window.location.reload();
    },
    deleteGalleryImage(imageId) {
      if (confirm("Voulez-vous réellement supprimer ?")) {
        axios
          .delete("escort/" + this.user_id + "/deleteimg/" + imageId)
          .then((response) => {
            if (response.data.response) {
              window.location.reload();
            }
            this.response = response.data.response;
            this.responseTitle = response.data.title;
          })
          .catch((err) => console.log(err));
      }
    },
    gestLang() {
      if (this.infosForm.lang_fr == 0) {
        this.langFrCheckbox = false;
      } else {
        this.langFrCheckbox = true;
      }
      if (this.infosForm.lang_en == 0) {
        this.langEnCheckbox = false;
      } else {
        this.langEnCheckbox = true;
      }
      if (this.infosForm.lang_de == 0) {
        this.langDeCheckbox = false;
      } else {
        this.langDeCheckbox = true;
      }
      if (this.infosForm.lang_es == 0) {
        this.langEsCheckbox = false;
      } else {
        this.langEsCheckbox = true;
      }
    },
    langageMaitrise(nbr) {
      if (nbr == 1 || nbr == 0)
        return (this.langageMaitriseHtml =
          '<span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>  <span class="inline-block text-gray-600 text-xl"> <i aria-hidden="true" class="fak fa-c-star"></i> </span>  <span class="inline-block text-gray-600 text-xl"> <i aria-hidden="true" class="fak fa-c-star"></i> </span>');
      else if (nbr == 2)
        return (this.langageMaitriseHtml =
          '<span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>  <span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>  <span class="inline-block text-gray-600 text-xl"> <i aria-hidden="true" class="fak fa-c-star"></i> </span>');
      else
        return (this.langageMaitriseHtml =
          '<span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>  <span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>  <span class="inline-block text-yellow-400 text-xl"> <i aria-hidden="true" class="fak fa-c-starred"></i> </span>');
    },
    loadHeightSelect() {
      let j = 134;
      for (let i = 0; i < 62; i++) {
        this.heightOptions[i] = j;
        j++;
      }
    },
    loadAgeSelect() {
      let j = 18;
      for (let i = 0; i < 43; i++) {
        this.ageOptions[i] = j;
        j++;
      }
    },
    loadWeightSelect() {
      let j = 40;
      for (let i = 0; i < 161; i++) {
        this.weightOptions[i] = j;
        j++;
      }
    },
    async updateInfos() {
      const response = this.infosForm.put("escort/" + this.user_id);
      console.log(response);
    },

    gestServices(str) {
      return (this.servicesTab = str.split(",")); // On coupe à chaque fois qu'une virgule est rencontrée et on met dans un tableau
    },
    checkServices() {
      for (let i = 0; i < this.allServices.length; i++) {
        for (let j = 0; j < this.servicesTab.length; j++) {
          if (this.servicesTab[j] == this.allServices[i].index) {
            this.allServices[i].value = "true";
          }
        }
      }
    },
    reloadServices(serv) {
      for (let i = 0; i < this.allServices.length; i++) {
        if (this.allServices[i].index == serv) {
          this.allServices[i].value = "true";
        }
      }
    },
    updateServices() {
      this.servicesForm.newServices = '';
      for (let i = 0; i <= this.allServices.length; i++) {
        if (this.allServices[i].value == "true") {
          this.servicesForm.newServices =
            this.servicesForm.newServices + "," + this.allServices[i].index;
        }
      }

      const response = this.servicesForm.put("escort/" + this.user_id);
      console.log(response);
    },
    reloadPage() {
      window.location.reload();
    }
  },

  created: function () {
    this.showHide(0);
    this.gestLang();
    this.loadHeightSelect();
    this.loadAgeSelect();
    this.loadWeightSelect();

    this.gestServices(this.servicesForm.services);
    this.checkServices();
    
  },
};
</script>
