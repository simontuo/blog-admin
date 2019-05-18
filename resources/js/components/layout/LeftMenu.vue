<template>
    <Menu
            @on-select="onSelect"
            :active-name="activeName"
            theme="dark"
            width="auto"
            :class="menuitemClasses"
            :style="'height:' + this.height + 'px'">
        <div class="layout-logo">
            <p v-if="!isCollapsed">Blog-Admin</p>
            <p v-else>B</p>
        </div>
        <MenuItem name="会员管理">
            <Icon type="md-contacts"></Icon>
            <span>会员管理</span>
        </MenuItem>
        <MenuItem name="标签管理">
            <Icon type="md-pricetags"></Icon>
            <span>标签管理</span>
        </MenuItem>
        <MenuItem name="资源管理">
            <Icon type="md-cube"></Icon>
            <span>资源管理</span>
        </MenuItem>
        <MenuItem name="文档管理">
            <Icon type="md-document"></Icon>
            <span>文档管理</span>
        </MenuItem>
        <MenuItem name="文章管理">
            <Icon type="md-star"></Icon>
            <span>文章管理</span>
        </MenuItem>
        <MenuItem name="评论管理">
            <Icon type="md-chatboxes"></Icon>
            <span>评论管理</span>
        </MenuItem>
        <MenuItem name="系统管理" v-if="isCollapsed">
            <Icon type="md-settings"></Icon>
            <span>系统管理</span>
        </MenuItem>
        <Submenu name="系统管理" v-else>
            <template slot="title">
                <Icon type="md-settings"></Icon>
                <span>系统管理</span>
            </template>
            <MenuItem name="管理员" >
                <Icon type="md-contact"></Icon>
                <span>管理员</span>
            </MenuItem>
            <MenuItem name="角色管理">
                <Icon type="md-people"></Icon>
                <span>角色管理</span>
                </MenuItem>
            <MenuItem name="权限管理">
                <Icon type="md-unlock"></Icon>
                <span>权限管理</span>
            </MenuItem>
            <MenuItem name="日志管理">
                <Icon type="md-calendar" />
                <span>日志管理</span>
            </MenuItem>
        </Submenu>
    </Menu>

</template>

<script>
    export default {
        data() {
            return {
                isCollapsed: false,
                height: '',
                activeName: '',
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
                        'name': '文档管理',
                        'url': '/documents',
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
                    },
                    {
                        'name': '日志管理',
                        'url': '/log-viewer',
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

            bus.$on('activeTag', response => {
                this.activeName = response.level === 0 ? '' : response.name;
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