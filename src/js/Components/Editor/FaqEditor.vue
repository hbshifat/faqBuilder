<template>
    <div class="ninja_editor_tab">
        
        <div class="ninja_editor_navigation">
            <ul class="ninja_navs">
                <li 
                        :class="(current_tab == 'layout') ? 'ninja_active_nav' : ''"
                        @click="current_tab = 'layout'"
                >Layout</li>
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
                
            </ul>
        </div>
        
        

        
        <div v-if="current_tab == 'styles'" class="editor_item_sections">
            <faq-style :faq_style="faq_style"></faq-style>
        </div>
        <div v-else-if="current_tab == 'layout'" class="editor_item_sections">
            <faq-layout :faq_layout="faq_layout"></faq-layout>
        </div>
        <div v-else-if="current_tab == 'contents'" class="editor_item_sections">
            <faq-content :faq_content="faq_content"></faq-content>
        </div>
        
    </div>
</template>

<script type="text/babel">
    import NinjaColorPicker from './EditorCore/ColorSelect';
    import NinjaSwitch      from './EditorCore/Switch';
    import FaqContent       from './_Content';
    import FaqStyle         from './_Style';
    import FaqLayout        from './_Layout';
   
    
    export default {
        name: 'faq_editor',
        props: ['faq_content','faq_style','faq_layout'],
        components: {

            NinjaColorPicker,
            NinjaSwitch,
            FaqContent,
            FaqStyle,
            FaqLayout
        },
        data() {
            return {
                current_tab: 'layout'
            }
        },
        methods: {}
    }
</script> 

<style lang="scss">
    
</style>