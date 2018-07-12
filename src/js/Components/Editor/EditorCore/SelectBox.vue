<template>
    <div class="select-box-wrapper">
        <div class="ninja_element_title">{{ title }}</div>
        <div class="ninja-select-box">
            <el-select v-model="model" placeholder="Select">
                <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                    </el-option>
            </el-select>
        </div>
        
    </div>
</template>

<script>
export default {
 name:'SelectBox',
 props:['title','value','options'],

 computed: {
     model: {
         get(){
             return this.value
         },
         set(newValue){
             this.$emit('input',newValue)
         }
     }
 }
}
</script>

<style lang="scss">
    .ninja-select-box {
        .el-select {
            width: 100%;
            .el-input {
                .el-input__inner {
                    background: #303131;
                    color: white;
                    border: none;
                    outline: 0;

                    &:focus {
                        border: none !important;
                    }
                }
            }
        }
    }
</style>
