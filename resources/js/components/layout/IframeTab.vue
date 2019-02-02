<template>
    <div>
        <Content :style="{margin: '20px', background: '#fff', minHeight: '260px'}" v-for="tag in tags" :key="tag.name" v-show="tag.name === activeName">
            <iframe :src="tag.url" :name="tag.name" frameborder="0" :style="{width: '100%', height: height}"></iframe>
        </Content>
    </div>
</template>
<script>
    export default {
        props: ['tags', 'activeName'],
        data() {
            return {
                height: '',
            }
        },
        mounted() {
            this.height = (window.innerHeight - 150) + 'px';
        },
        methods: {

        }
    }
</script>