<template>
    <!-- Question item -->
    <div class="ninja-faq-content-category-item" @click="accordionActive">
        <div 
          class="ninja-faq-content-category-item-question"
          :style="{ backgroundColor: background_color , color: faq_style.question_text_color}">
            <span class="ninja-faq-content-category-item-question-text">
                Can I cancel my subscription at anytime?
            </span>

            <span class="ninja-faq-content-category-item-question-icon"></span>
        </div>

        <div class="ninja-faq-content-category-item-answer" :class="[openAnswer ? 'open' : '']">
            <div class="ninja-faq-content-category-item-answer-text">
                Sure. Your paid subscription can be cancelled anytime by shifting to Lite plan.
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'FaqQuestion',
    props:['question','faq_style','layout','index'],
    computed:{
        background_color(){
            return (this.faq_style.template_style != 'clear' ? this.faq_style.item_backgroung_color : 'transparent')
        }
    },
    data(){
        return {
            openAnswer:false
        }
    },
    created(){
        if(this.layout.layout_type != 'accordion'){
            this.openAnswer = true;
        }
    },
    methods:{
        accordionActive(){
            if(this.layout.layout_type == 'accordion'){
                const openAnswer = !this.openAnswer;
                window.Bus.$emit('visibleAnswer',{
                    index: this.index,
                    openAnswer
                })
            }
        }
    },

}
</script>

<style>

</style>
