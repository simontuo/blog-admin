<template>
    <span>
        <Button type="primary" icon="md-add" @click="show()">新增</Button>
        <Modal
                v-model="modal"
                title="新增管理员"
                @on-ok="handleSubmit"
                @on-cancel="cancel">
        <div>
            <Form ref="formInline" :model="formItem" >
                <FormItem prop="user">
                    <Select v-model="formItem.users" filterable multiple  placeholder="名称/邮箱">
                        <Option v-for="item in users" :value="item.id" :key="item.id">{{ item.name }}</Option>
                    </Select>
                </FormItem>
            </Form>
        </div>
    </Modal>
    </span>
</template>

<script>
    export default {
        data() {
            return {
                modal: false,
                users: [],
                formItem: {
                    users: []
                }
            }
        },
        methods: {
            show() {
                this.userList();
                this.modal = true;
            },
            handleSubmit() {
                axios.post('/users/manager/create', {id: this.formItem.users}).then(response => {
                    this.$Notice.success({
                        title: response.data.message,
                    });
                    bus.$emit('search', {});
                });
            },
            cancel() {
                this.users = [];
                this.formItem.users = [];
            },
            userList() {
                axios.get('/users/get/list').then(response => {
                    this.users = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>