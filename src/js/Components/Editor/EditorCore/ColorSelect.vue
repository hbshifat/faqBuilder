<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <div class="ninja_color_picker">
            <el-color-picker 
            size="mini" 
            v-model="model"></el-color-picker>
            <span class="ninja_color_value">
                {{ model }}
            </span>
        </div>
    </div>
    
</template>
<script type="text/babel">
    export default {
        name: 'color_select',
        props: ['value', 'title'],
        
        computed: {
            model: {
                get(){
                    return this.value;
                },
                set(newValue){
                    this.$emit('input',newValue);
                }
            }

        }
    }
</script>