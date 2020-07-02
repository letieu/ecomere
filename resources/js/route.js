import Cart from "./components/Cart.vue";
import Index from "./pages/Index.vue";
import Dasboard from './pages/Dasboard';
import DasboardProduct from './pages/Dasboard/Product.vue';
import DasboardCategory from "./pages/Dasboard/Category.vue"
const routes = [
    {
        path:'/',
        component:Index
    },
    {
        path:'/cart',
        component:Cart
    },
    {
        path:'/dasboard',
        component: Dasboard,
        children: [
            {
                path:"product",
                component: DasboardProduct,
                name:"dasboard-product"
            },
            {
                path:"product",
                component: DasboardCategory,
                name:"dasboard-category"
            }
        ]
    }
]

export default routes