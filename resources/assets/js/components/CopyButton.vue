<template>
    <button :class="classes" :data-clipboard-text="copyValue" type="button">
        <slot>Copy</slot>
    </button>
</template>

<script>
    export default {
        props: ['classes', 'copyValue'],
        mounted() {
            var Clipboard = require('clipboard');
            new Clipboard('.btn');
        }
    }
</script>
