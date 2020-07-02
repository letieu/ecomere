<template>
  <div class="user-menu">
    <div v-show="!login">
      <a href="/login">Đăng nhập</a>
      <a href="/register">Đăng ký</a>
    </div>
    <div v-show="login">
      <h3 class="user-name">{{user.name}}</h3>
      <a href="#">Thông tin thanh toán</a>
      <a href="#">Đơn hàng của tôi</a>
      <a href="/logout">Đăng xuất (ID: user.id)</a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      login: false,
      user: ""
    };
  },
  mounted() {
    this.getUser();
  },
  methods: {
    getUser() {
      axios.get("/user").then(response => {
        let user = response.data.user;

        if (user) {
          this.login = true;
          this.user = user;
        }
      });
    }
  }
};
</script>

<style>
</style>