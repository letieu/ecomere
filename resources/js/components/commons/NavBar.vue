<template>
  <div id="navbar" class="row bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">
              Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/res?name=&category=2">Kinh điển</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="https://letieu.github.io">My CV</a>
          </li>
          <li class="nav-item" v-show="admin">
            <a class="nav-link" href="/dasboard/product">Dasboard</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >Tài khoản</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <UserMenu/>
            </div>
          </li>
         
        </ul>
        
      </div>
    </nav>
    <Search class="search"/>

  </div>
</template>

<script>
import Search from '../commons/Search.vue';
import UserMenu from '../commons/UserMenu.vue';
export default {
    created(){
      bus.$on('userDetail',data=>{
        this.admin = data.admin
        console.log(this.admin)
      })
    },
    data(){
      return{
        admin:false
      }
    },
    components :{
        UserMenu,
        Search
    }
};
</script>
    
<style lang="scss" scoped>
#navbar{
    position:relative;
}
.search{
    position: absolute;
    right: 0;
    top:7px;

}
</style>