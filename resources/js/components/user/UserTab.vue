<template>
    <Card :bordered="false">
        <p slot="title">我的文章</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="article in JSON.parse(this.articles)">{{ article.title }}</li>
        </ul>
    </Card>
</template>

<script>
    export default {
        props: ['articles'],
        data() {
            return {

            }
        },
        mounted() {

        }
    }
</script>

<style scoped>
   
</style>