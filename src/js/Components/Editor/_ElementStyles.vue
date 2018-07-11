<template>
    <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">Elements</div>
        <div class="ninja_element_wrapper">
            <draggable v-model="table_config.component_settings">
            <ninja-element-styling-group
                    v-for="(component, sectionIndex) in table_config.component_settings"
                    :key="sectionIndex"
                    :show_hide="true"
                    v-if="element_config[component.key]"
                    :title="element_config[component.key].title"
                    :fieldMaps="element_config[component.key].cssElements"
                    v-model="table_config.element_config[component.key]"
            ></ninja-element-styling-group>
            </draggable>
        </div>
    </div>
</template>
<script type="text/babel">
    import NinjaElementStylingGroup from './EditorCore/ElementStylingGroup.vue';
    import draggable from 'vuedraggable';
   
    
    export default {
        name: 'ninja_element_styles',
        props: ['element_config', 'table_config'],
        components: {
            NinjaElementStylingGroup,
            draggable
        },
        watch: {
            'table_config.element_config': {
                handler() {
                    window.wpPricingBus.$emit('update_css');
                },
                deep: true
            }
        },
        methods: {
            
        },
        mounted() {
           
        }
    }
</script>