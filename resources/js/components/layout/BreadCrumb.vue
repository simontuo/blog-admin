<template>
    <Breadcrumb class="custom-bread-crumb">
        <BreadcrumbItem
                v-for="(breadcrumb, index) in breadcrumbs"
                :key="index">
            <Icon type="logo-buffer"></Icon>
            <a @click="handleClick(breadcrumb)">{{ breadcrumb.name }}</a>
        </BreadcrumbItem>
    </Breadcrumb>
</template>

<script>
    export default {
        data() {
            return {
                breadcrumbs: [
                    {
                        name: '首页',
                        url: '/home',
                        cannotClose: true,
                    }
                ],
            }
        },
        mounted() {
            bus.$on('pushTag', response => {
                if (!this.isExistTag(response.name)) {
                    if (!this.isLastTagDifferentLevel(response)) {
                        this.breadcrumbs.pop();
                    }

                    this.breadcrumbs.push(response);
                }
            });
        },
        methods: {
            handleClick(breadcrumb) {
                bus.$emit('pushTag', breadcrumb);
            },
            isExistTag(tag) {
                let exist = false;
                for (var i = 0; i < this.breadcrumbs.length; i ++) {
                    if (this.breadcrumbs[i].name === tag) {
                        exist = true;
                    }
                }

                return exist;
            },
            isLastTagDifferentLevel(tag) {
                let index = this.breadcrumbs.length - 1;
                if (this.breadcrumbs[index].level !== tag.level) {
                    return true;
                }
                
                return false;
            }
        }
    }
</script>

<style scoped>

</style>