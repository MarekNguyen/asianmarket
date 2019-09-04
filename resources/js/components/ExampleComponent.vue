<template>
    <div id="container">
        <div class="retail-box">

        </div>
         <div class="retail-box">

        </div>
         <div class="retail-box">

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    .retail-box {
        display: inline-block;
        height: 150px;
        width: 150px;
        background-color: #3490dc;
    }
</style>
