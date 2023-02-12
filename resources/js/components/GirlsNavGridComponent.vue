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
            title="profile"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 1), showHide(0)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 1 }"
            ><i class="fak fa-c-medias"></i
          ></a>
        </li>
        <!-- <li class="mx-6 text-center"><a href="#stories" title="stories" class="focus:outline-none text-2xl  text-gray-700 hover:text-gray-800"><i class="fak fa-c-story"></i></a></li> -->
        <li class="mx-6 text-center">
          <a
            href="#infos"
            title="infos"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 4), showHide(3)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 4 }"
            ><i class="fak fa-c-contract"></i
          ></a>
        </li>
        <li class="mx-6 text-center">
          <a
            href="#services"
            title="services"
            class="focus:outline-none text-2xl"
            v-on:click="(selected = 5), showHide(4)"
            :class="{ 'text-gray-700 hover:text-gray-800': selected != 5 }"
            ><i class="fak fa-c-services"></i
          ></a>
        </li>
      </ul>
    </nav>
    <div id="tabs" class="overflow-hidden pb-4 md:pb-0">
      <div class="h-full relative">
        <section id="profile" v-show="tabs[0].tabValue == 'true'">
          <div
            class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-0.252 md:gap-2 md:p-1"
          >
            <div
              v-for="gallery in girlGallery"
              v-bind:key="gallery.id"
              class="inline-block relative"
            >
              <a
                :href="
                  '/' +
                  escortName +
                  '/' +
                  escortId +
                  '/gallery/' +
                  '#gallery-item-' +
                  gallery.id
                "
              >
                <div
                  class="relative flex overflow-hidden w-full pb-default-ratio md:rounded transform transition-all duration-300 hover:scale-102"
                >
                  <img
                    :src="'/storage/' + gallery.image_path"
                    :alt="
                      escortName + '-escort-' + girlInfos.location + gallery.image_name
                    "
                    class="w-full h-full absolute flex-shrink-0 object-cover bg-overlay girl-thumbnail-image"
                  />
                  <div class="absolute inset-0"></div>
                </div>
              </a>
            </div>
          </div>
        </section>
        <!-- <section id="stories" style="display: none;">
                  <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-0.252 md:gap-2 md:p-1">
                      <div class="inline-block relative">
                          <div class="relative flex overflow-hidden w-full pb-default-ratio md:rounded transform transition-all duration-300 hover:scale-102 cursor-pointer "><img src="https://www.bemygirl.ch/images/placeholder.png" data-url="/storage/video/bAo1YUrhchI5lttorGIFApwISBREfocV6ckyWPHM.jpg" alt="stefania-escort-genève-bAo1YUrhchI5lttorGIFApwISBREfocV6ckyWPHM.jpg" class="w-full h-full absolute flex-shrink-0 object-cover bg-gray-100 ">
                              <div class="absolute bottom-2 right-2"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-white text-black text-sm"><i class="fak fa-c-video"></i></span></div>
                              <div class="absolute inset-0"></div>
                          </div>
                      </div>
                  </div>
              </section> -->
        <section id="infos" v-show="tabs[3].tabValue == 'true'">
          <div
            class="p-4 bg-gray-100 grid grid-cols-4 items-center justify-items-center gap-6 md:rounded-lg md:max-w-xl md:mx-auto"
          >
            <div class="text-center flex flex-col items-center">
              <a href="#" class="flex flex-col items-center text-center"
                ><i class="fak fa-c-country text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ girlInfos.origin }}
                </span></a
              >
            </div>
            <div class="text-center flex flex-col items-center">
              <i class="fak fa-c-rule text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ girlInfos.height }} cm </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i class="fak fa-c-birthday text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ girlInfos.age }} ans </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i class="fak fa-c-show text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1">
                {{ girlInfos.eyes }}
              </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <i class="fak fa-c-weight text-primary text-2xl"></i>
              <span class="font-semibold text-xs pt-1"> {{ girlInfos.weight }} kg </span>
            </div>
            <div class="text-center flex flex-col items-center">
              <a href="#" class="flex flex-col items-center text-center"
                ><i class="fak fa-c-hairs text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ girlInfos.hair }}
                </span></a
              >
            </div>
            <div class="text-center flex flex-col items-center">
              <a href="#" class="flex flex-col items-center text-center"
                ><i class="fak fa-c-legs text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ girlInfos.pubic_hair }}
                </span></a
              >
            </div>
            <div class="text-center flex flex-col items-center">
              <a href="" class="flex flex-col items-center text-center"
                ><i class="fak fa-c-breast text-primary text-2xl"></i>
                <span class="font-semibold text-xs pt-1">
                  {{ girlInfos.breasts }}
                </span></a
              >
            </div>
          </div>
          <div class="max-w-prose md:mx-auto p-4 text-sm my-4">
            <span id="" class="font-semibold">A propos de {{ escortName }}: </span>
            <div v-if="aboutGirl()">{{ girlInfos.about }}</div>
            <div v-else>
              Bonjour! <br />

              Je suis {{ escortName }}, escort indépendante en {{ girlInfos.country }} !
              💋🔥<br />

              Si vous êtes un homme à la recherche de quelque chose de vraiment spécial et
              différent, un peu d'aventure pour vous aider à oublier vos soucis quotidiens
              et le stress, alors je suis faite pour vous. Je me rends disponible pour
              vous combler de bonheur dès le passage de ma porte.<br />

              Je vous rejoins pour un moment délicieux dans mon appartement privé où le
              feeling sera le fil conducteur de notre complicité.<br />

              Je saurai vous mettre à l’aise, créer un climat chalereux et vous faire
              partager un pur moment de délices!<br />

              Je serai la GFE idéale pour vous moment de détente!<br />

              Je me déplace aussi chez vous, à l’hôtel, restaurant...<br />

              Merci 💋💋💋
            </div>
          </div>
        </section>
        <section id="services" v-show="tabs[4].tabValue == 'true'">
          <div class="md:max-w-xl mx-auto">
            <div class="p-4 border-b border-gray-600">
              <h2 class="font-bold text-tiny md:text-lg mb-2">Services</h2>
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
                <div v-show="girlInfos.lang_fr" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Français
                  </span>
                  <div v-html="langageMaitrise(girlInfos.lang_fr_maitrise)"></div>
                </div>
                <div v-show="girlInfos.lang_es" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Espagnol
                  </span>
                  <div v-html="langageMaitrise(girlInfos.lang_es_maitrise)"></div>
                </div>
                <div v-show="girlInfos.lang_en" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Anglais
                  </span>
                  <div v-html="langageMaitrise(girlInfos.lang_en_maitrise)"></div>
                </div>
                <div v-show="girlInfos.lang_de" class="mb-4">
                  <span class="block text-gray-700 font-semibold text-xxs">
                    Allemand
                  </span>
                  <div v-html="langageMaitrise(girlInfos.lang_de_maitrise)"></div>
                </div>
              </div>
            </div>
            <div class="pt-4 px-4">
              <div class="pb-4 border-b border-gray-600">
                <div class="flex justify-between items-center">
                  <h2 class="font-bold text-tiny md:text-lg my-2">
                    Tarifs &amp; Horaires
                  </h2>
                  <span class="text-gray-700 text-sm"> {{ girlInfos.mobility }} </span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      30 Minutes
                    </span>
                    <span class="text-tiny font-thin"> {{ girlInfos.tr_30M }}.- </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Heure
                    </span>
                    <span class="text-tiny font-thin"> {{ girlInfos.tr_1H }}.- </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Nuit
                    </span>
                    <span class="text-tiny font-thin"> {{ girlInfos.tr_1N }}.- </span>
                  </div>
                  <div class="mb-4">
                    <span class="block text-gray-700 font-semibold text-xxs">
                      1 Week-end
                    </span>
                    <span class="text-tiny font-thin"> {{ girlInfos.tr_1W }}.- </span>
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
          </div>
        </section>
      </div>
    </div>
    <div class="inline-block w-full px-4 my-7 clear-both md:flex md:justify-center">
      <button class="btn-primary big with-icon contactModal" v-on:click="contact = true">
        <span class="w-5 mr-2"></span> <span>Contacte-moi</span>
        <i class="ml-2 fak fa-c-phone justify-self-end"></i>
      </button>
    </div>
    <div
      data-v-12291c58=""
      class="modal outline-none"
      id="contactModal"
      role="dialog"
      aria-labelledby="modalTitle"
      aria-describedby="modalDescription"
      tabindex="-1"
      v-show="contact"
    >
      <div data-v-12291c58="" class="modal__backdrop"></div>
      <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
        <!---->
        <div data-v-12291c58="" class="modal__body p-5">
          <div class="justify-center mt-8 xs:mt-10">
            <div class="flex flex-col justify-center items-center">
              <div
                class="bg-gray-600 rounded-full relative inline-block border border-primary p-0.5"
              >
                <img
                  :src="'/storage/' + escortAvatar"
                  :alt="escortName"
                  class="h-28 w-28 xs:h-36 xs:w-36 rounded-full object-cover"
                />
                <div>
                  <span
                    class="w-3 h-3 absolute bg-green border-2 border-white top-0 right-0 mt-4 mr-4 rounded-full"
                  ></span>
                </div>
              </div>
              <h2 class="font-bold text-2xl xs:text-2xl mt-4">
                {{ escortName }}
              </h2>
              <span class="text-gray-700 text-sm leading-tight">
                {{ girlInfos.country }}
                , {{ girlInfos.location }}
              </span>
            </div>
            <div class="mt-8 pb-28">
              <ul
                class="grid md:flex md:justify-center md:items-center grid-cols-2 gap-0 w-40 xs:w-48 gap-y-6 mx-auto"
              >
                <li
                  class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden"
                >
                  <a :href="'tel:' + girlInfos.contact" target="_blank">
                    <div
                      class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"
                    >
                      <i class="fak fa-c-phone fa-2x" aria-hidden="true"></i>
                    </div>
                  </a>
                  <a target="_blank" :href="'tel:' + girlInfos.contact">
                    <div class="py-2 text-xs text-gray-700">Appel</div>
                  </a>
                </li>
                <li
                  class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden"
                >
                  <a :href="'sms:' + girlInfos.contact" target="_blank">
                    <div
                      class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"
                    >
                     <i class="fa fa-commenting-o fa-2x" aria-hidden="true"></i>

                    </div>
                  </a>
                  <a target="_blank" :href="'sms:' + girlInfos.contact">
                    <div class="py-2 text-xs text-gray-700">SMS</div>
                  </a>
                </li>
                <li
                  class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24"
                >
                  <a :href="'/chat/'+escortId">
                    <div
                      class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"
                    >
                      <i class="fak fa-c-chat fa-2x" aria-hidden="true"></i>
                    </div>
                  </a>
                  <a :href="'/chat/'+escortId">
                    <div class="py-2 text-xs text-gray-700">JL Messenger</div>
                  </a>
                </li>
                <li
                  onclick="logContactAttempt('whatsapp')"
                  class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden"
                >
                  <a
                    :href="
                      'whatsapp://send?phone=' +
                      girlInfos.contact +
                      '&amp;text=Hello+%2C+j%27ai+vu+ton+magnifique+profil+sur+BemyGirl+%E2%9D%A4%EF%B8%8F'
                    "
                    target="_blank"
                  >
                    <div
                      class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"
                    >
                      <i class="fak fa-c-whatsapp fa-2x" aria-hidden="true"></i>
                    </div>
                  </a>
                  <a
                    target="_blank"
                    :href="
                      'whatsapp://send?phone=' +
                      girlInfos.contact +
                      '&amp;text=Hello+%2C+j%27ai+vu+ton+magnifique+profil+sur+BemyGirl+%E2%9D%A4%EF%B8%8F'
                    "
                  >
                    <div class="py-2 text-xs text-gray-700">WhatsApp</div>
                  </a>
                </li>
              </ul>
            </div>
            <div
              class="absolute bottom-8 left-1/2 transform -translate-x-1/2 px-8 w-full max-w-120"
            >
              <div class="flex">
                <div
                  class="rounded-full bg-gray-100 w-full mr-2 hidden md:flex h-8 justify-center items-center text-sm text-gray-700 font-semibold px-4"
                >
                  <i class="fak fa-c-phone mr-2" aria-hidden="true"></i>
                  <span class="truncate">{{ girlInfos.contact }}</span>
                </div>
                <div
                  class="flex rounded-full bg-gray-100 w-full md:max-w-60 ml-2 md:ml-0 h-8 text-center justify-center items-center text-sm text-gray-700 font-semibold px-4"
                >
                  <a
                    :href="'http://maps.google.com/?q=' + girlInfos.location"
                    target="_blank"
                    :title="girlInfos.location"
                    class="flex justify-center items-center w-full"
                    ><i class="fak fa-c-locker mr-2" aria-hidden="true"></i>
                    <span class="truncate"
                      >{{ girlInfos.country }}, {{ girlInfos.location }}</span
                    ></a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <!----><button
          data-v-12291c58=""
          type="button"
          class="modal__close"
          v-on:click="contact = false"
        >
          <h3 data-v-12291c58="">
            <i data-v-12291c58="" class="fak fa-c-close" aria-hidden="true"></i>
          </h3>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["escortId", "escortName", "escortAvatar"],
  data() {
    return {
      selected: 1,
      girlInfos: [],
      girlGallery: [],
      tabs: [
        { tabId: "isProfile", tabValue: "false" },
        { tabId: "isStories", tabValue: "false" },
        { tabId: "isPaidContent", tabValue: "false" },
        { tabId: "isInfos", tabValue: "false" },
        { tabId: "isServices", tabValue: "false" },
      ],
      servicesTab: [],
      contact: false,
    };
  },

  methods: {
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

    getGirlInfos() {
      axios
        .get("/girl-infos/" + this.escortId)
        .then((response) => {
          this.girlInfos = response.data.girlInfos;
          this.girlServices(this.girlInfos.services);
        })
        .catch((error) => console.log(error));
    },
    girlServices(str) {
      return (this.servicesTab = str.split(","));
    },
    aboutGirl() {
      if (!this.girlInfos.about) {
        return false;
      } else {
        return true;
      }
    },

    getGirlGallery() {
      axios
        .get("/girl-gallery/" + this.escortId)
        .then((response) => {
          this.girlGallery = response.data.girlGallery;
        })
        .catch((error) => console.log(error));
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
  },

  created: function () {
    this.showHide(0);
    this.getGirlGallery();
    this.getGirlInfos();
  },
};
</script>
