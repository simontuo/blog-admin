<template>
    <Card :bordered="false">
        <div class="card-head">
            <!--<Avatar icon="ios-person" size="large" />-->
            <img class="mr-3 rounded-circle"
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAk0lEQVRoge3awQmAMBQEUSMWYgnpv4qUYCm2sKc4LvPOnw+DHiRxHJm17nByzmfztjPcRWYDgw0MNjDYwGADQ0PDyD+/sBqegw0MNjDYwGADgw0MNjDYwGADgw0MNjDYwGADQ0PDCOe+OtL0fvo/bGCwgcEGBhsYGhoa7navfHT/z4bhtoZ3yQYGGxhsYLCBwQaGFyr3EwEl0gtIAAAAAElFTkSuQmCC"
                 alt="Generic placeholder image"
                 width="100"
                 height="100">
        </div>
    </Card>
</template>

<script>
    export default {
        name: "InfoCard"
    }
</script>

<style scoped>
    .card-head {
        text-align: center;
    }
</style>