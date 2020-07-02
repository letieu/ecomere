<template>
  <div class="dasboard">
    <div class="row">
      <Side class="col-2" />
      <router-view class="col-10"></router-view>
    </div>
  </div>
</template>

<script>
import Side from "./Side.vue";
export default {
  components: {
    Side
  }
};
</script>

<style scoped>
.dasboard {
}
</style>