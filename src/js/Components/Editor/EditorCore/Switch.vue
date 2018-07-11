<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <div>
            <el-switch
                v-model="component_value"
                @change="updateConfig"
                active-color="#212121"
                inactive-color="#303131">
            </el-switch>
        </div>
        
    </div>
</template>
<script type="text/babel">
    export default {
        name: 'faq_switch',
        props: ['title', 'switch'],
        data() {
            return {
                component_value: this.switch
            }
        },
        methods: {
            updateConfig() {
                this.$emit('update', this.component_value);
            }
        }
    }
</script> 