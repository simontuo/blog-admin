<template>
    <Card :bordered="false">
        <div class="info-card-head">
            <div>
                <img class="mr-3 rounded-circle"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAk0lEQVRoge3awQmAMBQEUSMWYgnpv4qUYCm2sKc4LvPOnw+DHiRxHJm17nByzmfztjPcRWYDgw0MNjDYwGADQ0PDyD+/sBqegw0MNjDYwGADgw0MNjDYwGADgw0MNjDYwGADQ0PDCOe+OtL0fvo/bGCwgcEGBhsYGhoa7navfHT/z4bhtoZ3yQYGGxhsYLCBwQaGFyr3EwEl0gtIAAAAAElFTkSuQmCC"
                     alt="Generic placeholder image"
                     width="100"
                     height="100">
            </div>

            <div class="mt-3">
                <h3>Serati Ma</h3>
                <p class="mt-2">海纳百川，有容乃大</p>
            </div>
        </div>
        <div class="mt-3 info-card-body">
            <p class="mb-2"><strong>标签</strong></p>
            <Tag color="default">default</Tag>
            <Tag color="default">primary</Tag>
            <Tag color="default">success</Tag>
            <Tag color="default">error</Tag>
        </div>
        <div class="info-card-footer">
            <Button type="text" class="text-primary" @click="openAvatarModal">更改头像</Button>
            <Button type="text" class="text-primary">修改密码</Button>
        </div>
        <Modal
                v-model="avatarModal"
                @on-ok="ok">
            <div class="mt-4">
                <div class="info-card-head">
                    <div>
                        <img class="mr-3 rounded-circle"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAk0lEQVRoge3awQmAMBQEUSMWYgnpv4qUYCm2sKc4LvPOnw+DHiRxHJm17nByzmfztjPcRWYDgw0MNjDYwGADQ0PDyD+/sBqegw0MNjDYwGADgw0MNjDYwGADgw0MNjDYwGADQ0PDCOe+OtL0fvo/bGCwgcEGBhsYGhoa7navfHT/z4bhtoZ3yQYGGxhsYLCBwQaGFyr3EwEl0gtIAAAAAElFTkSuQmCC"
                             alt="Generic placeholder image"
                             width="100"
                             height="100">
                    </div>

                    <div class="mt-3">
                        <h3>Serati Ma</h3>
                        <p class="mt-2">海纳百川，有容乃大</p>
                    </div>
                </div>
                <Upload
                        multiple
                        type="drag"
                        action="//jsonplaceholder.typicode.com/posts/">
                    <div style="padding: 20px 0">
                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                        <p>Click or drag files here to upload</p>
                    </div>
                </Upload>
            </div>
            <div slot="footer">
                <Button type="primary" size="large" long :loading="modal_loading" @click="avatarChange">提交</Button>
            </div>
        </Modal>
    </Card>
</template>

<script>
    export default {
        data() {
            return {
                avatarModal: false,
            }
        },
        methods: {
            openAvatarModal() {
                this.avatarModal = true;
            },
            avatarChange() {

            }
        }
    }
</script>

<style scoped>
    .info-card-head {
        text-align: center;
        padding-bottom: 15px;
        border-bottom: 1px dashed #e8e8e8;
    }

    .info-card-body {
        padding-bottom: 15px;
        border-bottom: 1px dashed #e8e8e8;
    }

    .info-card-footer {
        padding-top: 15px;
        /*text-align: center;*/
    }
</style>