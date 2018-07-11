<template>
    <div class="icon-list-wrapper">
        <sub-header title="Category Icon" @update="update"></sub-header>
        <div class="icon-list-inner-wrapper">
        
            <el-radio-group v-model="model">
                <el-radio-button v-for="(icon,iconIndex) in icon_list" :key="iconIndex" :label="icon">
                    <div class="icon-part">
                        <div class="is-selected">
                            <i class="el-icon-check"></i>
                        </div>
                        <div class="visible-icon">
                            
                                <i :class="[icon]"></i>
                                <div> {{ icon== "No icon" ? icon : icon.substr(8) }} </div>
                            
                        </div>
                    </div>
                
                </el-radio-button>
            </el-radio-group>
        </div>   
    </div>
</template>

<script>
import SubHeader from './Header';

export default {
    name:'ninja-icon',
    props:['value'],
    components : {
        SubHeader
    },
    data(){
        return {
            selectedIcon:'',
            icon_list: [
                'No icon',
                'el-icon-error',
                'el-icon-info',
                'el-icon-warning',
                'el-icon-success',
                'el-icon-question',
                'el-icon-back',
                'el-icon-arrow-left',
                'el-icon-arrow-down',
                'el-icon-arrow-right',
                'el-icon-arrow-up',
                'el-icon-caret-left',
                'el-icon-caret-bottom',
                'el-icon-caret-top',
                'el-icon-caret-right',
                'el-icon-d-arrow-left',
                'el-icon-d-arrow-right',
                'el-icon-minus',
                'el-icon-plus',
                'el-icon-remove',
                'el-icon-circle-plus',
                'el-icon-remove-outline',
                'el-icon-circle-plus-outline',
                'el-icon-close',
                'el-icon-check',
                'el-icon-circle-close',
                'el-icon-circle-check',
                'el-icon-circle-close-outline',
                'el-icon-circle-check-outline',
                'el-icon-zoom-out',
                'el-icon-zoom-in',
                'el-icon-d-caret',
                'el-icon-sort',
                'el-icon-sort-down',
                'el-icon-sort-up',
                'el-icon-tickets',
                'el-icon-document',
                'el-icon-goods',
                'el-icon-sold-out',
                'el-icon-news',
                'el-icon-message',
                'el-icon-date',
                'el-icon-printer',
                'el-icon-time',
                'el-icon-bell',
                'el-icon-mobile-phone',
                'el-icon-service',
                'el-icon-view',
                'el-icon-menu',
                'el-icon-more',
                'el-icon-more-outline',
                'el-icon-star-on',
                'el-icon-star-off',
                'el-icon-location',
                'el-icon-location-outline',
                'el-icon-phone',
                'el-icon-phone-outline',
                'el-icon-picture',
                'el-icon-picture-outline',
                'el-icon-delete',
                'el-icon-search',
                'el-icon-edit',
                'el-icon-edit-outline',
                'el-icon-rank',
                'el-icon-refresh',
                'el-icon-share',
                'el-icon-setting',
                'el-icon-upload',
                'el-icon-upload2',
                'el-icon-download',
                'el-icon-loading',
            ]
        }
    },
    computed: {
        model: {
            get() {
                return this.value
            },
            set(newValue){
                this.$emit('input',newValue);
            }
        }

    },
    methods: {
        update(){
            this.$emit('visibility')
        }
    }
}
</script>


<style lang="scss">

    /*Restyle the el-radio-group */

    .icon-list-inner-wrapper {
        padding: 24px;
        overflow-x: hidden; 
        overflow-y: scroll;
        height: calc( 100vh - 120px);
    }
    .icon-list-wrapper {
        background: #38393A;


        .el-radio-group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
           
            .el-radio-button {
                 margin-bottom: 15px;

                 &.is-active {

                     .el-radio-button__inner {
                         border: 1px solid #fff;
                        
                        .icon-part {
                           .is-selected {
                               display: block;
                           }
                         }
                     }
                 }


                .el-radio-button__inner {
                    background: #2f2f2f;
                    border: none;
                    color:#fff;
                    width: 124px;
                    height: 124px;
                    transition: all 0.3s linear;
                    position: relative;
                     &:hover {
                         background: #262626;
                     }

                     



                     .icon-part {
                         display: flex;
                         justify-content: center;
                         align-items: center;

                         width:100%;
                         height: 100%;

                         .is-selected {
                             position: absolute;
                             top: 5px;
                             left: 5px;
                             display: none;
                         }

                         .visible-icon {
                             i {
                                 margin-bottom: 30px;
                                 font-size: 24px;
                             }
                         }
                     }
                }
            }
        }
    
    }
</style>

