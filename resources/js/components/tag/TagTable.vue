<template>
    <div>
        <Table
                height="600"
                :loading="loading"
                :columns="columns"
                :data="data"
                ref="selection">
        </Table>
        <div class="mt-3 float-right">
            <paginate :total="total"></paginate>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                loading: false,
                columns: [],
                data: [],
                total: 0,
            }
        },
        mounted() {
            this.search();
            bus.$on('search', response => {
                this.search(response.page, response.pagesSize);
            })
        },
        methods: {
            search(page = 1, pagesSize = 10) {
                this.loading = true;
                axios.get('/tags/page_search', {params: {page: page, pagesSize: pagesSize}}).then(response => {
                    this.columns = response.data.columns;
                    this.data = response.data.data.data;
                    this.total = response.data.data.total;
                    this.loading = false;
                });
            }
        }
    }
</script>
