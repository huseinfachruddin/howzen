import Home from '../views/Home'
import About from '../views/About'
import Contact from '../views/Contact'
import NewPost from '../views/notes/Create'
import Table from '../views/notes/Table'
import Show from '../views/notes/Show'
import Edit from '../views/notes/Edit'


export default{
mode: 'history',
linkActiveClass:'active',

routes:[
    {
        path:'/',
        name:'home',
        component: Home
    },
    {
        path:'/about',
        name:'pages.about',
        component: About
    },
    {
        path:'/contact',
        name:'pages.contact',
        component: Contact
    },
    {
        path:'/notes/create',
        name:'notes.create',
        component: NewPost
    },
    {
        path:'/notes/table',
        name:'notes.table',
        component: Table
    },
    {
        path:'/notes/:noteSlug',
        name:'notes.show',
        component: Show
    },
    {
        path:'/notes/:noteSlug/edit',
        name:'notes.edit',
        component: Edit
    },
] 


}