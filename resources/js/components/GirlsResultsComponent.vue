<template>
  <div>
    <!-- Girls Research -->
    <girls-research-component
      @emited-keyword="handleEmitedKeyword"
      @regions-filter="handleRegionsFilter"
    ></girls-research-component>
    <!-- Girls Carousel -->
    <vue-carousel-component></vue-carousel-component>
    <!-- Girls Results -->
    <div id="girls-results" class="h-full">
      <div id="loader" class="flex justify-center items-center h-screen-75 hidden">
        <i class="fal fa-spinner-third fa-spin"></i>
      </div>
      <div class="px-4 md:p-0" id="girls_list">
        <div
          id="active-girls-list"
          class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-2 gap-y-4 md:gap-4 lg:gap-6"
        >
          <div v-for="girl in girls" v-bind:key="girl.id" class="flex flex-col">
            <div class="flex-1">
              <a :title="girl.name" :href="'/girls/' + girl.name + '/' + girl.user_id">
                <div class="relative">
                  <div
                    class="image-wrapper rounded-lg overflow-hidden bg-danger bg-opacity-5"
                  >
                    <div
                      class="relative flex row overflow-hidden pb-default-ratio w-full mx-0"
                    >
                      <div
                        class="flex flex-row w-full h-full absolute flex-shrink-0 px-0"
                      >
                        <img
                          :src="'/storage/' + girl.avatar"
                          :alt="girl.name + '-escort-' + girl.user_id"
                          class="flex-shrink-0 w-full object-cover"
                          style="margin-left: 0%"
                        />
                      </div>
                      <div class="absolute inset-0"></div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="mt-2 text-sm lg:text-tiny flex items-center">
                <a
                  :href="'/girls/' + girl.name + '/' + girl.user_id"
                  :title="girl.name"
                  class="link"
                >
                  <div class="truncate">
                    {{ girl.name }}
                  </div>
                </a>
                <div class="flex items-center flex-shrink-0">
                  <i
                    data-tippy-theme="premium"
                    data-tippy-max-width="135"
                    data-tippy-content="Photos récentes par JustLadies"
                    class="fak fa-c-verified text-primary md:text-base text-sm ml-1"
                  ></i>
                </div>
              </div>
              <a href="#" :title="girl.name" class="link">
                <div class="text-gray-700 text-xs truncate">
                  {{ girl.location + ", " + girl.country }}
                  <div class="" v-html="activeStatus(girl.active_status)"></div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      girls: [],
      girlsInfos: [],
      keyword: "",
      regionF: "",
    };
  },
  watch: {
    keyword(after, before) {
      this.getGirlsResults();
    },
    regionF() {
      this.getGirlsResults();
    },
  },
  methods: {
    getGirlsResults() {
      axios
        .get("/girls-results", {
          params: { keyword: this.keyword, region: this.regionF },
        })
        .then((response) => {
          this.girls = response.data.girls;
        })
        .catch((error) => console.log(error));
    },
    activeStatus(st) {
      let html = "";
      if (st) html = '<span class="text-green"> En ligne</span>';
      else html = "";

      return html;
    },
    handleEmitedKeyword(s) {
      this.keyword = s;
    },
    handleRegionsFilter(r) {
      this.regionF = r;
    },
  },

  created: function () {
    this.getGirlsResults();
  },
};
</script>
