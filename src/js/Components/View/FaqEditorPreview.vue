<template>
    <div class="wp-faq-editor-preview">
         <!-- Main title -->
        <h1 class="main-upper-title">Frequently Asked Questions</h1>




        <el-row>
             <el-col
            :xs="{span: 24, offset: 0}"
            :sm="{span: 24, offset: 0}"
            :md="{span: 24, offset: 0}"
            :lg="{span: 24, offset: 0}"
            :xl="{span: 16, offset: 4}">
                <el-row :gutter="50">
                    <!-- Start: FAQ Categories -->
                    <faq-category 
                        v-for="(category,index) in categories"
                        :key="index"
                        :category_title_visibility="category_title_visibility"
                        :category="category"
                        :faq_style="faq_style"
                        :layout="layout">

                        <!-- Start: Questions -->
                        <div class="ninja-faq-content-category-items" :class="[faq_style.template_type]">
                            <faq-question 
                            v-for="(question,ques_index) in category.questions"
                            :key="ques_index"
                            :question="question"
                            :layout="layout"
                            :faq_style="faq_style"
                            ></faq-question>
                        </div>
                        <!-- End: Questions -->

                    </faq-category>
                    <!-- End: FAQ Categories -->
                </el-row>
             </el-col>
        </el-row>
        
    </div>
</template>

<script>
import FaqCategory from './ViewCore/FaqCategory';
import FaqQuestion from "./ViewCore/FaqQuestion";

export default {
    name:'FaqEditorPreview',
    props:['faq_config'],

    computed:{
        categories(){
            return this.faq_config.faq_content.faq_question_categories;
        },
        category_title_visibility(){
            return this.faq_config.faq_content.display_content_title_visible
        },
        faq_style(){
            return this.faq_config.faq_style
        },
        layout(){
            return this.faq_config.faq_layout
        }
    },
    components: {
        FaqCategory,
        FaqQuestion
    }
}
</script>

<style>

</style>
