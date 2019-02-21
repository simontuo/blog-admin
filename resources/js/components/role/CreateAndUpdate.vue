<template>
    <Form :model="formItem" :label-width="80">
        <FormItem label="名称">
            <Input v-model="formItem.name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="显示名称">
            <Input v-model="formItem.display_name" placeholder="Enter something..."></Input>
        </FormItem>
        <FormItem label="禁用">
            <i-switch v-model="formItem.is_banned" size="large">
                <span slot="open">On</span>
                <span slot="close">Off</span>
            </i-switch>
        </FormItem>
        <FormItem label="权限">
            <Transfer
                    :data="JSON.parse(permissions)"
                    :target-keys="targetPermissions"
                    filterable
                    :filter-method="filterMethod"
                    @on-change="handleChange"></Transfer>
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
        props: ['role', 'permissions'],
        data() {
            return {
                loading: false,
                formItem: {
                    name: '',
                    display_name: '',
                    is_banned: false,
                    targetPermissions: [],
                    description: '',
                },
                url: '/roles',
                targetPermissions: [],
            }
        },
        mounted() {
            console.log(JSON.parse(this.permissions));
            // 编辑页面数据赋值
            if (this.role) {
                let role = JSON.parse(this.role);
                this.formItem.name = role.name;
                this.formItem.display_name = role.display_name;
                this.formItem.is_public = role.is_public;
                this.formItem.description = role.description;
                this.url = '/roles/' + role.id;
            }
        },
        methods: {
            submit() {
                this.loading = true;
                this.$Loading.start();
                this.formItem.targetPermissions = this.targetPermissions;
                this.role ? this.put() : this.post();
            },
            post() {
                axios.post(this.url, {'formItem': this.formItem}).then(response => {
                    this.$Loading.finish();
                    this.$Notice.success({
                        title: response.data.message,
                        onClose: function () {
                            window.location.href = '/roles';
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
                            window.location.href = '/roles';
                        }
                    });
                    this.loading = false;


                }).catch(error => {
                    this.loading = false;
                });
            },
            handleChange (newTargetKeys) {
                this.targetPermissions = newTargetKeys;
            },
            filterMethod (data, query) {
                return data.label.indexOf(query) > -1;
            }
        }
    }
</script>
