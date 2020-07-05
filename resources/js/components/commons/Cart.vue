<template>
  <div class="cart">
     <img src="/images/cart.png" alt="cart">
     <span class="size" v-show="products.length > 0">{{products.length}}</span>
  </div>
</template>

<script>
export default {
   created(){
      bus.$on('addToCart',product=>{
         this.products.push(product)
         console.log(this.products)
      })
   },
   data(){
      return{
         products:[]
      }
   }
}
</script>

<style>
   .cart{
      position: fixed ;
      z-index: 200;
      left: 10px;
      top:200px;
      width: 80px;
      padding:10px;
      border-radius: 50%;
   }
   .cart:hover{
      background-color: yellowgreen;
   }
   .cart img{
      width: 100%;
   }
   .size{
      position: absolute;
      top:5px;
      right: 5px;
      color: red;
      display: block;
      width: 16px;
      height: 16px;
      background-color: white;
      border-radius: 50%;
      text-align: center;
      line-height: 16px;
   }
</style>
