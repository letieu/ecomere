<template>
  <div class="search">
    <span class="filter dropdown">
      <button
        class="filter_button dropdown-toggle"
        data-toggle="dropdown"
      >{{filters[curentFill].name}}</button>
      <ul class="filter_list dropdown-menu">
        <li
          class="filter-item dropdown-item"
          v-for="(filter,index) in filters"
          :key="index"
          @click="curentFill=index"
          v-show="index !=curentFill"
        >{{filter.name}}</li>
      </ul>
    </span>

    <input type="text" placeholder="the great gastby" v-model="keyword" @keyup.enter="search()" />
    <span class="icon">
      <i class="fas fa-search"></i>
    </span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: "",
      curentFill: 0,
      filters: [
        { name: "Tất cả", code: "all" },
        { name: "Văn học", code: "vh" },
        { name: "Kinh điển", code: "kd" },
        { name: "Tiểu thuyết", code: "tt" },
        { name: "Light Novel", code: "ln" }
      ]
    };
  },
  methods: {
    search() {
      let filter = {
          name: this.keyword,
          category: this.curentFill
        };
      this.$router.replace({
        name:"Res",
        query:filter
      }).catch(err=>{});

      if (this.$route.name == 'Res'){
        bus.$emit('searchEvent',filter)
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.search {
  border-radius: 8px;
  padding-left: 0;
  padding-right: 0;
  border: 2px solid gray;
  height: 40px;
  background-color: white;
  position: relative;
  width: 400px;
  button {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    height: 36px;
    border: none;
    outline: none;
    position: absolute;
    left: 0;
    font-size: 13px;
    width: 80px;
    &::after {
      display: none;
    }
  }
  .icon {
    width: 40px;
    line-height: 36px;
    text-align: center;
    position: absolute;
    display: inline-block;
    right: 0;
    cursor: pointer;
    &:hover {
      background-color: whitesmoke;
    }
  }
  input {
    max-width: 100%;
    position: absolute;
    left: 80px;
    border: none;
    outline: none;
    width: 70%;
    line-height: 34px;
  }
}
.search:hover {
  border: 2px solid #febd69;
}
.filter {
  &_list {
    padding: 5px;
    .filter-item {
      cursor: pointer;
    }
  }
}
</style>