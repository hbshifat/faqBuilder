<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <div @click="showEditor = true" class="ninja_element_box">
            <div class="ninja_element_selection ninja_pointer">
                <div class="ninja_select_image">
                    <img :src="activeImage.img"/>
                    <div class="ninja_label">{{ activeImage.title }}</div>
                </div>
                <div class="ninja_element_expand"> <i class="wpp-ios-arrow-forward"></i> </div>
            </div>
        </div>
        <div v-if="showEditor" class="ninja_editor_overflow">
            <div class="editor_overflow_content">
                <div class="ninja_editor_header ninja_pointer" @click="showEditor = false">
                    <i class="wpp-android-arrow-back"></i>{{ title }}
                </div>
                <div class="ninja_editor_selections">
                    <div
                            v-for="(selection, selection_index) in options" :key="selection.key"
                            class="ninja_editor_select"
                            :class="(value === selection.key) ? 'ninja_item_selected' : ''"
                            @click="selectItem(selection)"
                    >
                        <img :src="selection.img"/>
                        <div class="ninja_label">{{ selection.title }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import  findIndex  from 'lodash/findIndex';
    export default {
        name: 'image_select',
        props: ['value', 'options', 'title'],
        data() {
            return {
                showEditor: false
            }
        },
        computed: {
            activeImage() {
                let index = findIndex(this.options, { key: this.value });
                if(index !== -1)  {
                    return this.options[index];
                }
                return {};
            }
        },
        methods: {
            selectItem(selection) {
                this.$emit('input', selection.key);
            }
        }
    }
</script>

<style lang="scss">

</style>