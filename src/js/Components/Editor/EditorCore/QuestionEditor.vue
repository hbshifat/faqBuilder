<template>
    <div>
        <ninja-editor-sub-header title="Questions" @update="update"></ninja-editor-sub-header>
        <div class="ninja-question-content-wrap">
            <!-- Category title -->
            <ninja-input title="Question" v-model="question.title"></ninja-input>
            <ninja-input inputType="textarea" title="Answer" v-model="question.answer"></ninja-input>
        </div>
    </div>
</template>

<script>
import NinjaEditorSubHeader from './Header'
import NinjaInput from './Input'
export default {
    name:'QuestionEditor',
    props:['question'],
    components: {
        NinjaEditorSubHeader,
        NinjaInput
    },
    methods: {
        update(){
            this.$emit('close',false)
        }
    }
}
</script>

<style lang="scss" scoped>
.ninja-question-content-wrap {
    padding: 24px;
}
</style>

