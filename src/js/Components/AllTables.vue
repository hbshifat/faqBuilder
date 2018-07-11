<template>
    <div>
        <div class="wpp_section_header">
            <div class="wpp_section_title">All Pricing Tables</div>
            <div class="wpp_section_actions">
                <el-button size="mini" @click="addTableModal = true" type="primary" icon="el-icon-circle-plus">Add
                    Table
                </el-button>
            </div>
        </div>
        <hr />
        
        <el-table
                v-loading="doingAjax"
                :data="pricing_tables"
                style="width: 100%">
            <el-table-column
                    prop="ID"
                    label="ID"
                    width="60">
            </el-table-column>
            <el-table-column
                    label="Name">
                <template slot-scope="scope">
                    <router-link :to="{ name: 'edit_table', params: { table_id: scope.row.ID } }">
                        {{ scope.row.post_title }}
                    </router-link>
                </template>
            </el-table-column>
            <el-table-column
                    label="Shortcode">
                <template slot-scope="scope">
                    <code>[wp_price_table id="{{ scope.row.ID }}"]</code>
                </template>
            </el-table-column>
            <el-table-column
                    label="Actions"
                    width="190"
            >
                <template slot-scope="scope">
                    <router-link title="Edit" class="el-button el-button--primary el-button--mini" :to="{ name: 'edit_table', params: { table_id: scope.row.ID } }">
                       <i class="el-icon-edit"></i>
                    </router-link>
                    
                    <a title="Preview" :href="scope.row.demo_url" target="_blank" class="el-button el-button--info el-button--mini">
                        <i class="el-icon-view"></i>
                    </a>
                   <ninja-confirm @confirm="deleteItem(scope.row.ID)"></ninja-confirm>
                </template>
            </el-table-column>
        </el-table>

       
        <div v-if="total > per_page" class="ninja_paginate ninja_paginate_right">
            <el-pagination
                    background
                    layout="prev, pager, next"
                    :page-size="per_page"
                    :current-page="page_number"
                    @current-change="changePage"
                    :total="total">
            </el-pagination>
        </div>


        <el-dialog
                title="Add New Pricing Table"
                :visible.sync="addTableModal"
                width="60%">

            <label for="new_table_name">Table Name</label>
            <el-input id="new_table_name" type="text" placeholder="Your Table Name" v-model="new_table.title"></el-input>

            <span slot="footer" class="dialog-footer">
                <el-button @click="addTableModal = false">Cancel</el-button>
                <el-button v-loading="addingTable" :disabled="addingTable" type="primary" @click="addNewTable()">Add New</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script type="text/babel">
    import ninjaConfirm from './common/_confirm'
    export default {
        name: 'all_pricing_tables',
        components: {
            'ninja-confirm': ninjaConfirm  
        },
        data() {
            return {
                doingAjax: false,
                addingTable: false,
                pricing_tables: [],
                per_page: 10,
                page_number: 1,
                total: 0,
                addTableModal: false,
                new_table: {
                    title: ''
                }
            }
        },
        methods: {
            fetchTables() {
                this.doingAjax = true;
                jQuery.get(ajaxurl, {
                    action: 'wp_pricing_table_ajax_actions',
                    route: 'get_tables',
                    per_page: this.per_page,
                    page_number: this.page_number
                })
                    .then(response => {
                        this.pricing_tables = response.data.tables;
                        this.total = response.data.total;
                    })
                    .fail(error => {
                        console.log(error.responseJSON.data);
                    })
                    .always(() => {
                        this.doingAjax = false;
                    });
            },
            changePage(pageNumber) {
                this.page_number = pageNumber;
                this.fetchTables();
            },
            addNewTable() {
                if (!this.new_table.title) {
                    this.$notify.error({
                        title: 'Error',
                        message: 'Please Provide Table Name'
                    });
                    return;
                }
                
                this.addingTable = true;
                jQuery.post(ajaxurl, {
                    action: 'wp_pricing_table_ajax_actions',
                    route: 'add_table',
                    post_title: this.new_table.title
                })
                    .then(response => {
                        this.$notify.success({
                            title: 'Success',
                            message: response.data.message
                        });
                        
                        this.$router.push({ name: 'edit_table', params: { table_id: response.data.table_id } });
                        
                    })
                    .fail(error => {
                        this.$notify.error({
                            title: 'Error',
                            message: error.responseJSON.data.message
                        });
                    })
                    .always(() => {
                        this.addingTable = false;
                    });
                
            },
            deleteItem(tableId) {
                jQuery.post(ajaxurl, {
                    action: 'wp_pricing_table_ajax_actions',
                    route: 'delete_table',
                    table_id: tableId
                })
                    .then(response => {
                        this.$notify.success({
                            title: 'Deleted',
                            message : response.data.message
                        });
                        this.fetchTables();
                    })
                    .fail(error => {
                       this.$notify.error({
                           title: 'Error',
                           message: error.responseJSON.data.message
                       });
                    });
            }
        },
        mounted() {
            this.fetchTables();
            jQuery('#wpbody').removeClass('ninja_full_screen');
        }
    }
</script> 