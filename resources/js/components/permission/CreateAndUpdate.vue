<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="名称">
            <Input v-model="formItem.name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="标签">
            <Input v-model="formItem.slug" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="HTTP方法">
            <Select
                    v-model="formItem.http_method"
                    multiple>
                <Option
                        :value="item"
                        v-for="(item, index) in JSON.parse(http_methods)"
                        :key="index">
                    {{ item }}
                </Option>
            </Select>
        </FormItem>
        <FormItem label="HTTP路径">
            <Input v-model="formItem.http_path" type="textarea" :autosize="{minRows: 2,maxRows: 5}"
                   placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="描述">
            <Input v-model="formItem.description" type="textarea" :autosize="{minRows: 2,maxRows: 5}"
                   placeholder="Enter something..."></Input>
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
        props: ['http_methods', 'permission'],
        data() {
            return {
                loading: false,
                formItem: {
                    name: '',
                    slug: '',
                    http_method: [],
                    http_path: '',
                    description: '',
                },
                url: '/permissions'
            }
        },
        mounted() {
            // 编辑页面数据赋值
            if (this.permission) {
                let permission = JSON.parse(this.permission);
                this.formItem.name = permission.name;
                this.formItem.slug = permission.slug;
                this.formItem.http_method = permission.http_method;
                this.formItem.http_path = permission.http_path;
                this.formItem.description = permission.description;
                this.url = '/permissions/' + permission.id;
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                this.permission ? this.put() : this.post();
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