<template>
    <!-- Question item -->
    <div class="ninja-faq-content-category-item">
        <div 
        class="ninja-faq-content-category-item-question"
        :style="{ backgroundColor: background_color , color: faq_style.question_text_color}">
            <span class="ninja-faq-content-category-item-question-text">
                Can I cancel my subscription at anytime?
            </span>

            <span class="ninja-faq-content-category-item-question-icon"></span>
        </div>

        <div class="ninja-faq-content-category-item-answer" style="height: 0px;">
            <div class="ninja-faq-content-category-item-answer-text">
                Sure. Your paid subscription can be cancelled anytime by shifting to Lite plan.
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'FaqQuestion',
    props:['question','faq_style','layout'],
    computed:{
        background_color(){
            return (this.faq_style.template_style != 'clear' ? this.faq_style.item_backgroung_color : 'transparent')
        }
    }
}
</script>

<style>

</style>
