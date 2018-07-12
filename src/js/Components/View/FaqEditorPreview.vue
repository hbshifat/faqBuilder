<template>
    <div class="wp-faq-editor-preview">
        <faq-category 
        v-for="(category,index) in categories"
        :key="index"
        :category_title_visibility="category_title_visibility"
        :category="category"
        ></faq-category>
    </div>
</template>

<script>
import FaqCategory from './ViewCore/FaqCategory';

export default {
    name:'FaqEditorPreview',
    props:['faq_config'],

    computed:{
        categories(){
            return this.faq_config.faq_content.faq_question_categories;
        },
        category_title_visibility(){
            return this.faq_config.faq_content.display_content_title_visible
        }
    },
    components: {
        FaqCategory
    }
}
</script>

<style>

</style>
