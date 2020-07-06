<template>
  <div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <div class="index-top">
      <BannerSlider />
      <Top class="top" />
    </div>

    <Category id="1" categoryName="Văn Học"/>
    <hot-tag />
    <Category id="2" categoryName="Tiểu thuyết"/>
    <Category id="4" categoryName="Light novel"/>

  </div>
</template>

<script>
import Header from "../components/layouts/Header.vue";
import BannerSlider from "../components/commons/BannerSlider.vue";
import Top from "../components/commons/Top.vue";
import Category from "../components/commons/CategorySlider";
import HotTag from '../components/commons/HotTags.vue';
export default {
  mounted(){
    ScrollReveal().reveal('.category-slider');
  }
  components: {
    Header,
    BannerSlider,
    Top,
    Category,
    HotTag
  }
};
</script>

<style lang="scss" scoped>
.index-top {
  height: 750px;
  background: #e4e4e4;
  position: relative;
  margin-bottom: 20px;
  .top {
    position: absolute;
    top: 230px;
    z-index: 99;
  }
}

</style>
