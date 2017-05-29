<template>
    <div>
        <h1>lang detector</h1>
    </div>
</template>

<script>
    export default {
        mounted() {
            var lng = navigator.browserLanguage || navigator.language || navigator.userLanguage;
            console.log(lng)
        }
    }
</script>
