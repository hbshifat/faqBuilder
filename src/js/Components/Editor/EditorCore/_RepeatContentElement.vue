<template>
    <div class="ninja_editor_edit_item">
        <div @click="showEdit = true" class="ninja_editor_group_item">{{ element.title }}</div>
        <div v-if="showEdit" class="ninja_editor_overflow">
            <div class="ninja_editor_header ninja_pointer" @click="showEdit = false">
                <i class="wpp-android-arrow-back"></i> {{ title }}
            </div>
            <ninja-editor-group :title="title" :fieldMaps="fieldMaps" :value="element"></ninja-editor-group>
        </div>
    </div>
</template>
<script type="text/babel">
    import NinjaEditorGroup from './EditorGroup';
    export default {
        name: 'repeat_content_element',
        components: {
            NinjaEditorGroup
        },
        props: ['element', 'fieldMaps', 'title'],
        data() {
            return {
                showEdit: false
            }
        }
    }
</script> 