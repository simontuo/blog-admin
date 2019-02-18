<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="名称">
            <Input v-model="formItem.name" placeholder="输入名称..."></Input>
        </FormItem>
        <FormItem label="颜色">
            <ColorPicker v-model="formItem.color"></ColorPicker>
        </FormItem>
        <FormItem label="禁用">
            <i-switch v-model="formItem.is_banned" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem>
            <Button type="primary" @click="submit" :disabled="loading">
                <span v-if="!loading">提交</span>
                <span v-else>Loading...</span>
            </Button>
            <Button style="margin-left: 8px">取消</Button>
        </FormItem>
    </Form>
</template>
<script>
    export default {
        props: ['tag'],
        data () {
            return {
                loading: false,
                formItem: {
                    name: '',
                    color: '#2b85e4',
                    is_banned: false,
                },
                url: '/tags/store',
            }
        },
        mounted() {
            // 编辑页面数据赋值
            if (this.tag) {
                let tag = JSON.parse(this.tag);
                this.formItem.name = tag.name;
                this.formItem.color = tag.color;
                this.formItem.is_banned = tag.is_banned;
                this.url = '/tags/' + tag.id;
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                this.tag ? this.put() : this.post();
            },
            post() {
                axios.post(this.url, {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                    this.$Notice.success({
                        title: response.data.message,
                        onClose: function () {
                            window.location.href = '/tags';
                        }
                    });
                    this.loading = false;


                }).catch(error => {
                    this.loading = false;
                });
            },
            put() {
                axios.put(this.url, {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                    this.$Notice.success({
                        title: response.data.message,
                        onClose: function () {
                            window.location.href = '/tags';
                        }
                    });
                    this.loading = false;


                }).catch(error => {
                    this.loading = false;
                });
            }
        }
    }
</script>
