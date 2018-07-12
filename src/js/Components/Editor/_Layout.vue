<template>
    <div class="ninja_editor_edit_item">
        <ninja-radio-group 
        v-model="faq_layout.layout_type" 
        title="LAYOUT"
        :options="layout_type_options"
        ></ninja-radio-group>


        <ninja-radio-group 
        v-if="faq_layout.layout_type == 'accordion'"
        v-model="faq_layout.accordion_icon"
        :options="accordion_type_options" 
        title="ACCORDION ICON"></ninja-radio-group>        
    </div>
</template>

<script>
import NinjaRadioGroup from './EditorCore/RadioGroup'
export default {

    data(){

        return {
            layout_type_options:[
                {
                    label:'Accordion',
                    value:'accordion'
                },
                {
                    label:'List',
                    value:'list'
                },
                {
                    label:'Multicolumn',
                    value:'multicolumn'
                }
            ],
            accordion_type_options: [
                {
                    label:'Plus',
                    value:'plus'
                },
                {
                    label:'Arrow',
                    value:'arrow'
                }
            ]
        }
        
    },
    props:['faq_layout'],
    components: {
        NinjaRadioGroup
    }

}
</script>

<style lang="scss">

.ninja-radio-group-inner {
    .el-radio-group {
        .el-radio-button {
            &.is-active {
                .el-radio-button__inner {
                    background: #232323;
                }
            }
            .el-radio-button__inner {
                background: #303131;
                border:none;
                box-shadow: none;
            }   
        }
    }
}

</style>
