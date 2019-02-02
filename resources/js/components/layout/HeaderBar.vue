<template>
    <div class="header-bar">
        <Header :style="{padding: 0}" class="layout-header-bar">
            <Icon @click.native="collapsedSider" :class="rotateIcon" :style="{margin: '0 20px'}" type="md-menu" size="24"></Icon>
            <div class="float-right mr-3">
                <Dropdown>
                    <a href="javascript:void(0)">
                        <Avatar icon="ios-person" />
                        <Icon type="md-arrow-dropdown" size="20"></Icon>
                    </a>
                    <DropdownMenu slot="list">
                        <DropdownItem>个人中心</DropdownItem>
                        <DropdownItem divided>登出</DropdownItem>
                    </DropdownMenu>
                </Dropdown>
            </div>
        </Header>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
            }
        }
    }
</script>

<style scoped>
    .header-bar {

    }
</style>