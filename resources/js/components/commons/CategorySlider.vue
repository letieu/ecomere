<template>
  <div class="category-slider container">
    <div class="row">
      <div class="category-slider_header">
        <h2>{{name}}</h2>
      </div>
    </div>
    <owl-carousel :items="4.5" :dots="false" :navText="navText" v-if="loaded">
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
      navText: [
        '<i class="fas fa-chevron-left"></i>',
        '<i class="fas fa-chevron-right"></i>'
      ],
      name: "Category name",
      loaded: false,
      products: [
        {
          describe: "bla bal",
          id: 1,
          img: "/images/1593859352.jpeg",
          name: "Bay vien ngoc rong",
          price: 8888,
          bla: "jsldfjl",
          create_at: "djfl"
        }
      ]
    };
  },
  components: {
    OwlCarousel,
    Bbutton,
    Product
  },
  mounted() {
    this.loadData();
  },
  methods: {
    loadData() {
      axios.get("/api/products").then(response => {
        this.loaded = true;
        console.log(response.data);
        for (let product of response.data) {
          this.products.push({
            id: product.id,
            img: product.img,
            name: product.name,
            price: product.price,
            describe: product.describe,
            writer: product.writer
          });
        }
        this.loaded = true
      });
    }
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