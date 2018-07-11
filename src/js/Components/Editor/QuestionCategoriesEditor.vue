<template>
    <div>
        <ninja-editor-sub-header title="Question Categories" @update="update"></ninja-editor-sub-header>
        <div class="ninja-content-wrap">
            <ninja-input title="CATEGORY TITLE" v-model="editor_option.title"></ninja-input>            
        </div>
    </div>
</template>

<script>
import NinjaInput from './EditorCore/Input'
import NinjaEditorSubHeader from './EditorCore/Header'
export default {
    name:'questionCategory',
    props:['editor_option'],
    components:{
        NinjaInput,
        NinjaEditorSubHeader
    },

    methods:{
        update() {
            this.$emit('close',false);
        }
    }
}
</script>

<style lang="scss" scoped>
    .ninja-content-wrap {
        padding: 24px;
    }
</style>
