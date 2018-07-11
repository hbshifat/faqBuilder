<template>
    <div class="ninja_editor_edit_item">
        <div @click="showEdit = true" class="ninja_editor_group_item"><span>{{ title }} <i
                class="wpp-ios-arrow-forward"></i></span></div>
        <div v-if="showEdit" class="ninja_editor_overflow">
            <div class="ninja_editor_header ninja_pointer" @click="showEdit = false">
                <i class="wpp-android-arrow-back"></i> {{ title }}
            </div>

            <div class="editor_overflow_clonable_content">
                <draggable v-model="rearrange_items.features">
                    <ninja-clonable-editor-group
                            :enable_delete="true"
                            :header_title="title"
                            v-for="(element, elementIndex) in value"
                            :key="elementIndex"
                            @deleteItem="deleteElement(elementIndex)"
                            @cloneItem="cloneElement(elementIndex)"
                            :title="element.title"
                            :do_edit="do_edit_index == elementIndex"
                            :fieldMaps="fieldMaps"
                            :value="element"></ninja-clonable-editor-group>
                </draggable>
                <div class="ninja_add_item" @click="addNewFeature(value)"><i class="wpp-android-add"></i> Add</div>
            </div>

        </div>
    </div>
</template>
<script type="text/babel">
    import NinjaRepeatContentElement from './_RepeatContentElement';
    import NinjaClonableEditorGroup from './ClonableEditorGroup.vue';
    import draggable from 'vuedraggable';
    export default {
        name: 'ninja_repeat_contents',
        components: {
            draggable,
            NinjaRepeatContentElement,
            NinjaClonableEditorGroup
        },
        props: ['title', 'value', 'fieldMaps', 'rearrange_items'],
        data() {
            return {
                showEdit: false,
                do_edit_index: -1
            }
        },
        methods: {
            addNewFeature(features) {
                features.push({
                    title: 'Edit Me',
                    icon_class: 'wpp-android-done',
                    hint_text: ''
                });
                this.do_edit_index = this.value.length - 1;
            },
            deleteElement(elementIndex) {
                this.value.splice(elementIndex, 1);
            },
            cloneElement(elementIndex) {
                let newItem = JSON.parse(JSON.stringify(this.value[elementIndex]));
                this.value.splice(elementIndex + 1, 0, newItem);
            }
        }
    }
</script> 