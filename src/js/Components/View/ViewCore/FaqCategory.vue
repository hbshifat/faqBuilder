<template>
        <el-col :span="grid">
            <div class="ninja-faq-content-category" :class="[layout.layout_type]">
                <div 
                    class="ninja-faq-content-category-title" 
                    v-if="category_title_visibility">

                    <div class="ninja-faq-content-category-title-icon">
                        <i :class="[category.icon]"></i>
                    </div>
                    <span class="ninja-faq-content-category-title-text">{{category.title}}</span>
                </div>

                <div class="ninja-faq-content-category-items">
                    <slot></slot>
                </div>
            </div>
        </el-col>
</template>

<script>

export default {
    name:'FaqCategoryPreview',
    props:['category_title_visibility','category','layout','faq_style'],
    computed: {
        grid(){
            return (this.layout.layout_type == 'multicolumn' ? 12 : 24)
        }
    },
    created(){
        window.Bus.$on('visibleAnswer',(newValue)=>{
            console.log(newValue);
            this.$children[0].$children.map(item=>{
                this.$set(item,'openAnswer',false)
            })
            this.$set(this.$children[0].$children[newValue.index],'openAnswer',newValue.openAnswer);

            console.log(this.$children[0].$children);
        })
    }
}
</script>

<style>

</style>
