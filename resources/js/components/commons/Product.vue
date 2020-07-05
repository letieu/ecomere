<template>
  <div class="product">
    <a :href="/products/+id">
      <img class="product_img" :src="img" alt="img" />
      <h4 class="product_name">{{name}}</h4>
      <h5 class="product_writer">{{writer}}</h5>
      <h5 class="product_price">{{price}}</h5>
    </a>
    <button class="add" @click="addToCart()">add to cart</button>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  props: ["name", "img", "id", "writer", "price"],
  methods: {
    addToCart() {
      let img = $(this.$el.querySelector("img"));
      let imgClone = $(img)
        .clone()
        .offset({
          top: img.offset().top,
          left: img.offset().left
        })
        .css({
          opacity: "0.5",
          position: "fixed",
          "z-index": "200",
          height: 200,
          width: 200
        })
        .appendTo($("body"));
      imgClone.animate(
        {
          top: 200,
          left: 10,
          width: 75,
          height: 75
        },
        600
      );

      setTimeout(function() {
        $(".cart").animate({
          top: 180
        });
        imgClone.animate(
          {
            width: 0,
            height: 0
          },
          600
        );
      }, 700);
      setTimeout(()=>{
        $(".cart").animate({
          top: 200
        });
        bus.$emit('addToCart',{
          name:this.name,
          writer:this.writer,
          id:this.id,
          img:this.img,
          price:this.price
        })
      }, 800);
    }
  }
};
</script>

<style lang="scss">
.product {
  background-color: white;
  min-width: 220px;
  padding: 15px 15px;
  overflow: hidden;
  position: relative;
  &_img {
    max-width: 150px;
    max-height: 230px;
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
  &_price {
    color: #d64e4e;
  }
  .add {
    position: absolute;
    top: -30px;
    left: 20%;
    background-color: transparent;
    transition: all 0.5s;
    border: none;
    padding: 5px;
    border-radius: 4px;
  }
  &:hover {
    .add {
      display: block;
      top: 50px;
      background-color: yellowgreen;
      &:hover {
        background-color: #d64e4e;
      }
    }
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    * {
      text-decoration: none;
    }
  }
}
</style>