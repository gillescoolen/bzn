import Vue from 'vue'
import VueRouter from 'vue-router'
import { Admin, Config, Intro, Users, Questions, Registrations, Municipalities, Tasks, GuideTypes, ForgotPassword, ResetPassword, Login, Register, Measures } from './pages'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        // 'Normal users'
        {
            path: '/',
            name: 'intro',
            meta: { layout: 'step' },
            component: Intro
        },
        {
            path: '/config',
            name: 'config',
            meta: { layout: 'step' },
            component: Config
        },
        {
            path: '/tasks',
            name: 'tasks',
            meta: { layout: 'step' },
            component: Tasks
        },
        {
            path: '/guide-types',
            name: 'guide-types',
            meta: { layout: 'step' },
            component: GuideTypes
        },
        {
            path: '/measures',
            name: 'measures',
            meta: { layout: 'step' },
            component: Measures
        },

        // Authentication
        {
            path: '/login',
            name: 'login',
            meta: { layout: 'auth' },
            component: Login,
        },
        {
            path: '/register',
            name: 'register',
            meta: { layout: 'auth' },
            component: Register,
        },
        {
            path: '/forgot-password',
            name: 'forgot-password',
            meta: { layout: 'auth' },
            component: ForgotPassword,
        },
        {
            path: '/reset-password/:token',
            name: 'reset-password',
            meta: { layout: 'auth' },
            component: ResetPassword,
        },

        // Admin
        {
            path: '/admin',
            name: 'admin',
            meta: { layout: 'admin' },
            component: Admin
        },
        {
            path: '/admin/questions',
            name: 'questions',
            meta: { layout: 'admin' },
            component: Questions
        },
        {
            path: '/admin/municipalities',
            name: 'municipalities',
            meta: { layout: 'admin' },
            component: Municipalities
        },
        {
            path: '/admin/users',
            name: 'users',
            meta: { layout: 'admin' },
            component: Users
        },
        {
            path: '/admin/registrations',
            name: 'registrations',
            meta: { layout: 'admin' },
            component: Registrations
        }
    ],
});