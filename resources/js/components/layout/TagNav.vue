<template>
    <div>
        <div class="tag-nav">
            <Button type="default">
                <Icon type="md-close-circle" size="18" @click="closeAll"></Icon>
            </Button>
            <span class="tag-list">
            <Tag
                    type="dot"
                    :closable="!tag.cannotClose"
                    :color="tag.name === activeName ? 'primary' : ''" v-for="tag in tags"
                    :key="tag.name"
                    :name="tag.name"
                    @click.native="handleClick(tag)"
                    @on-close="close">
                {{ tag.name }}
            </Tag>
        </span>
            <Button type="default" class="float-right" @click="refresh">
                <Icon type="md-refresh" size="18"></Icon>
            </Button>
        </div>
        <div>
            <iframe-tab :tags="tags" :activeName="activeName"></iframe-tab>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tags: [
                    {
                        name: '首页',
                        url: '/home',
                        cannotClose: true,
                        level: 0,
                    }
                ],
                activeName: '首页',
            }
        },
        mounted() {
            bus.$on('pushTag', response => {
                if (!this.isExistTag(response.name)) {
                    this.tags.push(response);

                }

                this.activeName = response.name;
            });
        },
        methods: {
            isExistTag(tag) {
                let exist = false;
                for (var i = 0; i < this.tags.length; i ++) {
                    if (this.tags[i].name === tag) {
                        exist = true;
                    }
                }

                return exist;
            },
            handleClick(tag) {
                this.activeName = tag.name;
                bus.$emit('activeTag', tag);
            },
            close(event, name) {
                for (var i = 0; i < this.tags.length; i ++) {
                    if (this.tags[i].name === name) {
                        if ((i + 1) === this.tags.length) {
                            this.activeName = this.tags[(i - 1)].name;
                        }
                        this.tags.splice(i, 1);
                    }
                }
            },
            closeAll() {
                this.tags = [
                    {
                        name: '首页',
                        url: '/home',
                        cannotClose: true,
                    }
                ];
                this.activeName = '首页';
            },
            refresh() {
                document.getElementsByName(this.activeName)[0].contentWindow.location.reload(true)
            }
        }
    }
</script>

<style scoped>
    .tag-nav {
        background-color: #eee;
        padding: 2px;
    }
    .tag-list {

    }
    .ivu-btn {
        padding: 5px 10px 6px;
    }
</style>