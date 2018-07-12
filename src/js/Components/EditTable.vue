<template>
    <div class="ninja_full_width_screen">

        <!-- Start: FAQ Header -->
        <div class="wpp_section_header">
            <div class="wpp_section_title">
                <div v-if="!table_editing" class="ninja_header_show">
                    {{ table.post_title }} <i style="cursor: pointer" @click="table_editing = true" class="el-icon-edit"></i>
                </div>
                <div v-else class="ninja_header_editing">
                    <el-input placeholder="Table Name" size="mini" v-model="table.post_title"></el-input>
                    <el-button type="danger" size="mini">Save</el-button>
                </div>
            </div>


            <div class="wpp_section_actions">
                <el-button size="mini" type="primary">
                    Update
                </el-button>
                <el-button target="_blank" :href="demo_url" size="mini" type="primary">
                    Preview
                </el-button>

                <router-link class="table_close" :to="{ name: 'pricing_table_home' }">
                    <i class="wpp-android-close"></i>
                </router-link>

            </div>
        </div>

        <!-- End: FAQ Header -->



        <!-- Start: FAQ EDITOR -->
        <div  class="wp_faq_editor">
            <!-- Start: FAQ Editor Preview -->
            <div class="wp_faq_editor_preview">
                <div class="wp_faq_wrapper">
                    <div class="wp_faq_table-inner">
                       <faq-editor-preview :faq_config="faqConfig"></faq-editor-preview>
                    </div>
                </div>
            </div>
            <!-- End: FAQ Editor Preview -->


            <!-- Start: FAQ Editor customizer-->
            <div class="wp_faq_editor_control">
                <faq-editor 
                :faq_content="faqConfig.faq_content"
                :faq_style="faqConfig.faq_style"
                :faq_layout="faqConfig.faq_layout"
                ></faq-editor>
            </div>
            <!-- End: FAQ Editor customizer-->
        </div>
        <!-- End: FAQ EDITOR -->
    </div>
</template>

<script type="text/babel">
    import faqEditorPreview from './View/FaqEditorPreview'
    import faqEditor from './Editor/FaqEditor';

    export default {
        name: 'edit_pricing_table',
        components: {
            faqEditor,
            faqEditorPreview
        },
        data() {
            return {
                table_id: this.$route.params.table_id,
                table: {},
                faqConfig: {
                    faq_content: {
                        display_content_title_visible:true,
                        faq_question_categories:[],
                        
                    },
                    faq_layout: {
                        layout_type:'accordion',
                        accordion_icon:'plus'
                    },
                    faq_style:{
                        template_type:'background',
                        question_text_color:'#000000',
                        item_backgroung_color:'#ffffff',
                        answer_text_color:'#636363',
                        category_text_color:'#000000'
                    }
                },
                app_ready: false,
                demo_url: '',
                table_editing: false
            }
        },



        mounted() {
            //this.fetchTableData();
        }
    }
</script>

<style lang="scss">
    .ninja_header_editing {
        max-width: 400px;
        .el-input {
            display: inline-block;
            width: 300px;
        }
        button {
            display: inline-block;
        }
    }
</style>