<template>
    <div class="faq-style-editor  ninja_editor_edit_item">
        <ninja-select-box 
        :options="templateOptions" 
        title="TEMPLATE"
        v-model="faq_style.template_type"></ninja-select-box>

        <ninja-color-picker v-model="faq_style.question_text_color" title="ITEM BACKGROUND COLOR"></ninja-color-picker>
        <ninja-color-picker v-model="faq_style.item_backgroung_color" title="QUESTION TEXT COLOR"></ninja-color-picker>
        <ninja-color-picker v-model="faq_style.answer_text_color" title="ANSWER TEXT COLOR"></ninja-color-picker>
        <ninja-color-picker v-model="faq_style.category_text_color" title="CATEGORY TEXT COLOR"></ninja-color-picker>
    </div>
</template>

<script>
import NinjaSelectBox from './EditorCore/SelectBox';
import NinjaColorPicker from './EditorCore/ColorSelect'
export default {
    name:'Faq-style-editor',
    components:{
        NinjaSelectBox,
        NinjaColorPicker
    },
    props:['faq_style'],
    data(){
        return {
            templateOptions:[
                {
                    label:'Clear',
                    value:'clear'
                },
                {
                    label:'Background',
                    value:'background'
                },
                {
                    label:'Background & Shadow',
                    value:'backgroundShadow'
                },
                {
                    label:'Background & Border',
                    value:'backgroundBorder'
                }
            ]
        }
    }

}
</script>

<style lang="scss" scoped>

</style>
