<template>
  <div id="banner-slider" class="carousel slide"  data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item" v-for="(banner,index) of banners" :key="index">
        <a :href="banner.link" title="banner">
          <img class="d-block w-100" :src="banner.src" alt="First slide" />
        </a>
      </div>
    </div>

    <a
      class="carousel-control-prev"
      href="#banner-slider"
      role="button"
      data-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a
      class="carousel-control-next"
      href="#banner-slider"
      role="button"
      data-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</template>
<script>
export default {
  mounted(){
    let banners = document.getElementsByClassName('carousel-item');
    banners[0].classList.add('active');
  },
  data() {
    return {
      banners: [
        {
          src:
            "https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Hero/Fuji_TallHero_45M_v2_1x._CB432458380_.jpg",
          link: "google.com"
        },
        {
          src:
            "https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Hero/Fuji_TallHero_Toys_en_US_1x._CB431858161_.jpg",
          link: "google.com"
        },
        {
          src:
            "https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Hero/Fuji_TallHero_Currency_v2_en_US_2x._CB428993290_.jpg",
          link: "google.com"
        }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
  
  .carousel{
    
    .carousel-control-next-icon,
    .carousel-control-prev-icon{
      position:absolute;
      top:90px;
    }
  }
</style>