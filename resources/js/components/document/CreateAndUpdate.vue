<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="名称">
            <Input v-model="formItem.name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="标签">
            <Select
                    v-model="formItem.tags"
                    multiple>
                <Option :value="tag.id" v-for="tag in JSON.parse(this.tags)" :key="tag.id">{{ tag.name }}</Option>
            </Select>
        </FormItem>
        <FormItem label="地址">
            <Input v-model="formItem.url" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="图标">
            <Input v-model="formItem.icon" placeholder="Enter something..."></Input>
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
        props: ['document', 'tags'],
        data() {
            return {
                loading: false,
                formItem: {
                    name: '',
                    tags: [],
                    url: '',
                    icon: '',
                    description: ''
                },
                url: '/documents'
            }
        },
        mounted() {
            // 编辑页面数据赋值
            if (this.document) {
                let document = JSON.parse(this.document);
                this.formItem.name = document.name;
                this.formItem.tags = document.tagIds;
                this.formItem.url = document.url;
                this.formItem.icon = document.icon;
                this.formItem.description = document.description;
                this.url = '/documents/' + document.id;
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                this.document ? this.put() : this.post();
            },
            post() {
                axios.post(this.url, {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                    this.$Notice.success({
                        title: response.data.message,
                        onClose: function () {
                            window.location.href = '/documents';
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
                            window.location.href = '/documents';
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
