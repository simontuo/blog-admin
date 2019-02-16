<template>
    <div class="demo-split">
        <Split v-model="split3">
            <div slot="left" class="demo-split-pane no-padding">
                <Split v-model="split4" mode="vertical">
                    <div slot="top" class="demo-split-pane">
                        个人信息
                    </div>
                    <div slot="bottom" class="demo-split-pane">
                        动态
                    </div>
                </Split>
            </div>
            <div slot="right" class="demo-split-pane">
                动态详情
            </div>
        </Split>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                split3: 0.5,
                split4: 0.5
            }
        },
    }
</script>
<style>
    .demo-split{
        height: 600px;
        border: 1px solid #dcdee2;
    }
    .demo-split-pane{
        padding: 10px;
        background: #fff;
    }
    .demo-split-pane.no-padding{
        height: 600px;
        padding: 0;
    }
</style>