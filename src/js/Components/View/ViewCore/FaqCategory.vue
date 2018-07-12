<template>
    <div>
        {{category.title}}
    </div>
</template>

<script>
import FaqQuestions from './FaqQuestions';
export default {
    name:'FaqCategoryPreview',
    props:['category_title_visibility','category'],
    components:{
        FaqQuestions
    }

}
</script>

<style>

</style>
