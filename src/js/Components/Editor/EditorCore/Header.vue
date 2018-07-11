<template>
    <div class="ninja-editor-sub-header"  @click="update">
        <div class="ninja-editor-sub-back-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                <path d="M11.3,5.2H2.5l4-4c0.3-0.3,0.3-0.8,0-1.1c-0.3-0.3-0.8-0.3-1.1,0L0.2,5.4C0.1,5.6,0,5.8,0,6
                c0,0.2,0.1,0.4,0.2,0.5l5.2,5.2c0.3,0.3,0.8,0.3,1.1,0c0.3-0.3,0.3-0.8,0-1.1l-4-4h8.7C11.7,6.7,12,6.4,12,6
                C12,5.6,11.7,5.2,11.3,5.2z"></path>
            </svg>
        </div>
        <div class="ninja-editor-sub-title">{{title}}</div>
    </div>

</template>

<script>
export default {
    name:'subHeader',
    props:['title'],
    methods : {
        update(){
            this.$emit('update');
        }
    }
}
</script>


<style lang="scss" scoped>
  .ninja-editor-sub-header {
        position: relative;
        background: #38393a;
        height: 56px;
        line-height: 56px;
        padding: 0 54px;
        cursor: pointer;
        outline: none;
        border-bottom: 1px solid #303131;

        &:hover {

            .ninja-editor-sub-back-button{
                left: 20px;
            }
                
        }

        .ninja-editor-sub-back-button {
            display: block;
            position: absolute;
            top: 50%;
            left: 24px;
            transform: translateY(-50%);
            transition: all 0.15s ease;

            svg {
                display: block;
                width: 12px;
                height: 12px;
                fill: #fff;
            }
            
        }

        .ninja-editor-sub-title {
            color: #fff;
            font-size: 18px;
            font-weight: 400;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    }
</style>

