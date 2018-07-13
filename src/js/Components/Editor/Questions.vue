<template>
    <div>
        <div class="ninja_element_title">QUESTIONS</div>
        <div class="ninja_plan_wrapper">
            <draggable v-model="questions">
                <div v-for="(question, question_index) in questions" 
                :key="question_index" 
                class="ninja_plan_item"
                >
                    <div class="ninja_item_card">
                        <div class="item-reorder">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 14" focusable="false">
                                <path d="M1,4c0.6,0,1,0.4,1,1S1.6,6,1,6S0,5.6,0,5S0.4,4,1,4L1,4z"></path>
                                <path d="M1,0c0.6,0,1,0.4,1,1S1.6,2,1,2S0,1.6,0,1S0.4,0,1,0L1,0z"></path>
                                <path d="M1,8c0.6,0,1,0.4,1,1s-0.4,1-1,1S0,9.6,0,9S0.4,8,1,8L1,8z"></path>
                                <path d="M1,12c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S0.4,12,1,12L1,12z"></path>
                                <path d="M6,0c0.6,0,1,0.4,1,1S6.6,2,6,2S5,1.6,5,1S5.4,0,6,0L6,0z"></path>
                                <path d="M6,4c0.6,0,1,0.4,1,1S6.6,6,6,6S5,5.6,5,5S5.4,4,6,4L6,4z"></path>
                                <path d="M6,8c0.6,0,1,0.4,1,1s-0.4,1-1,1S5,9.6,5,9S5.4,8,6,8L6,8z"></path>
                                <path d="M6,12c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S5.4,12,6,12L6,12z"></path>
                            </svg>
                        </div>
                        <span @click="openQuestionEditor(question)">{{ question.title }}</span>
                        <i class="wpp-clone" @click.prevent="cloneQuestion(question_index)"></i>
                        <i class="wpp-trash-o" @click.prevent="deleteQuestion(question_index)"></i>
                    </div>
                </div>

            </draggable>

            <div class="ninja_add_item" @click="addNewQuestion()"><i class="wpp-android-add"></i> Add</div>


            

             <div 
                class="questions-editor-wrapper" 
                :class="[editingQuestionsEditor ? 'visible' : '']">
                    <questions-editor 
                    :question="editingQuestionsEditor"
                    @close="closeEditor"
                    ></questions-editor>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import QuestionsEditor from './EditorCore/QuestionEditor'
export default {
    props:['questions'],
    components: {
        draggable,
        QuestionsEditor
    },
    data() {
        return {
            editingQuestionsEditor: false,
            mockPlan: {
                title: 'Question ?',
                answer:'',
                is_active:false
            }
        }
    },
    methods: {
        closeEditor(updatedData){
            this.editingQuestionsEditor = updatedData;
        },
        
        openQuestionEditor(question) {
            this.editingQuestionsEditor = question;
        },
        addNewQuestion() {
            let newTable = JSON.parse(JSON.stringify(this.mockPlan));
            this.questions.push(newTable);
        },
        cloneQuestion(questionIndex) {
            let newTable = JSON.parse(JSON.stringify(this.questions[questionIndex]));
            this.questions.push(newTable);
        },
        deleteQuestion(questionIndex) {
            this.questions.splice(questionIndex, 1);
        }
    }

}
</script>

<style lang="scss" scoped>
.questions-editor-wrapper {
        position: absolute;
        width: 100%;
        top: 0px;
        left: 100%;
        background: #38393A;
        height: 100%;
        transition: all 0.3s ease-out;

        &.visible {
            left:0px;
        }
}
</style>

