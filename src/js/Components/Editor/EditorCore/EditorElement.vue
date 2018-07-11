<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <el-input 
                v-if="field.type == 'text'" 
                v-model="component_value"
                size="mini"
        ></el-input>
        <el-input
                v-else-if="field.type == 'number'"
                type="number"
                v-model="component_value"
                size="mini"
        ></el-input>

        <div v-else-if="field.type == 'color_picker'" class="ninja_color_picker">
            <el-color-picker show-alpha size="mini" @active-change="setValue" @change="setValue" v-model="component_value"></el-color-picker>
            <span class="ninja_color_value" :style="{backgroundColor: component_value}">
                <span v-if="component_value">{{ component_value }}</span>
                <span v-else>Default</span>
            </span>
        </div>
        
        
        <el-select
                v-else-if="field.type == 'select'"
                v-model="component_value"
                filterable
                size="mini"
                clearable
                allow-create>
            <el-option
                    v-for="item in field.options"
                    :key="item"
                    :label="item"
                    :value="item">
            </el-option>
        </el-select>
        <el-switch
                v-else-if="field.type == 'switch'"
                v-model="component_value"
                :active-value="field.active_value"
                :inactive-value="field.inactive_value">
        </el-switch>
        <div v-else><pre>{{ field }}</pre></div>
    </div>
</template>
<script type="text/babel">

    export default {
        components: {},
        name: 'ninja_text_element',
        props: ['title', 'text_value', 'field'],
        data() {
            return {
                component_value: this.text_value
            }
        },
        watch: {
            component_value() {
                this.$emit('update:text_value', this.component_value);
            }
        },
        methods: {
            setValue(value) {
                this.component_value = value;
            }
        }
    }
</script> 