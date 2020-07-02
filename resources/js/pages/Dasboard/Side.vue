<template>
  <div class="sidebar">
    <ul>
      <li v-for="(item ,index) of items" :key="index" :class="{active:active==index}" @click="active=index">
        <router-link
          :to="{ name:item.routerName }"
          tag="a"
        >{{item.name}}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: 0,
      items: [
        { routerName: "dasboard-product", name: "Product" },
        { routerName: "dasboard-category", name: "Category" },
        { routerName: "dasboard-user", name: "User" }


      ]
    };
  }
};
</script>

<style scoped>
.active {
  background: #5a5e61;
}
.sidebar{
  flex-basis: 20%;
  list-style: none;
  background: #343a40;
  color:white;
  height: 100vh;
}
.sidebar ul li a{
  padding:0 10px;
  font-size: 18px;
  color:white ;
  line-height: 40px;
  display: block;
  outline: none;
  border:none;
  text-decoration: none;
}
</style>