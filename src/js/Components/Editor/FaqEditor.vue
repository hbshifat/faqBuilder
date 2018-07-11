<template>
    <div class="ninja_editor_tab">
        
        <div class="ninja_editor_navigation">
            <ul class="ninja_navs">
                <li 
                        :class="(current_tab == 'styles') ? 'ninja_active_nav' : ''"
                        @click="current_tab = 'styles'"
                >
                    Style
                </li>
                <li 
                        :class="(current_tab == 'contents') ? 'ninja_active_nav' : ''"
                        @click="current_tab = 'contents'"
                >Contents</li>
                <li 
                        :class="(current_tab == 'elements') ? 'ninja_active_nav' : ''"
                        @click="current_tab = 'elements'"
                >Elements</li>
            </ul>
        </div>
        
        

        <div v-if="current_tab == 'contents'" class="editor_item_sections">
            <faq-content :faq_content="faq_content"></faq-content>
        </div>
        
    </div>
</template>

<script type="text/babel">
    import NinjaImageSelect from './EditorCore/ImageSelect';
    import NinjaColorPicker from './EditorCore/ColorSelect';
    import NinjaSwitch from './EditorCore/Switch';
    import FaqContent from './_Content';
    import NinjaElementStyles from './_ElementStyles.vue';
    
    export default {
        name: 'pricing_editor',
        props: ['faq_content'],
        components: {
            NinjaImageSelect,
            NinjaColorPicker,
            NinjaSwitch,
            FaqContent,
            NinjaElementStyles
        },
        data() {
            return {
                current_tab: 'styles'
            }
        },
        methods: {}
    }
</script> 

<style lang="scss">
    
</style>