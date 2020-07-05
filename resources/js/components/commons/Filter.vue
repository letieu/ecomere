<template>
  <div class="filter">
    <h2 class="filter_name">{{filterName}}</h2>
    <ul>
      <li v-for="filter in filters" :key="filter.id" :class="{active:curent==filter.id}" @click="curent=filter.id" >
        <span @click="fill(filter.value)">{{filter.name}}</span>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["filterName", "filters","keyName"],
  data(){
     return{
        curent:''
     }
  },
  methods: {

    fill(value) {
      
      let curentFilter = this.$route.query;
      curentFilter[this.keyName] = value
      let new_category = curentFilter.category
      this.$router
        .push({
          name: "Res",
          query: {name:curentFilter.name,category:new_category}
        })
        .catch(err => {});

      if (this.$route.name == "Res") {
        bus.$emit("searchEvent", curentFilter);
      }
    }
  }
};
</script>

<style scoped>
   ul{
      border-left: 1px solid burlywood;
      list-style: none;
      margin-right: 10px;
   }
 
   ul li span{
        cursor: pointer;
      padding:15px;
      height: 100%;
      width: 100%;
      display: block;
   }

   ul li:hover,
    ul li.active{
      background-color: thistle;
   }
   .filter_name{
      color:darkslategray;
      text-transform: uppercase;
      font-size: 17px;
   }
</style>