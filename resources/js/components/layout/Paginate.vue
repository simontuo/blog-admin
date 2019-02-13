<template>
    <Page
            @on-change="changePage"
            :total="total"
            show-sizer
    ></Page>
</template>

<script>
    export default {
        props: ['total'],
        data() {
            return {
                
            }
        },
        methods: {
            changePage(page) {
                console.log(page);
            }
        }
    }
</script>

<style scoped>

</style>