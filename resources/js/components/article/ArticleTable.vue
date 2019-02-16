<template>
    <div>
        <Table
                highlight-row
                :height="615"
                :loading="loading"
                :columns="columns"
                :data="data"
                ref="selection"
                @on-row-dblclick="dblClick">
        </Table>
        <div class="mt-3 float-right">
            <paginate :total="total"></paginate>
        </div>
        <Modal v-model="deleteModal" width="360">
            <p slot="header" style="color:#f60;text-align:center">
                <Icon type="ios-information-circle"></Icon>
                <span>删除确认</span>
            </p>
            <div style="text-align:center">
                <p>该资源将会被软删除。</p>
                <p>你会删除它吗?</p>
            </div>
            <div slot="footer">
                <Button type="error" size="large" long :loading="modaLoading" @click="del">删除</Button>
            </div>
        </Modal>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                loading: false,
                deleteModal: false,
                modaLoading: false,
                columns: [],
                data: [],
                total: 0,
                id: '',
                action: {
                    title: '操作',
                    key: 'action',
                    width: 150,
                    align: 'center',
                    render: (h, params) => {
                        return h('div', [
                            h('Button', {
                                props: {
                                    type: 'primary',
                                    size: 'small'
                                },
                                style: {
                                    marginRight: '5px'
                                },
                                on: {
                                    click: () => {
                                        this.edit(params)
                                    }
                                }
                            }, '编辑'),
                            h('Button', {
                                props: {
                                    type: 'error',
                                    size: 'small'
                                },
                                on: {
                                    click: () => {
                                        this.deleteModal = true;
                                        this.id = params.row.id;
                                    }
                                }
                            }, '删除')
                        ]);
                    }
                }
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
                axios.get('/articles/page_search', {params: {page: page, pagesSize: pagesSize}}).then(response => {
                    this.columns = response.data.columns;
                    this.columns.push(this.action);
                    this.data = response.data.data.data;
                    this.total = response.data.data.total;
                    this.loading = false;
                });
            },
            dblClick(row) {
                window.location.href = '/articles/' + row.id;
            },
            edit(params) {
                window.location.href = '/articles/' + params.row.id + '/edit';
            },
            del() {
                this.modaLoading = true;
                axios.delete('/articles/' + this.id).then(response => {
                    this.modaLoading = false;
                    this.deleteModal = false;
                    this.$Notice.success({
                        title: response.data.message,
                    });
                    this.search();
                });
            }
        }
    }
</script>
