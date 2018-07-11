<template>
    <div class="ninja_full_width_screen">
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




        <div  class="wp_pricing_editor">
            <div class="wp_pricing_editor_preview">
                <div class="wp_pricing_wrapper">
                    <div class="wp_pricing_table-inner">
                       view will be there
                    </div>
                </div>
            </div>



            <div class="wp_pricing_editor_control">
                <faq_editor 
                :faq_content="faqConfig.faq_content"
                :faq_style="faqConfig.faq_style"
                :faq_layout="faqConfig.faq_layout"
                ></faq_editor>
            </div>
        </div>

    </div>
</template>

<script type="text/babel">
    import faq_editor from './Editor/FaqEditor';

    export default {
        name: 'edit_pricing_table',
        components: {
            faq_editor
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
                    faq_layout: {},
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