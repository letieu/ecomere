<template>
  <div class="search_res container">
    <div class="row result" v-show="filter.name">
      Kết quả tìm kiếm cho
      <h3 class="keyword">( {{filter.name}} )</h3>
      :
      {{paginate.total}} Kết quả
    </div>
    <div class="row">
      <div class="col-md-2 filter">
        <Filterr filterName="The loai" :filters="filter1" keyName="category" />
        <hr />
        <Filterr filterName="Giá cả" :filters="filter2" keyName="price" />
      </div>
      <div class="col-md-10">
        <div class="row">Sort</div>
        <div class="row products">
          <ul class="products_list row">
            <li v-for="product in products" :key="product.id" class="col-3">
              <Product
                :name="product.name"
                :price="product.price"
                :writer="product.writer"
                :img="product.img"
                :describe="product.describe"
                :id="product.id"
              />
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row paginate">
      <ul>
        <li v-for="p in paginate.lastPage" :key="p">
          <span :class="{active:paginate.current == p}" @click="getData(p)">{{p}}</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import Product from "../components/commons/Product.vue";
import Filterr from "../components/commons/Filter.vue";
export default {
  components: {
    Product,
    Filterr
  },
  data() {
    return {
      paginate: {},
      filter: {},
      products: [],
      filter1: [
        { id: 1, value: 1, name: "Văn học" },
        { id: 2, value: 2, name: "Kinh điển" },
        { id: 3, value: 3, name: "Tiểu thuyết" },
        { id: 4, value: 4, name: "Light novel" }
      ],
      filter2: [
        { id: 1, value: 100000, name: "Dưới 100.000 đ" },
        { id: 2, value: 200000, name: "Dưới 200.000 đ" },
        { id: 3, value: 300000, name: "Dưới 300.000 đ" },
        { id: 4, value: 400000, name: "Dưới 400.000" }
      ]
    };
  },
  created() {
    this.filter = this.$route.query;
    bus.$on("searchEvent", filter => {
      this.filter = filter;
      this.getData();
    });
    this.getData();
  },
  methods: {
    getData(page) {
      let url = "api/products?";
      for (let fill in this.filter) {
        if (this.filter[fill] != undefined) {
          url += `${fill}=${this.filter[fill]}&`;
        }
      }
      if (page) {
        url += `page=${page}`;
      }
      axios.get(url).then(response => {
        this.products = response.data.data;
        this.paginate.total = response.data.total;
        this.paginate.current = response.data.current_page;
        this.paginate.lastPage = response.data.last_page;
        this.paginate.path = response.data.path;
      });
    }
  }
};
</script>

<style lang="scss" scoped>
ul {
  list-style: none;
}
.product {
  border-radius: 5px;
  margin: 10px;
  margin-left: -20px;
  height: 350px;
}
.keyword {
  font-size: 20px;
  margin-right: 15px;
}
.result {
  line-height: 60px;
  display: flex;
  align-items: center;
  h3 {
    margin: 0;
    padding: 0;
  }
}
.paginate ul {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.paginate ul li span {
  display: block;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: cadetblue;
  text-align: center;
  line-height: 30px;
  margin: 5px;
  cursor: pointer;
}
.paginate ul li span:hover,
.paginate ul li span.active {
  background: chartreuse;
}
</style>