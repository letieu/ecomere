<template>
  <button class="button">{{label}}</button>
</template>

<script>
export default {
  props: ["label"]
};
</script>

<style lang='scss' scoped>
.button {
  border: none;
  outline: none;
  display: block;
  position: relative;
  float: left;
  width: 120px;
  padding: 0;
  margin: 10px 20px 10px 0;
  font-weight: 600;
  text-align: center;
  line-height: 35px;
  color: #fff;
  border-radius: 5px;
  transition: all 0.2s;
  background: #ffaa40;
  box-shadow: 0px 5px 0px 0px #a66615;

  &:hover {
    box-shadow: 0px 0px 0px 0px #a66615;

    margin-top: 15px;
    margin-bottom: 5px;
  }
}
</style>