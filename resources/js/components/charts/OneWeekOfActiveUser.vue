<template>
    <div class="chart">
        <ve-line :data="chartData"></ve-line>
    </div>
</template>

<script>
    import VeLine from 'v-charts/lib/line.common'
    export default {
        components: { VeLine },
        data() {
            return {
                chartData: {
                    columns: ['日期', '销售量'],
                    rows: [
                        { '日期': '1月1日', '销售量': 123 },
                        { '日期': '1月2日', '销售量': 1223 },
                        { '日期': '1月3日', '销售量': 2123 },
                        { '日期': '1月4日', '销售量': 4123 },
                        { '日期': '1月5日', '销售量': 3123 },
                        { '日期': '1月6日', '销售量': 7123 }
                    ]
                }
            }
        },
    }
</script>

<style scoped>
    .chart {
        position: relative;
        overflow: auto;
        /*width: auto;*/
        /*height: 300px;*/
        padding: 0px;
        margin: 30px;
        border-width: 0px;
        cursor: default;
    }
</style>