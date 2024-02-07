import Welcome from './components/Welcome.vue';
import PagesList from './components/Pages/List.vue';
import PagesAdd from './components/Pages/Add.vue';
import PagesAddParent from './components/Pages/AddParent.vue';

export const routes = [
    {
        path: '/',
        name: 'home',
        component: Welcome
    },
    {
        path: '/pages',
        name: 'pagesList',
        component: PagesList
    },
    {
        path: '/pages/addParent',
        name: 'pagesAddParent',
        component: PagesAddParent
    },
    {
        path: '/pages/add',
        name: 'pagesAdd',
        component: PagesAdd
    }

];

