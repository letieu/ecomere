<template>
  <div class="detail container">
    <div class="row">
      <div class="col-6">
        <div class="product_image">
          <img class="image" :src="product.img" :alt="product.name" />
        </div>
      </div>
      <div class="col-6">
        <div class="product_detail">
          <h2 class="name">{{product.name}}</h2>
          <h5 class="writer">Tác giả: {{product.writer}}</h5>
          <h5 class="price">Thanh toán : {{product.price}} đ</h5>
          <p class="describe">{{product.describe}}</p>
          <Bbutton label="Mua ngay"/>
          <Bbutton label="Add to card"/>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Bbutton from "../components/ui/Bbutton";
export default {
  components: {
    Bbutton
  },
  data() {
    return {
      product: {}
    };
  },
  created() {
    this.loadProduct();
  },
  methods: {
    loadProduct() {
      this.id = this.$route.params.id;
      axios.get(`/api/products/${this.id}`).then(response => {
        this.product = response.data;
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.detail {
  padding-top: 20px;
}
.product_image {
  img {
    width: 100%;
  }
}
.product_detail {
  .writer {
    color: darkolivegreen;
  }
  .price {
    line-height: 90px;
    font-size: 28px;
    color: firebrick;
  }
}
</style>