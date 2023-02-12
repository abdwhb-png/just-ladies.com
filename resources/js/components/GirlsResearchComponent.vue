<template>
  <div>
    <section
      class="fixed md:relative top-0 flex justify-center px-0 md:px-0 pt-6 pb-4 px-4 bg-white z-30 w-full"
    >
      <div class="flex w-full h-10">
        <div
          class="relative flex justify-start bg-transparent flex-grow flex-shrink h-full mr-2"
        >
          <span
            class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-800 z-10"
            ><i class="fak fa-c-search"></i
          ></span>
          <input
            id="girls-input-search"
            type="text"
            v-model="keyword"
            placeholder="Rechercher une escort ..."
            class="w-full h-full bg-gray-100 border-transparent rounded-lg py-2 focus:bg-white focus:outline-none shadow-none focus:shadow-none focus:border-gray-800 focus:ring-0 ring-0 focus:caret-primary pl-10 pr-10 transform transition-all duration-200 md:w-1/3"
          />
          <span
            id="search-close-btn"
            @click="keyword = ''"
            class="absolute hidden inset-y-0 top-0 right-0 flex items-center justify-center text-gray-400 pr-2 flex-shrink-0 h-full w-10 text-sm cursor-pointer"
            ><i class="fak fa-c-close text-black text-xl"></i
          ></span>
        </div>
        <div
          id="filter-btn"
          class="flex items-center cursor-pointer w-10 text-2xl justify-center hover:bg-gray-100 rounded-full"
        >
          <i class="fak fa-c-settings"></i>
        </div>
        <div class="relative z-20">
          <div v-on:click="region = true"
            class="icon-wrapper flex justify-center items-center rounded-full group cursor-pointer flex-shrink-0 hover:bg-gray-100 h-10 w-10"
          >
            <i class="fak fa-c-location text-xl"></i>
          </div>
          <div
            id="regions_selector"
            class="absolute bg-white top-12 right-0 flex flex-col w-60 h-76 rounded-lg shadow pb-4"
            v-if="region"
          >
            <div class="border-b border-gray-600 mx-4 py-4">
              <label
                class="inline-flex items-center"
                v-on:click="
                  rAll();
                  emitRegionsFilter();
                "
                ><input
                  id="all-regions"
                  type="checkbox"
                  v-model="allReg"
                  class="form-checkbox h-5 w-5 text-primary rounded ring-0"
                /><span class="ml-2 text-gray-700" :class="{ 'text-gray-800': allReg }"
                  >Toutes les régions</span
                ></label
              >
            </div>
            <ul class="my-4 h-34 overflow-y-auto">
              <li class="px-4">
                <label
                  class="inline-flex items-center mt-2"
                  v-on:click="
                    rFr();
                    emitRegionsFilter();
                  "
                  ><input
                    type="checkbox"
                    data-regions="1"
                    v-model="regionFr"
                    class="regions-checkbox form-checkbox h-5 w-5 text-primary rounded border-gray-800 focus:ring-offset-0 focus:ring-1 cursor-pointer"
                  />
                  <span
                    class="regions-label ml-2 cursor-pointer text-gray-700"
                    :class="{ 'text-gray-800': regionFr }"
                    >France</span
                  ></label
                >
              </li>
              <li class="px-4">
                <label
                  class="inline-flex items-center mt-2"
                  v-on:click="
                    rCh();
                    emitRegionsFilter();
                  "
                  ><input
                    v-model="regionCh"
                    type="checkbox"
                    data-regions="2"
                    class="regions-checkbox form-checkbox h-5 w-5 text-primary rounded border-gray-800 focus:ring-offset-0 focus:ring-1 cursor-pointer"
                  />
                  <span
                    class="regions-label ml-2 cursor-pointer text-gray-700"
                    :class="{ 'text-gray-800': regionCh }"
                    >Suisse</span
                  ></label
                >
              </li>
            </ul>
            <input type="hidden" name="latitude" />
            <input type="hidden" name="longitude" />
            <button @click="region = false" class="btn-secondary mx-4"><i class="fa fa-times-circle mx-1" aria-hidden="true"></i> Fermer</button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ["girls"],
  data() {
    return {
      keyword: null,
      region: false,
      allReg: true,
      regionFr: false,
      regionCh: false,
      r: "",
    };
  },
  watch: {
    keyword(after, before) {
      this.$emit("emitedKeyword", this.keyword);
    },
  },

  methods: {
    rAll() {
      this.allReg = true;
      this.r = "";
      this.regionFr = false;
      this.regionCh = false;
    },
    rFr() {
      this.r = "France";
      this.regionFr = true;
      this.regionCh = false;
      this.allReg = false;
    },
    rCh() {
      this.r = "Suisse";
      this.regionCh = true;
      this.regionFr = false;
      this.allReg = false;
    },

    emitRegionsFilter() {
      let r = this.r;
      this.$emit("regionsFilter", r);
    },
  },
};
</script>
