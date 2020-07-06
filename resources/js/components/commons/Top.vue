<template>
  <div class="container-fluid" id="top">
    <div class="row">
      <div class="col-lg-3" v-for="(book ,index) in books" :key="index">
        <TopItem :name="book.name" :image="book.img" :id="book.id" v-show="index < showNumber" />
      </div>
    </div>
    <div class="row show-more">
      <a href="http://tieushop.herokuapp.com/res?category=1" v-show="showNumber == 4" >
        <Bbutton label="xem thêm " />
      </a>

    </div>
  </div>
</template>

<script>
import TopItem from "./TopItem.vue";
import Bbutton from "../ui/Bbutton.vue";
export default {
  data() {
    return {
      showNumber: 4,
      books: [
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://cdn.shopify.com/s/files/1/0953/4528/products/660B53B3-BDC5-4352-98D2-3DEFDDD86E4D_1024x1024.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://salt.tikicdn.com/ts/product/30/6c/22/69c8df4c3232024b1de3095bce27010e.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://www.thecommononline.org/wp-content/uploads/2013/06/Screen-Shot-2017-05-31-at-2.19.46-PM.png"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://salt.tikicdn.com/cache/w1200/media/catalog/product/b/i/bia1-quagiangvaonganha--1---1-.u2769.d20170822.t181516.133608.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://cdn.shopify.com/s/files/1/0953/4528/products/660B53B3-BDC5-4352-98D2-3DEFDDD86E4D_1024x1024.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://cdn.shopify.com/s/files/1/0953/4528/products/660B53B3-BDC5-4352-98D2-3DEFDDD86E4D_1024x1024.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://cdn.shopify.com/s/files/1/0953/4528/products/660B53B3-BDC5-4352-98D2-3DEFDDD86E4D_1024x1024.jpg"
        },
        {
          id: 1,
          name: "the catcher in the rye",
          img:
            "https://cdn.shopify.com/s/files/1/0953/4528/products/660B53B3-BDC5-4352-98D2-3DEFDDD86E4D_1024x1024.jpg"
        }
      ]
    };
  },
  components: {
    Bbutton,
    TopItem
  }
};
</script>
<style lang='scss' scoped>
#top {
  .show-more {
    display: flex;
    justify-content: center;
  }
}
</style>
