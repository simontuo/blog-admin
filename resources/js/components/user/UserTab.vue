<template>
    <Card :bordered="false">
        <Tabs>
            <TabPane label="文章" name="name1">标签一的内容</TabPane>
            <TabPane label="评论" name="name2">标签二的内容</TabPane>
            <TabPane label="点赞" name="name3">标签三的内容</TabPane>
            <TabPane label="收藏" name="name3">标签三的内容</TabPane>
        </Tabs>
    </Card>
</template>

<script>
    export default {
        name: "UserTab"
    }
</script>

<style scoped>

</style>