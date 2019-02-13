<template>
    <Page
            class="mb-2"
            @on-change="changePage"
            @on-page-size-change="changePageSize"
            :total="total"
            show-sizer
            show-total
    ></Page>
</template>

<script>
    export default {
        props: ['total'],
        data() {
            return {
                page: 1,
                pagesSize: 10,
            }
        },
        methods: {
            changePage(page) {
                this.page = page;
                this.pageSearch();
            },
            changePageSize(pagesSize) {
                this.pagesSize = pagesSize;
                this.pageSearch();
            },
            pageSearch() {
                bus.$emit('search', {
                    page: this.page,
                    pagesSize: this.pagesSize,
                });
            }
        }
    }
</script>

<style scoped>

</style>