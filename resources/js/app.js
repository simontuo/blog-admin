/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.iView = require('iview');
window.bus = new Vue;
// notice 全局配置
window.iView.Notice.config({
    duration: 2
});

require('./lib/handlehttp');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// layout
Vue.component('base-layout', require('./components/layout/BaseLayout.vue').default);
Vue.component('header-bar', require('./components/layout/HeaderBar.vue').default);
Vue.component('left-menu', require('./components/layout/LeftMenu.vue').default);
Vue.component('tag-nav', require('./components/layout/TagNav.vue').default);
Vue.component('iframe-tab', require('./components/layout/IframeTab.vue').default);
Vue.component('global-notice', require('./components/layout/Notice.vue').default);
Vue.component('paginate', require('./components/layout/Paginate.vue').default);
Vue.component('redirect-button', require('./components/layout/RedirectButton.vue').default);
Vue.component('markdown-textarea', require('./components/layout/MarkdownTextarea.vue').default);
Vue.component('bread-crumb', require('./components/layout/BreadCrumb.vue').default);
// dashboard
Vue.component('count-card', require('./components/dashboard/CountCard.vue').default);
// member
Vue.component('member-table', require('./components/member/MemberTable.vue').default);
// article
Vue.component('article-table', require('./components/article/ArticleTable.vue').default);
Vue.component('article-create-and-update-form', require('./components/article/CreateAndUpdate.vue').default);
// comment
Vue.component('comment-table', require('./components/comment/CommentTable.vue').default);
// tag
Vue.component('tag-table', require('./components/tag/TagTable.vue').default);
Vue.component('tag-create-and-update-form', require('./components/tag/CreateAndUpdate.vue').default);
// user
Vue.component('user-center', require('./components/user/Center.vue').default);
Vue.component('user-table', require('./components/user/UserTable.vue').default);
// role
Vue.component('role-table', require('./components/role/RoleTable.vue').default);
Vue.component('role-create-and-update-form', require('./components/role/CreateAndUpdate.vue').default);
// permission
Vue.component('permission-table', require('./components/permission/PermissionTable.vue').default);
Vue.component('permission-create-and-update-form', require('./components/permission/CreateAndUpdate.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
