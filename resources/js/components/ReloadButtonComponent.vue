<template>
  <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="reloadPage">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
</template>


<script>
export default {
  methods: {
    reloadPage() {
      window.location.reload();
    }
  }
}
</script>