<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="标题">
            <Input v-model="formItem.title" placeholder="输入标题..."></Input>
        </FormItem>
        <FormItem label="标签">
            <Select
                    v-model="formItem.tags"
                    multiple>
                <Option :value="tag.id" v-for="tag in JSON.parse(this.tags)" :key="tag.id">{{ tag.name }}</Option>
            </Select>
        </FormItem>
        <FormItem label="类型">
            <RadioGroup v-model="formItem.type">
                <Radio label="original">原创</Radio>
                <Radio label="carry">搬运</Radio>
            </RadioGroup>
        </FormItem>
        <FormItem label="公开">
            <i-switch v-model="formItem.is_public" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem label="正文">
            <markdown-textarea id="contentEditor" ref="contentEditor" v-model="formItem.content"
                               :zIndex="20"></markdown-textarea>
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
        props: ['tags', 'article'],
        data() {
            return {
                loading: false,
                formItem: {
                    title: '',
                    tags: [],
                    type: 'carry',
                    is_public: false,
                    content: '',
                },
                url: '/article/store',
            }
        },
        mounted() {
            // 编辑页面数据赋值
            if (this.article) {
                let article = JSON.parse(this.article);
                this.formItem.title = article.title;
                this.formItem.tags = article.tagIds;
                this.formItem.is_public = article.is_public;
                this.formItem.content = article.content;
                this.url = '/articles/' + article.id;
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
                            window.location.href = '/articles';
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
                            window.location.href = '/articles';
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
