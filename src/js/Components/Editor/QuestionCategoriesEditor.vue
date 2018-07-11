<template>
    <div>
        <ninja-editor-sub-header title="Question Categories" @update="update"></ninja-editor-sub-header>
        <div class="ninja-content-wrap">
            <!-- Category title -->
            <ninja-input title="CATEGORY TITLE" v-model="editor_option.title"></ninja-input>
            <!-- Icon list trigger -->
            <ninja-icon-trigger :icon="editor_option.icon" title="CATEGORY ICON" @update="icon_chart_visibility = true"></ninja-icon-trigger>
            <!-- Icon list -->
            <div class="ninja-icon-list" :class="[icon_chart_visibility ? 'visible' : '']">
                <ninja-icon v-model="editor_option.icon" @visibility="updateIconEditor"></ninja-icon>           
            </div>
           <!-- Questions -->
            <questions :questions="editor_option.questions" ></questions>

           

        </div>
    </div>
</template>

<script>
import NinjaInput from './EditorCore/Input'
import NinjaEditorSubHeader from './EditorCore/Header'
import NinjaIcon from './EditorCore/Icons'
import NinjaIconTrigger from './EditorCore/NinjaIconTrigger'
import Questions from './Questions'
export default {
    name:'questionCategory',
    props:['editor_option'],
    components:{
        NinjaInput,
        NinjaEditorSubHeader,
        NinjaIcon,
        NinjaIconTrigger,
        Questions
    },

    data: ()=> ({
        icon_chart_visibility: false
    }),

    methods:{
        updateIconEditor(){
            this.icon_chart_visibility = false;
        },
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


    .ninja-icon-list {
        position: absolute;
        top: 0px;
        left: 100%;
        transition: all 0.15s ease-out;

        &.visible {
            left:0px;
        }
    }

</style>
