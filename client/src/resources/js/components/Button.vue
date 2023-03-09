<template lang="">
    <button :id="id" :class="'light'" @click="onClick">{{ btnText }}</button>
</template>
<script>
export default {
    props: {
        btnText: {
            type: String,
            default: "Button",
        },
        id: {
            require: true,
        },
        class: [String, Array],
        onClick: {
            type: Function,
        },
    },
};
</script>
<style lang="scss">
button {
    display: block;
    &.light {
        margin: 0px auto;
        padding: 45px 40px !important;
        border: 1px solid;
        border-radius: 100%;
        font-size: 2rem;
        cursor: pointer;
        &:hover {
            background-color: skyblue;
        }
    }
}
</style>
