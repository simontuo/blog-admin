<template>
    <Layout>
        <Sider hide-trigger collapsible :collapsed-width="78" v-model="isCollapsed">
            <slot name="leftMenu"></slot>
        </Sider>
        <Layout>
            <slot name="header-bar"></slot>
            <slot name="tag-nav"></slot>
        </Layout>
    </Layout>
</template>

<script>
    export default {
        data() {
            return {
                isCollapsed: false,
            }
        },
        mounted() {
            bus.$on('isCollapsed', response => {
                this.isCollapsed = response;
            });
        }
    }
</script>

<style scoped>

</style>