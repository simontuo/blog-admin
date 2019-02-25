<template>
    <Menu
            @on-select="onSelect"
            active-name="/members"
            theme="dark"
            width="auto"
            :class="menuitemClasses"
            :style="'height:' + this.height + 'px'">
        <div class="layout-logo">
            <p v-if="!isCollapsed">Blog-Admin</p>
            <p v-else>B</p>
        </div>
        <MenuItem name="会员管理">
            <Icon type="ios-navigate"></Icon>
            <span>会员管理</span>
        </MenuItem>
        <MenuItem name="标签管理">
            <Icon type="ios-search"></Icon>
            <span>标签管理</span>
        </MenuItem>
        <MenuItem name="资源管理">
            <Icon type="ios-search"></Icon>
            <span>资源管理</span>
        </MenuItem>
        <MenuItem name="文章管理">
            <Icon type="ios-search"></Icon>
            <span>文章管理</span>
        </MenuItem>
        <MenuItem name="评论管理">
            <Icon type="ios-settings"></Icon>
            <span>评论管理</span>
        </MenuItem>
        <Submenu name="系统管理">
            <template slot="title">
                <Icon type="ios-paper" />
                系统管理
            </template>
            <MenuItem name="管理员">管理员</MenuItem>
            <MenuItem name="角色管理">角色管理</MenuItem>
            <MenuItem name="权限管理">权限管理</MenuItem>
        </Submenu>
    </Menu>

</template>

<script>
    export default {
        data() {
            return {
                isCollapsed: false,
                height: '',
                urls: [
                    {
                        'name': '会员管理',
                        'url': '/members',
                        'level': 1,
                    },
                    {
                        'name': '文章管理',
                        'url': '/articles',
                        'level': 1,
                    },
                    {
                        'name': '标签管理',
                        'url': '/tags',
                        'level': 1,
                    },
                    {
                        'name': '资源管理',
                        'url': '/resources',
                        'level': 1,
                    },
                    {
                        'name': '评论管理',
                        'url': '/comments',
                        'level': 1,
                    },
                    {
                        'name': '管理员',
                        'url': '/users',
                        'level': 1,
                    },
                    {
                        'name': '角色管理',
                        'url': '/roles',
                        'level': 1,
                    },
                    {
                        'name': '权限管理',
                        'url': '/permissions',
                        'level': 1,
                    }
                ],
            }
        },
        computed: {
            menuitemClasses() {
                return [
                    'menu-item',
                    this.isCollapsed ? 'collapsed-menu' : ''
                ]
            },
        },
        mounted() {
            // 获取当前高度
            this.height = window.innerHeight - 10;

            bus.$on('isCollapsed', response => {
                this.isCollapsed = response;
            });
        },
        methods: {
            onSelect(name) {
                let tagInfo;
                for (var i = 0; i < this.urls.length; i ++) {
                    if (this.urls[i].name === name) {
                        tagInfo = this.urls[i];
                    }
                }
                bus.$emit('pushTag', tagInfo);
            }
        }
    }
</script>

<style scoped>

</style>