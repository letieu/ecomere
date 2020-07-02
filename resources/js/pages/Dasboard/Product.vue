<template>
  <div class="product">
    <button type="button" class="btn btn-primary" @click="creating=!creating">
      <span v-show="creating==false">Create</span>
      <span v-show="creating && editingID" @click="updateProduct">Update it</span>
      <span v-show="creating  && editingID==''" @click="createProduct">Create it</span>
    </button>
    <button
      type="button"
      class="btn btn-danger"
      @click="creating=!creating"
      v-show="creating"
    >Discard</button>
    <div class="new" v-show="creating">
      <form enctype="multipart/form-data" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            placeholder="Example input placeholder"
            name="name"
          />
        </div>
        <div class="form-group">
          <label for="describe">describe</label>
          <input
            type="text"
            class="form-control"
            id="describe"
            placeholder="Another input placeholder"
            name="describe"
          />
        </div>
        <div class="form-group">
          <label for="price">price</label>
          <input
            name="price"
            type="number"
            class="form-control"
            id="price"
            placeholder="Another input placeholder"
          />
        </div>
        <div class="form-group">
          <label for="writer">writer</label>
          <input
            name="writer"
            type="text"
            class="form-control"
            id="writer"
            placeholder="Another input placeholder"
          />
        </div>
        <div class="form-group">
          <label for="img">Image</label>
          <input
            name="img"
            type="file"
            class="form-control"
            id="img"
            placeholder="Another input placeholder"
            v-on:change="onImageChange"
          />
        </div>
      </form>
    </div>
    <table class="table table-striped" v-show="!creating">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(product,index) in products" :key="index">
          <th scope="row">{{product.id}}</th>
          <td>{{product.name}}</td>
          <td>{{product.price}}</td>
          <td>{{product.img}}</td>
          <td>
            <button type="button" class="btn btn-info" @click="showEdit(product)">edit</button>
            <button type="button" class="btn btn-danger" @click="destroyProduct(product)">delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      creating: false,
      editingID: "",
      products: []
    };
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    loadProducts() {
      axios.get("/api/products").then(response => {
        this.products = response.data;
      });
    },
    showEdit(product) {
      document.getElementById("name").value = product.name;
      document.getElementById("price").value = product.price;
      document.getElementById("writer").value = product.writer;
      document.getElementById("describe").value = product.describe;
      document.getElementById("img").value = product.img;
      this.creating = true;
      this.editingID = product.id;
    },
    updateProduct() {
      let product = {
        name: document.getElementById("name").value,
        price: document.getElementById("price").value,
        writer: document.getElementById("writer").value,
        describe: document.getElementById("describe").value,
        img: document.getElementById("img").value
      };
      for (let prop in product) {
        if (product[prop] == null || product[prop] == "") {
          return;
        }
      }
      let curentProduct = this.products.find(
        product => product.id == this.editingID
      );
      let index = this.products.indexOf(curentProduct);
      axios.put(`/api/products/${this.editingID}`, product).then(response => {
        this.products.splice(index, 1, response.data);
      });
    },
    destroyProduct(product) {
      axios.delete(`/api/prodcuts/${product.id}`);
    },
    createProduct() {
      let product = {
        name: document.getElementById("name").value,
        price: document.getElementById("price").value,
        writer: document.getElementById("writer").value,
        describe: document.getElementById("describe").value,
        img: this.image
      };
      for (let prop in product) {
        if (product[prop] == null || product[prop] == "") {
          return;
        }
      }
      this.products.push(product);
      axios.post("/api/products", product).then(response => {
        this.products.pop();
        this.products.push(response.data);
      });
    },
    onImageChange(event) {
      let files = event.target.files || event.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file){
      let reader = new FileReader();
      reader.onload = (event)=>{
        this.image = event.target.result;
      }
      reader.readAsDataURL(file);
    }
  }
};
</script>

<style scoped>
button.btn {
  padding: 0;
}
.new {
  box-shadow: 2px 2px 2px black;
}
</style>