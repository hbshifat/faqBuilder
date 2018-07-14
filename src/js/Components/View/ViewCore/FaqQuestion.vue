<template>
    <!-- Question item -->
    <div class="ninja-faq-content-category-item" @click="accordionActive">
        <div 
          class="ninja-faq-content-category-item-question"
          :class="[question.is_active ? 'accordion-style' : '']"
          :style="{ backgroundColor: background_color , color: faq_style.question_text_color}">
            <span class="ninja-faq-content-category-item-question-text">
                {{question.title}}
            </span>

            <span class="ninja-faq-content-category-item-question-icon"></span>
        </div>

        <div 
        class="ninja-faq-content-category-item-answer" 
        :class="[question.is_active ? 'open' : 'collasps']"
        :style="{color:faq_style.answer_text_color, backgroundColor:answerBG}">
            <div class="ninja-faq-content-category-item-answer-text">
                {{ question.answer }}
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
            let color = '';
            if(this.faq_style.template_type != 'clear'){
                
                if(this.question.is_active){
                    color = '#ffffff';
                }else {
                    color = this.faq_style.item_backgroung_color;
                }
            }else {
                color = 'transparent';
            }

            return color;
        },
        answerBG(){
             return (this.layout.layout_type == 'accordion' ? '#ffffff' :  this.faq_style.item_backgroung_color)
        }
    },
    data(){
        return {
            openAnswer:false
        }
    },
    created(){
        if(this.layout.layout_type != 'accordion'){
            this.question.is_active = true;
        }
    },
    methods:{
        accordionActive(){
            if(this.layout.layout_type == 'accordion'){
                const openAnswer = !this.question.is_active;
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
