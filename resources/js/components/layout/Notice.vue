<template>
    
</template>

<script>
    export default {
        props: ['notice'],
        mounted() {
            let notice = JSON.parse(this.notice);
            let method = notice.status ? notice.status : 'info';
            this[method](notice);
        },
        methods: {
            info (notice) {
                this.$Notice.info({
                    title: notice.title,
                    desc: notice.desc,
                });
            },
            success (notice) {
                this.$Notice.success({
                    title: notice.title,
                    desc: notice.desc,
                });
            },
            warning (notice) {
                this.$Notice.warning({
                    title: notice.title,
                    desc: notice.desc,
                });
            },
            error (notice) {
                this.$Notice.error({
                    title: notice.title,
                    desc: notice.desc,
                });
            }
        }
    }
</script>

<style scoped>

</style>