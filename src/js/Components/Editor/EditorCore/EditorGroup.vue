<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_editor_group_item">
            <span @click="showEdit = true">{{ title }} <i class="wpp-ios-arrow-forward"></i></span>
            <button v-if="enable_delete" @click="deleteItem()">Delete</button>
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
        name: 'editor_group',
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
            }
        },
        mounted() {
            if(this.do_edit) {
                this.showEdit = true;
            }
        }
    }
</script>