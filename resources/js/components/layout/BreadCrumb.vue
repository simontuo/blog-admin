<template>
    <Breadcrumb class="custom-bread-crumb">
        <BreadcrumbItem
                :to="breadcrumb.url"
                v-for="(breadcrumb, index) in JSON.parse(breadcrumbs)"
                :key="index">{{ breadcrumb.label }}</BreadcrumbItem>
    </Breadcrumb>
</template>

<script>
    export default {
        props: ['breadcrumbs'],
    }
</script>

<style scoped>

</style>