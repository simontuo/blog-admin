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
            <i-switch v-model="formItem.isPublic" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem label="正文">
            <markdown-textarea id="contentEditor" ref="contentEditor" v-model="formItem.content"  :zIndex="20"></markdown-textarea>
        </FormItem>
        <FormItem>
            <Button type="primary" @click="submit">提交</Button>
            <Button style="margin-left: 8px">取消</Button>
        </FormItem>
    </Form>
</template>
<script>
    export default {
        props: ['tags'],
        data() {
            return {
                formItem: {
                    title: '',
                    tags: [],
                    type: 'carry',
                    isPublic: false,
                    content: '',
                }
            }
        },
        methods: {
            submit() {
                this.$Loading.start();
                axios.post('/articles/store', {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                });
            }
        }
    }
</script>
