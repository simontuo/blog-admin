<template>
    <div class="header-bar">
        <Header :style="{padding: 0}" class="layout-header-bar">
            <Icon @click.native="collapsedSider" :class="rotateIcon" :style="{margin: '0 20px'}" type="md-menu" size="24"></Icon>
            <bread-crumb  :breadcrumbs="breadcrumbs"></bread-crumb>
            <div class="float-right mr-3">
                <Dropdown
                        @on-click="handleClick">
                    <a href="javascript:void(0)">
                        <Avatar :src="JSON.parse(user).avatar" />
                        <Icon type="md-arrow-dropdown" size="20"></Icon>
                    </a>
                    <DropdownMenu slot="list">
                        <DropdownItem name="userCenter">个人中心</DropdownItem>
                        <DropdownItem divided name="logout">登出</DropdownItem>
                    </DropdownMenu>
                </Dropdown>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" :value="token">
                </form>
            </div>
        </Header>
    </div>
</template>

<script>
    export default {
        props: ['user', 'breadcrumbs'],
        data() {
            return {
                token: $('meta[name="csrf-token"]').attr('content'),
                isCollapsed: false
            }
        },
        computed: {
            rotateIcon () {
                return [
                    'menu-icon',
                    this.isCollapsed ? 'rotate-icon' : ''
                ];
            }
        },
        methods: {
            collapsedSider () {
                this.isCollapsed = this.isCollapsed ? false : true;
                bus.$emit('isCollapsed', this.isCollapsed);
            },
            handleClick(name) {
                this[name]();
            },
            logout() {
                var form = document.getElementById('logout-form');
                form.submit();
            },
            userCenter() {
                bus.$emit('pushTag', {
                    'name': '个人中心',
                    'url': '/users'
                });
            }
        }
    }
</script>

<style scoped>
    /*.header-bar {*/

    /*}*/
</style>