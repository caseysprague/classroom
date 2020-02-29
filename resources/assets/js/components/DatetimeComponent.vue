<template>
    <span>{{ internationalized }}</span>
</template>

<script>
    export default {
        props: {
            datetime: String,
        },

        computed: {
            internationalized: function () {
                if (!this.datetime) return;

                return new Intl.DateTimeFormat(undefined, { hour: 'numeric', minute: 'numeric', month: 'numeric', day: 'numeric', year: 'numeric' }).format(new Date(this.datetime));
            }
        },

        mounted() {
            //
        }
    }
</script>
