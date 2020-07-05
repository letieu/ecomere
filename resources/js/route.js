import Cart from "./components/Cart.vue";
import Index from "./pages/Index.vue";
import Dasboard from './pages/Dasboard';
import DasboardProduct from './pages/Dasboard/Product.vue';
import DasboardCategory from "./pages/Dasboard/Category.vue";
import SearchRes from "./pages/SearchRes.vue";
import Detail from "./pages/Detail.vue";
const routes = [
    {
        path:'/',
        component:Index
    },
    {
        path:'/products/:id',
        component:Detail
    },
    {
        path:'/res',
        component:SearchRes,
        name:'Res'
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