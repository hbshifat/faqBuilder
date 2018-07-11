<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <div class="ninja_color_picker">
            <el-color-picker show-alpha size="mini" @active-change="logColor" @change="updateColor" v-model="component_color"></el-color-picker>
            <span class="ninja_color_value" :style="{backgroundColor: component_color}">
                <span v-if="component_color">{{ component_color }}</span>
                <span v-else>Default</span>
            </span>
        </div>
    </div>
    
</template>
<script type="text/babel">
    export default {
        name: 'color_select',
        props: ['color', 'title'],
        data() {
          return {
              component_color: this.color
          }  
        },
        methods: {
            updateColor() {
                this.$emit('update:color', this.component_color);
            },
            logColor(color) {
                this.$emit('update:color', color);
                this.component_color = color;
            }
        }
    }
</script>