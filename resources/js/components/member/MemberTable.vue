<template>
    <div>
        <Table
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
            this.loading = true;
            axios.get('/members/page_search').then(response => {
                this.columns = response.data.columns;
                this.data = response.data.data.data;
                this.total = response.data.total;
                this.loading = false;
            });
        },
        methods: {

        }
    }
</script>
