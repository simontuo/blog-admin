<template>
    <Breadcrumb class="custom-bread-crumb">
        <BreadcrumbItem

                v-for="(breadcrumb, index) in JSON.parse(breadcrumbs)"
                :key="index">
            <Icon type="logo-buffer"></Icon>
            <a @click="handleClick(breadcrumb)">{{ breadcrumb.name }}</a>
        </BreadcrumbItem>
    </Breadcrumb>
</template>

<script>
    export default {
        props: ['breadcrumbs'],
        methods: {
            handleClick(breadcrumb) {
                bus.$emit('pushTag', breadcrumb);
            }
        }
    }
</script>

<style scoped>

</style>