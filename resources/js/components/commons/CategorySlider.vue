<template>
  <div class="category-slider container">
    <div class="row">
      <div class="category-slider_header">
        <h2>{{name}}</h2>
      </div>
    </div>
    <owl-carousel :items="4.5" :dots="false" :navText="navText">
      <Product
        v-for="(product,index) in products"
        :key="index"
        :name="product.name"
        :id="product.id"
        :price="product.price"
        :img="product.img"
        :writer="product.writer"
      />
    </owl-carousel>
    <div class="row category-slider_footer">
      <Bbutton label="Xem tất cả" />
    </div>
  </div>
</template>

<script>
import OwlCarousel from "vue-owl-carousel";
import Bbutton from "../ui/Bbutton.vue";
import Product from "../commons/Product.vue";
export default {
  props: ["id"],
  data() {
    return {
      navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
      name: "Category name",
      products: [
        {
          id: "1",
          name: "The catcher in the rye",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "tieu"
        },
        {
          id: "1",
          name: "The catcher in the rye (Bắt trẻ đồng xanh)",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "JD Salinger "
        },
        {
          id: "1",
          name: "ten sach",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "tieu"
        },
        {
          id: "1",
          name: "ten sach",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "tieu"
        },
        {
          id: "1",
          name: "ten sach",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "tieu"
        },
        {
          id: "1",
          name: "ten sach",
          price: "20000",
          img:
            "https://salt.tikicdn.com/cache/280x280/ts/product/ca/c9/70/743112ce044389f3155b72bb2629ca2f.jpg",
          writer: "tieu"
        }
      ]
    };
  },
  components: {
    OwlCarousel,
    Bbutton,
    Product
  }
};
</script>

<style lang="scss">
.category-slider {
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
  top: 100px;
  background: chartreuse;
  .owl-next{
    position: absolute;
    right: -100px;
    font-size: 30px;

  }
  .owl-prev{
    position: absolute;
    left: -100px;
    font-size: 30px;
  }
}
</style>