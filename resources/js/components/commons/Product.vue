<template>
  <div class="product">
    <a :href="/products/+id">
      <img class="product_img" :src="img" alt="img" />
      <h4 class="product_name">{{name}}</h4>
      <h5 class="product_writer">{{writer}}</h5>
      <h5 class="product_price">{{price}}</h5>
    </a>
  </div>
</template>

<script>
export default {
  props: ["name", "img", "id", "writer", "price"]

};
</script>

<style lang="scss">
.product {
  padding: 5px 15px;
  &_img {
    max-width: 150px;
    max-height: 200px;
    padding-bottom: 20px;
  }
  &_name {
    color: #494747;
    font-size: 14px;
  }
  &_writer {
    color: #7a7777;
    font-size: 12px;
  }
  &_price{
    color:#d64e4e;
  }
  &:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    *{
        text-decoration: none;
        
    }
  }
}
</style>