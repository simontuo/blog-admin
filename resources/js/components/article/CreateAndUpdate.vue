<template>
    <Form :model="formItem" :label-width="80">
        <Alert show-icon closable>An info prompt</Alert>
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
            <markdown-textarea id="contentEditor" ref="contentEditor" v-model="formItem.content"  :zIndex="20"></markdown-textarea>
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
        props: ['tags'],
        data() {
            return {
                loading: false,
                formItem: {
                    title: '',
                    tags: [],
                    type: 'carry',
                    is_public: false,
                    content: '',
                }
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                axios.post('/articles/store', {'formItem': this.formItem}).then(response => {
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
