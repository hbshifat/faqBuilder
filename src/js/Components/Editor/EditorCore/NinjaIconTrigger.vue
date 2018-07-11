<template>
    <div class="ninja-icon-trigger-wrapper" @click="update">
        <!-- title -->
        <div class="ninja_element_title">{{ title }}</div>

        <!-- Trigger -->
        <div class="ninja-editor-select-visual-control ninja-editor-property-control">
            <div class="ninja-editor-select-visual-control-image-container">
                <i class="ninja-editor-select-visual-control-image" :class="[ icon ]"></i>
            </div>

            <div class="ninja-editor-select-visual-control-name">
                {{ icon }}
            </div>

            <div class="ninja-editor-select-visual-control-trigger">
                <div class="ninja-editor-select-visual-control-trigger-arrow">
                    <svg width="6px" height="10px" viewBox="0 0 6 10" fill="#c2c6ca" focusable="false">
                        <path d="M5.71,4.286L1.727,0.302c-0.39-0.392-1.023-0.392-1.414,0c-0.39,0.39-0.39,1.023,0,1.414L3.59,4.992
                        L0.289,8.284c-0.39,0.39-0.39,1.025,0,1.415c0.39,0.39,1.023,0.39,1.414,0l4.008-4C6.101,5.309,6.101,4.675,5.71,4.286z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: ['icon','title'],
    methods: {
        update(){
            this.$emit('update');
        }
    }
}
</script>

<style lang="scss" scoped>


.ninja-editor-select-visual-control {
    width: 100%;
    height: 136px;
    overflow: hidden;
    cursor: pointer;
    background-color: #303131;
    position: relative;
    border-radius: 2px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.1s ease;

    &:hover {
        .ninja-editor-select-visual-control-trigger {
            background-color: #474848;
        }
    }


    .ninja-editor-select-visual-control-image-container {
        height: 64px;
        margin-top: 8px;
        margin-left: -29px;
        display: flex;
        align-items: center;
        justify-content: center;

        .ninja-editor-select-visual-control-image {
            max-width: 100%;
            max-height: 100%;
        }
    }

    .ninja-editor-select-visual-control-name {
        color: #fff;
        text-align: center;
        font-size: 13px;
        font-weight: 400;
        overflow: hidden;
        text-overflow: ellipsis;
        border-radius: 2px;
        margin-top: 20px;
        margin-left: -29px;
    }

    .ninja-editor-select-visual-control-trigger {
        position: absolute;
        height: 100%;
        width: 29px;
        right: 0;
        top: 0;
        background-color: #404141;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;

        .ninja-editor-select-visual-control-trigger-arrow{
            svg {
                fill: #66686a;
                display: block;
                transition: all 0.2s ease;
            }
        } 
    }
}

</style>

