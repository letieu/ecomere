<template>
  <div class="hot-tag container">
    <div class="row">
      <div class="hot-tag_header">
        <h2>Từ khóa hot</h2>
      </div>
    </div>
    <owl-carousel :items="8" :dots="false" :navText="navText">
      <div v-for="(tag,index) in tags" :key="index">
        <a href="#">{{tag}}</a>
      </div>
    </owl-carousel>
    <div class="row hot-tag_footer">
      <Bbutton label="Xem tất cả" />
    </div>
  </div>
</template>

<script>
import OwlCarousel from "vue-owl-carousel";
import Bbutton from "../ui/Bbutton.vue";
export default {
  data() {
    return {
      navText: [
        '<i class="fas fa-chevron-left"></i>',
        '<i class="fas fa-chevron-right"></i>'
      ],
      tags: [
        "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm",
        "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm",
          "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm",
        "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm",
          "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm",
        "trinh thám",
        "Tiểu thuyết suối nguồn",
        "đắc nhân tâm"
      ]
    };
  },
  components: {
    OwlCarousel,
    Bbutton
  }
};
</script>

<style lang='scss'>
.hot-tag {
  margin-bottom: 25px;
  background-color: white;
  &_header {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    h2 {
      padding-top: 8px;
      border-bottom-right-radius: 20px;
      padding-left: 5px;
      padding-right: 30px;
      font-size: 20px;
      line-height: 35px;
      text-transform: uppercase;
      font-weight: 600;
      height: 50px;
      background-color: yellowgreen;
    }
  }
  &_footer {
    height: 50px;
    justify-content: center;
    align-items: center;
    padding-bottom: 15px;
  }
}

.owl-carousel .owl-nav {
  display: block;
  position: absolute;
  width: 100%;
  top: 20px;
  background: chartreuse;
  .owl-next {
    position: absolute;
    right: -100px;
    font-size: 30px;
  }
  .owl-prev {
    position: absolute;
    left: -100px;
    font-size: 30px;
  }
}
</style>