<template>
    <div class="ninja-radio-group">
        <div class="ninja_element_title">{{ title }}</div>
        <div class="ninja-radio-group-inner">
            <el-radio-group v-model="model" size="small">
                <el-radio-button 
                v-for="item in options" 
                :label="item.value"
                :key="item.value"
                >{{item.label}}</el-radio-button>
            </el-radio-group>
        </div>
    </div>
</template>

<script>
export default {
    name : 'NinjaRadioGroup',
    props:['value','title','options'],
    computed: {
        model: {
            get(){
                return this.value;
            },
            set(newValue){
                this.$emit('input',newValue)
            }
        }
    }
}
</script>

<style>

</style>
