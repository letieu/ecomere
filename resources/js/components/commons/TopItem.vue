<template>
  <div class="top-item">
    <h3>{{name}}</h3>
    <img :src="image" alt="name" />
  </div>
</template>

<script>
export default {
  props: ["name", "id", "image"]
};
</script>

<style lang="scss" scoped>
  .top-item{
      overflow: hidden;
      margin-bottom: 10px;
      max-width: 315px;
      height: 420px;
      background-color: white;
      padding:10px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      margin-top:20px ;
      img{
          width:100%;
      }
      h3{
          font-size: 25px;
          line-height: 40px;
          font-weight: 600;
          font-family: Arial, Helvetica, sans-serif;
          text-align: center;
      }
  }
</style>