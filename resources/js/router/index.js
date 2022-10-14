import VueRouter from "vue-router";
import LibraryListComponent from "../components/LibraryListComponent";
import SearchComponent from "../components/SearchComponent";
import LoginComponent from "../components/LoginComponent";
import AllBooksComponent from "../components/AllBooksComponent";

const routes = [
    {
        path:'/',
        component:LibraryListComponent,
    },
    {
        path: '/library/:id',
        component: AllBooksComponent
    },
    {
        path:'/search',
        component:SearchComponent
    },
    {
        path:'/login',
        component: LoginComponent,
        alias:'/register'
    },


];
export default new VueRouter({
    mode:"history",
    routes
});
