<template>
    <el-popover
            placement="top"
            width="160"
            style="margin-left: 10px;"
            v-model="isVisibile">
        <p>Are you sure to delete this?</p>
        <div style="text-align: right; margin: 0">
            <el-button size="mini" type="text" @click="isVisibile = false">cancel</el-button>
            <el-button type="primary" size="mini" @click="confirm()">confirm</el-button>
        </div>
        <el-button slot="reference" title="Delete" size="mini" type="danger" icon="el-icon-delete"></el-button>
    </el-popover>
</template>

<script type="text/babel">
    export default {
        name: 'confirmation',
        data() {
            return {
                isVisibile: false
            }
        },
        props: {},
        methods: {
            confirm() {
                this.$emit('confirm', true);
            }
        }
    }
</script>

