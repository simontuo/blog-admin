<template>
    <div>
        <Card
                class="count-card mb-3"
                :border="false"
                :padding="0">
            <div class="row">
                <!--<div class="col-md-4" :style="'background-color:' + color">-->
                <div class="col-md-4" >
                    <div class="count-card-icon" :style="'background-color:' + color">
                        <Icon :type="icon"></Icon>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="count-card-number text-secondary">
                        {{ amount }}
                    </div>
                    <div class="count-card-title text-muted">
                        {{ title }}
                    </div>
                </div>
            </div>
        </Card>
    </div>
</template>

<script>
    export default {
        props: ['title', 'icon', 'amount', 'color'],
        data() {
            return {
            }
        },
    }
</script>

<style scoped>
    .count-card {
        height: 110px;
    }
    .count-card-icon {
        font-size: 40px;
        text-align: center;
        color: #ffffff;
        height: 108px;
        padding-top: 22px;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }
    .count-card-number {
        font-size: 45px;
        text-align: center;
    }
    .count-card-title {
        font-size: 18px;
        text-align: center;
    }
</style>