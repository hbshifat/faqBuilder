<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_editor_group_item">
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
            <span @click="showEdit = true">{{ title }}</span>
            <i class="wpp-clone" v-if="enable_delete" @click="cloneItem()"></i>
            <i class="wpp-trash-o" v-if="enable_delete" @click="deleteItem()"></i>
        </div>
        <div v-if="showEdit" class="ninja_editor_overflow">
            <div class="ninja_editor_header ninja_pointer" @click="showEdit = false">
                <i class="wpp-android-arrow-back"></i>
                <span v-if="header_title">{{ header_title }}</span>
                <span v-else>{{ title }}</span>
            </div>
            <div class="editor_overflow_content">
                <div v-for="fieldMap in fieldMaps" :key="fieldMap.fieldKey">
                    <ninja-editor-element :title="fieldMap.title" :field="fieldMap"
                                          :text_value.sync="value[fieldMap.fieldKey]"></ninja-editor-element>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import NinjaEditorElement from './EditorElement';

    export default {
        name: 'clonable_editor_group',
        components: {
            NinjaEditorElement
        },
        props: ['title', 'value', 'fieldMaps', 'header_title', 'enable_delete', 'do_edit'],
        data() {
            return {
                showEdit: false
            }
        },
        methods: {
            deleteItem() {
                this.$emit('deleteItem', 1);
            },
            cloneItem() {
                this.$emit('cloneItem', 1);
            }
        },
        mounted() {
            if(this.do_edit) {
                this.showEdit = true;
            }
        }
    }
</script>