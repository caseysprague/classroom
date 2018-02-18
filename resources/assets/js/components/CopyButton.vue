<template>
    <button :id="id" :class="classes" :data-clipboard-text="contentsToCopy" type="button">
        Copy
    </button>
</template>

<script>
    export default {
        props: ['id', 'classes', 'contentsToCopy'],
        mounted() {
            var Clipboard = require('clipboard');
            new Clipboard('.btn');
        }
    }
</script>
