<template>
    <Form :model="formItem" :label-width="80">
        <Alert show-icon closable>An info prompt</Alert>
        <FormItem label="标题">
            <Input v-model="formItem.input" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="标签">
            <Select v-model="formItem.select">
                <Option value="beijing">New York</Option>
                <Option value="shanghai">London</Option>
                <Option value="shenzhen">Sydney</Option>
            </Select>
        </FormItem>
        <FormItem label="类型">
            <RadioGroup v-model="formItem.radio">
                <Radio label="male">原创</Radio>
                <Radio label="female">搬运</Radio>
            </RadioGroup>
        </FormItem>
        <FormItem label="公开">
            <i-switch v-model="formItem.switch" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem label="正文">
            <markdown-textarea id="contentEditor" ref="contentEditor" v-model="formItem.content"  zIndex="20"></markdown-textarea>
        </FormItem>
        <FormItem>
            <Button type="primary">提交</Button>
            <Button style="margin-left: 8px">取消</Button>
        </FormItem>
    </Form>
</template>
<script>
    export default {
        data() {
            return {
                formItem: {
                    input: '',
                    select: '',
                    radio: 'male',
                    checkbox: [],
                    switch: true,
                    date: '',
                    time: '',
                    slider: [20, 50],
                    content: ''
                }
            }
        }
    }
</script>
