<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="名称">
            <Input v-model="formItem.name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="显示名称">
            <Input v-model="formItem.display_name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="HTTP方法">
            <Select
                    v-model="formItem.http_method"
                    multiple>
                <Option
                        :value="item"
                        v-for="(item, index) in JSON.parse(http_methods)"
                        :key="index">
                    {{ item }}</Option>
            </Select>
        </FormItem>
        <FormItem label="HTTP路径">
            <Input v-model="formItem.http_path" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="禁用">
            <i-switch v-model="formItem.is_banned" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem label="描述">
            <Input v-model="formItem.description" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="Enter something..."></Input>
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
        props: ['http_methods'],
        data () {
            return {
                loading: false,
                formItem: {
                    name: '',
                    display_name: '',
                    http_method: '',
                    http_path: '',
                    is_banned: false,
                    description: '',
                },
                url: '/permissions'
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                this.article ? this.put() : this.post();
            },
            post() {
                axios.post(this.url, {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                    this.$Notice.success({
                        title: response.data.message,
                        onClose: function () {
                            window.location.href = '/permissions';
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
                            window.location.href = '/permissions';
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