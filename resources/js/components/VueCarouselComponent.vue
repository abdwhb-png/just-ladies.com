<template>
  <div class="md:pt-4 mb-4 pb-4 mx-4">
    <div class="VueCarousel">
      <div class="VueCarousel-wrapper">
        <div
          class="VueCarousel-inner"
          style="
            transform: translate(0px, 0px);
            transition: transform 0.5s ease 0s;
            flex-basis: 99.5px;
            visibility: visible;
            height: auto;
          "
        >
          <div
            tabindex="-1"
            role="tabpanel"
            class="VueCarousel-slide VueCarousel-slide-active"
          >
            <div
              class="h-16 w-16 md:h-20 md:w-20 flex-shrink-0 p-0.5 border border-primary rounded-full cursor-pointer"
            >
              <img
                src="/img/jl-logo.png"
                class="rounded-full h-full w-full object-cover"
              />
            </div>
          </div>
          <a
            v-for="car in carousel"
            v-bind:key="car.id"
            tabindex="-1"
            role="tabpanel"
            class="VueCarousel-slide VueCarousel-slide-active"
            :href="'/girls/' + car.name + '/' + car.user_id"
          >
            <div
              class="h-16 w-16 md:h-20 md:w-20 flex-shrink-0 p-0.5 border border-primary rounded-full cursor-pointer"
            >
              <img
                :src="'/storage/' + car.image_path"
                class="rounded-full h-full w-full object-cover"
              />
            </div>
          </a>
        </div>
      </div>
      <div data-v-453ad8cd="" class="VueCarousel-navigation">
        <button
          data-v-453ad8cd=""
          type="button"
          aria-label="Previous page"
          tabindex="-1"
          class="VueCarousel-navigation-button VueCarousel-navigation-prev VueCarousel-navigation--disabled"
          style="padding: 1px; margin-right: -1px"
        >
          <i class="fak fa-c-angle-left"></i>
        </button>
        <button
          data-v-453ad8cd=""
          type="button"
          aria-label="Next page"
          tabindex="0"
          class="VueCarousel-navigation-button VueCarousel-navigation-next"
          style="padding: 1px; margin-left: -1px"
        >
          <i class="fak fa-c-angle-right"></i>
        </button>
      </div>
      <!---->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      carousel: [],
      girlsGallery: [],
    };
  },

  methods: {
    getVueCarousel() {
      axios
        .get("/vue-carousel")
        .then((response) => {
          this.carousel = response.data.carousel;
        })
        .catch((error) => console.log(error));
    },

    getGirlsResults() {
      axios
        .get("/girls-results")
        .then((response) => {
          this.girls = response.data.girls;
        })
        .catch((error) => console.log(error));
    },
  },

  created: function () {
    this.getVueCarousel();
    this.getGirlsResults();
  },
};
</script>
