<template>
    <i-button :type="type" :icon="icon" @click="redirect">
        <!--<Icon v-if='icon' :type="icon" size="18"></Icon>-->
        {{ text }}</i-button>
</template>

<script>
    export default {
        props: ['type', 'icon', 'text', 'url'],
        data() {
            return {

            }
        },
        methods: {
            redirect() {
                window.location.href = this.url;
            }
        }
    }
</script>

<style scoped>

</style>