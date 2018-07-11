<template>
   <div class="ninja_editor_edit_item">
        <div class="ninja_element_title">{{ title }}</div>
        <div class="ninja-input">
            <el-input :type="inputType" v-model="model"></el-input>
        </div>
    </div>
</template>

<script>
export default {
    name:'NinjaInput',
    props:{
        inputType:{
            default:''
        },
        value:{
            default:''
        },
        title:{
            type: String,
            default:'Please Give title'
        }
    },

    computed:{
        model:{
            get(){
                return this.value;
            },
            set(newValue){
                this.$emit('input', newValue);
            }
        }
    }
}
</script>

<style lang="scss">
.ninja-input {
    .el-input {
        input.el-input__inner {
            background: #2C2D2D;
            border: none !important;
            color:#fff;
        }
    }
}


</style>
